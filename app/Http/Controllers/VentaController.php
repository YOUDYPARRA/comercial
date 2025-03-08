<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra as Venta;
use App\Calificacion;
use App\Observacion;
use App\InsumoCompraVenta;
use App\AlmacenStock;
use App\GestionStock;
use App\Helpers\HelperUsuario;
use App\Helpers\HelperUtil;
use App\Services\ManagerCorreo;
use App\Http\Requests\ObservacionStoreRequest;
use App\Http\Requests\ArchivoDigitalStoreRequest;
use App\Http\Requests;
use App\Http\Requests\VentaStoreRequest;
use App\Http\Controllers\Controller;

class  VentaController extends Controller
{
protected $usuario;
protected $correo;
protected $arr_json;
     public function __construct(HelperUsuario $consulta_usuario, ManagerCorreo $envia_correo){
         $this->usuario= $consulta_usuario;
         $this->correo=$envia_correo;
        $this->arr_json=[];
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->buscar)){//mostrar solo guardadas y aprobadas
                $objetos=Venta::buscar($request->all())
                    ->orderBy('updated_at','desc')
                    ->paginate(15);

        }else{
            switch ($request->v) {
                case '1':
                    $objetos=Venta::buscar($request->all())
                    ->orderBy('updated_at','desc')->get();
                    break;

                default:
                    $objetos=Venta::buscar(
                        [
                        //'estatus'=>'GUARDADO',
                        'tipo_archivo'=>'v']
                        )
                    ->orderBy('updated_at','desc')
                    ->paginate(15);
                    break;
            }
        }
            return view('ventas.index',compact('objetos','request'));
    }
    public function enviado(Request $request)
    {
        return back();
        /*
        if(isset($request->buscar)){
            $objetos=Venta::buscar($request->all())
                ->where('tipo_archivo','v')
                ->orderBy('updated_at','desc')
                ->paginate(15);
        }else{
            $objetos=Venta::buscar([
                'estatus'=>'ENVIADO',
                'tipo_archivo'=>'v'])
                ->orderBy('updated_at','desc')
                ->paginate(15);
        }
            return view('ventas.index',compact('objetos','request'));
            */

    }

    public function restaurar(Request $request){
        $objetos=Venta::OnlyTrashed()
            ->paginate(15);
            //dd($objetos);
            return view('ventas.index',compact('objetos','request'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function create($id)
    public function create($id)
    {
        return view('ventas.ventas_create',compact('id'));
    }
    public function solicitud()
    {
        return view('ventas.ventas_solicitud');
    }
    public function prestamo($id)
    {
        return view('ventas.ventas_prestamo',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaStoreRequest $request)
    //public function store(Request $request)
    {
HelperUtil::log(['Venta Creada'=>$request->all()]);
        //dd($request->insumos);
        //inicia obtener ultima compra
        $compra_folio=Venta::select('id','folio')->where('org_id',$request->org_id)->Where('tipo_archivo','v')->orderBy('folio','desc')->limit(1)->get();
        //dd($request->all());
        if(empty($compra_folio[0])){
            $ultima_orden=1;
        }else{
            $ultima_orden=$compra_folio[0]->folio+1;
        }
        //fin obtener ultima compra

        //echo $c=count($arr_request)-1;
        //end($arr_request);
        //dd(key($arr_request));
        $cont=0;
        foreach ($request->all() as $key => $value) {
            $cont++;
            if($key!=='insumos'){
               $this->aJson($key,$value);
                $compra[$key]=$value;
            }
        }
        $compra['folio']=$ultima_orden;
        $compra['estatus']='GUARDADO';
        $compra['dato']=json_encode($this->arr_json);

        $objeto_nuevo=Venta::create($compra);

        //inicia relacion estatus - objeto.
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$objeto_nuevo->id,
            'nombre_tipo'=>'venta',
            'ruta_siguiente'=>'compra.IndexAprobacion',
            'ruta_califico'=>$califico,
            'calificacion'=>'GUARDADO',
            'iniciales'=>$iniciales
            ]);
        //fin registro estatus - objeto.
        $arr_insumos_compras=[];
            foreach ($request->insumos as $insumo_compra) {
                $insumo_compra['id_compra_venta']=$objeto_nuevo->id;
                //dd($insumo_compra);
                //INICIO CALCULO MAXIMO
                /*
                if($insumo_compra->tipo_equipo=='CONSUMIBLE'){
                    $insumo_configurado=null;
                    $insumo_configurado= AlmacenStock::buscar([
                    'clase'=>'CONF',
                    'id_warehouse'=>$insumo_compra->id_warehouse,
                    'org_name'=>$objeto_nuevo->org_name,
                    'codigo_proovedor'=>$insumo_compra->codigo_proovedor])->first();
                    if(count($insumo_configurado)){
                        $gs=new GestionStock;
                        $gs->anterioranio=$this->hoy=Carbon::today()->subYear();
                        $gs->org_name=$objeto_nuevo->org_name;//Viene en venta head
                        $gs->codigo_proovedor=$insumo_compra->codigo_proovedor;//viene el linea
                        $gs->id_warehouse=$insumo_compra->id_warehouse;//no obligatorio
                        $gs->almacen=$insumo_configurado->almacen;//viene head venta
                        $gs->porcentaje_seguridad=$insumo_configurado->porcentaje_seguridad;//tabla AlmacenStock con bande Conf
                        $gs->tiempo_respuesta=$insumo_configurado->tiempo_respuesta;//tabla AlmacenStock con bandera Conf
                        $calculo=$gs->getPedidoAlmacenStock();
                    }
                }*/
                //FIN CALCULO MAXIMO
                $arr_insumos_compras[]=new InsumoCompraVenta($insumo_compra);
            }
            //dd($arr_insumos_compras);
        $objeto_nuevo->insumos_compras_ventas()->saveMany($arr_insumos_compras);
        //fin alta insumos compras
        return response()->json(
                [
                    "msg"=>"Success"
                ],200);
        //return redirect('compras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //
        if($request->wantsJson()){
            $objetos=Venta::findOrFail($id);
            $objetos->insumos_compras_ventas;
               return response()->json(
                [
                    "msg"=>"Success",
                    "venta"=>$objetos->toArray()
                ],200
                );

        }else{
            $objeto = Venta::findOrFail($id);
            return view('ventas.show',compact('objeto'));
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
        //dd($id);
        //$objeto = Venta::find($id);
            //realizar consulta Compras
            return view('ventas.ventas_edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        foreach ($request->all() as $key => $value) {
            if($key!='insumos'){
                $this->aJson($key,$value);
            $compra[$key]=$value;
            }
        }

        $objeto = Venta::findOrFail($id);
        $compra['dato']=json_encode($this->arr_json);
        $objeto->update($compra);
        $objeto->insumos_compras_ventas()->delete();

        foreach ($request->insumos as $insumo_compra) {
            $insumo_compra['id_compra']=$id;
            //CALCULAR MAXIMO (COMPRA) DE ESTE $INSUMO_COMPRA
            /**
            *Si No hay tiempo_respuesta, GUARDAR BANDERA STOCK EN "NO"
            *SI EL MAXIMO ES MENOR O IGUAL A $INSUMO_COMPRA   GUARDAR BANDERA STOCK EN "NO"
            *Ver tipo_equipo== consumibles, ver el tiempo d entrega, almacen(almacen biene en la venta),
            **/

            $arr_insumos_compras[]=new InsumoCompraVenta($insumo_compra);
        }
        $objeto->insumos_compras_ventas()->saveMany($arr_insumos_compras);


        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        $objeto->calificacion()->delete();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'venta',
            'ruta_siguiente'=>'venta.IndexAprobacion',
            'ruta_califico'=>$califico,
            'calificacion'=>'GUARDADO',
            'iniciales'=>$iniciales
            ]);
        return response()->json(
                [
                    "msg"=>"Success"
                ],200);
    }
    public function estatus(Request $request, $id)
    {
        return back();
    /*
        //primero buscar la ultima
        $compra=Venta::findOrFail($id);
        $compra->update(['estatus'=>$request->calificacion]);
        $compra->calificacion()->delete();
        $ruta_siguiente='';
        if($request->ruta_siguiente){
            $ruta_siguiente=$request->ruta_siguiente;
            $arr_url=explode('/',$request->url());
                    $url= $arr_url[2].'/ventas';
            $usuarios_ventas=$this->usuario->getUsuario(['recurso'=>$request->ruta_siguiente]);
                if(count($usuarios_ventas)>0){
                        foreach ($usuarios_ventas as $key => $usuario_dpto_vtas) {
                            $contenido=array('msj'=>'ESTATUS DE VENTA: <h4> '.$compra->numero_orden.'</h4>. HA CAMBIADO A '.$request->calificacion.'. '.
                                '<a href="'.$url.'?numero_orden='.$compra->numero_orden.'">Clic aquí para verificar</a>');
                            $correo=[
                                'remitente'=>$request->user()->email,
                                'alias'=>$request->user()->name,
                                'asunto'=>'Notificación de sistema.'
                            ];
                            $correo['destino']=$usuario_dpto_vtas->email;
                            $correo['contenido']=$contenido;
                            $this->correo->enviarCorreo($correo);
                        }
                }
        }
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'venta',
            'ruta_siguiente'=>$ruta_siguiente,
            'ruta_califico'=>\Route::current()->getName(),
            'calificacion'=>$request->calificacion,
            'iniciales'=>auth()->user()->iniciales
            ]);

        return back();*/
    }
    public function observar(ObservacionStoreRequest $request, $id)
    {
        //dd($request->all());
        $objeto= new Observacion();
        $objeto->observacion='<:'.$request->user()->iniciales.':>'.$request->observacion.'. ';
        $objeto->nombre_tipo=$request->nombre_tipo;
        $objeto->id_producto=$request->id_producto;
        $objeto->save();
        return back();
    }
    public function digitalizar($id){
        $objeto=Venta::findOrFail($id);
        return view('ventas.digitalizar',compact('objeto'));
    }
    public function archivar(ArchivoDigitalStoreRequest $request){
        $file = $request->file('file');
       $arr_nombre_archivo =explode('.',$file->getClientOriginalName());
       $nombre='Ven'.$request->id.'.'.$arr_nombre_archivo[count($arr_nombre_archivo)-1];
       \Storage::disk('local')->put($nombre,  \File::get($file));
        $objeto = Venta::findOrFail($request->id);
        $objeto->digitalizacion=$nombre;
        $objeto->update();
        return view('ventas.digitalizar',compact('objeto'));
    }
    public function digital($id){
        $objeto=Venta::findOrFail($id);
        $ruta=  '/var/www/html/comercial/storage/app/'.$objeto->archivo_digital;
        $headers = array(
                    'Content-Type' => 'application/octet-stream',
                );
        return response()->download($ruta,$objeto->archivo_digital,$headers);
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
$usuario=auth()->user()->iniciales;
        $objeto = Venta::withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       //$objeto->restore();
                       $objeto->update(['estatus'=>'GUARDADO']);
                       Calificacion::create([
                        'id_producto'=>$objeto->id,
                        'nombre_tipo'=>'venta',
                        'ruta_siguiente'=>'venta.Index',
                        'ruta_califico'=>'',
                        'calificacion'=>'GUARDADO',
                        'iniciales'=>$usuario
                        ]);
                }else
                {//Borrado logico
                        # code...
                    $objeto->update(['estatus'=>'CANCELADO']);
                    //$objeto->delete();
                    Calificacion::create([
                        'id_producto'=>$objeto->id,
                        'nombre_tipo'=>'venta',
                        'ruta_siguiente'=>'venta.Index',
                        'ruta_califico'=>'',
                        'calificacion'=>'CANCELADO',
                        'iniciales'=>$iniciales=$usuario
                        ]);
                }
		       return redirect('ventas');
    }

    public function aJson($key,$value){
        switch ($key) {
            case 'p_delivery_location_id':
                $this->arr_json['p_delivery_location_id'] = $value;
                break;
            case 'stock':
                $this->arr_json['stock'] = $value;
                break;
            case 'numero_contrato_cliente':
                $this->arr_json['numero_contrato_cliente'] = $value;
            break;
            case 'moneda':
                $this->arr_json['moneda'] = $value;
            break;
        }
    }
}
