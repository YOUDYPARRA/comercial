<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrdenVenta;
use App\InsumoVenta;
use App\Calificacion;
use App\Observacion;
use App\Helpers\HelperUsuario;
use App\Services\ManagerCorreo;
use App\Http\Requests\ObservacionStoreRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdenVentaController extends Controller
{
protected $usuario;
protected $correo;
     public function __construct(HelperUsuario $consulta_usuario, ManagerCorreo $envia_correo){
         $this->usuario= $consulta_usuario;
         $this->correo=$envia_correo;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $objetos=OrdenVenta::Buscar($request->all())
        ->orderBy('updated_at','desc')
        ->paginate(15);
        return view('ordenes_ventas.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        //$numero_cotizacion=$numero_cotizacion;
        return view('ordenes_ventas.ventas_create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $orden_venta= new OrdenVenta();
        foreach ($request->all() as $key => $value) {
            if($key!='objetos'){
                $arr_objeto[$key]=$value;
            }
        }
        $arr_objeto['auto']=$orden_venta->auto_sig;
        $objeto_nuevo=$orden_venta->create($arr_objeto);
        $insumos_ventas=[];
        foreach ($request->objetos as $key => $value) {
            $objetos[$key]=$request->objetos[$key];
            if(array_key_exists('checkbox', $value)){
                unset($value['checkbox']);
                $value['id_orden_venta']=$objeto_nuevo->id;
                $insumos_ventas[]= new InsumoVenta($value);
            }
        }
        $objeto_nuevo->insumos_venta()->saveMany($insumos_ventas);
        //$iniciales='JYPA';
        $iniciales=auth()->user()->iniciales;
        $calificacion=new Calificacion(['ruta_califico'=>\Route::current()->getName(),'id_producto'=>$objeto_nuevo->id,'nombre_tipo'=>'orden_venta','iniciales'=>$iniciales,'calificacion'=>'GUARDADO']);
        $objeto_nuevo->calificaciones()->save($calificacion);
        return redirect('ordenes_ventas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        if($request->wantsJson()){
            $objetos=OrdenVenta::findOrFail($id);
            $objetos->insumos_venta;
               return response()->json(
                [
                    "msg"=>"Success",
                    "venta"=>$objetos->toArray()
                ],200
                );

        }else{
            $objeto = OrdenVenta::findOrFail($id);
            return view('ordenes_ventas.show',compact('objeto'));
        }
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('ordenes_ventas.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $orden_venta=OrdenVenta::findOrFail($id);
        foreach ($request->all() as $key => $value) {
            if($key!='objetos'){
                $objeto[$key]=$value;
            }
        }
        $orden_venta->update($objeto);
        foreach ($request->objetos as $key=>$itm_objetos) {
                    if(array_key_exists('checkbox', $itm_objetos)){
                        unset($itm_objetos['checkbox']);
                        $itm_objetos['id_orden_venta']=$orden_venta->id;
                        $arr_objetos[]=new InsumoVenta($itm_objetos);
                    }
                }
        $orden_venta->insumos_venta()->delete();
        $orden_venta->insumos_venta()->saveMany($arr_objetos);
        $iniciales=auth()->user()->iniciales;
        $calificacion=new Calificacion(['ruta_califico'=>\Route::current()->getName(),'id_producto'=>$orden_venta->id,'nombre_tipo'=>'orden_venta','iniciales'=>$iniciales,'calificacion'=>'GUARDADO']);
        $orden_venta->calificaciones()->save($calificacion);
        return redirect('ordenes_ventas');        
    }

    public function observar(ObservacionStoreRequest $request, $id)
    {
        $objeto= new Observacion();
        $objeto->observacion='<:'.$request->user()->iniciales.':>'.$request->observacion.'. .';
        $objeto->nombre_tipo=$request->nombre_tipo;
        $objeto->id_producto=$request->id_producto;
        $objeto->save();
        return back();
    }
    public function estatus(Request $request, $id)
    {
        //primero buscar la ultima 
        $orden_venta=OrdenVenta::findOrFail($id);
        //$orden_venta->calificacion()->delete();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'orden_venta',
            'ruta_siguiente'=>$request->ruta_siguiente,
            'ruta_califico'=>\Route::current()->getName(),
            'calificacion'=>$request->calificacion,
            'iniciales'=>auth()->user()->iniciales
            ]);
        $arr_url=explode('/',$request->url());
                $url= $arr_url[2].'/ordenes_ventas';
                //
        $usuarios_ventas=$this->usuario->getUsuario(['recurso'=>$request->ruta_siguiente]);//buscar usuarios de aprobaciones de ventas.
                    foreach ($usuarios_ventas as $key => $usuario_dpto_vtas) {
                        $contenido=array('msj'=>'ESTATUS DE orden venta: <h4> '.$orden_venta->numero_orden.'</h4>. HA CAMBIADO A '.$request->calificacion.'. '.
                            '<a href="'.$url.'?auto='.$orden_venta->numero_orden.'">Clic aquí para verificar</a>');
                        $correo=[
                            'remitente'=>$request->user()->email,
                            'alias'=>$request->user()->name,
                            'asunto'=>'Notificación de sistema.'
                        ];
                        $correo['destino']=$usuario_dpto_vtas->email;
                        $correo['contenido']=$contenido;
                        $this->correo->enviarCorreo($correo);
                    }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $objeto = OrdenVenta::withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico 
                        # code...
                        $objeto->delete();
                } 
               return redirect('ordenes_ventas');
    }
    public function restaurar(Request $request)
    {
        //}
        
        $objetos=OrdenVenta::OnlyTrashed()
        //->Buscar($request->all())
        ->orderBy('updated_at','desc')
        ->paginate(15);
        return view('ordenes_ventas.index',compact('objetos'));
    }
    public function entregar(Request $request)
    {
        //listado de ordenes ventas para surtir con esstatus enviado
        $objetos=OrdenVenta::Buscar($request->all())
        ->orderBy('updated_at','desc')
        ->paginate(15);
        foreach ($objetos as $key => $value) {
            //dd($value->estatus);
            if($value->estatus!=='ENVIADO'){
                unset($objetos[$key]);
            }
        }
        return view('ordenes_ventas.index',compact('objetos','request'));
    }
    
}
