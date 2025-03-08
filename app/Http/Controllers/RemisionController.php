<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Remision;
use App\Compra as CompraVenta;
use App\Http\Requests\ArchivoDigitalRemisionCotizacionStoreRequest;
use App\Helpers\HelperUsuario;
use App\Services\ManagerCorreo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  RemisionController extends Controller
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
    
        $objetos=Remision::Reporte($request->get('reporte'))
            ->NumeroContrato($request->get('numero_contrato'))
            ->NumeroCotizacion($request->get('numero_cotizacion'))
            ->NumeroOrdenServicio($request->get('numero_orden_servicio'))
            ->NumeroOrdenCompra($request->get('numero_orden_compra'))
            ->NumeroOrdenVenta($request->get('numero_orden_venta'))
            ->ArchivoDigital($request->get('archivo_digital'))
            ->paginate(25);
        return view('remisiones.index',  compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('remisiones.create');
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
        Remisiones::create($request->all());
        return redirect('remisiones');
    }
    public function digitalizar($id){
        $objeto=Remision::find($id);
        if($objeto){
            
        }
        return view('remisiones.digitalizar',compact('objeto'));
    }
        /**
     * Store a newly created resource in storage.
     *Digitaliza una remision con numero de cotizacion
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function digitalizarCotizacion($id_venta){
        $objeto=CompraVenta::findOrFail($id_venta);
        return view('remisiones.digitalizarcotizacion',compact('objeto'));
    }
    public function archivar(ArchivoDigitalRemisionCotizacionStoreRequest $request){
        $file = $request->file('file');
       //explode('.',$file->getClientOriginalName());
       $extension=last(explode('.',$file->getClientOriginalName()));
       $objeto=Remision::updateOrCreate(['id'=>'$request->id'],$request->all());
       $nombre='Rem'.$objeto->id.'.'.$extension;
       //$nombre='Rem'.$remision->id.'.'.$arr_nombre_archivo[count($arr_nombre_archivo)-1];
       \Storage::disk('local')->put($nombre,  \File::get($file));
        //$objeto = Remision::findOrFail($request->id);
        $objeto->archivo_digital=$nombre;
        $objeto->update();
        //NOTIFICAR QUE SE HA GENERADO REMISION PARA FACTURAR...
        $arr_url=explode('/',$request->url());
                $ip_url= $arr_url[2].'/remisiones';
        $correo=[
                'remitente'=>$request->user()->email,
                'alias'=>$request->user()->name,
                'asunto'=>'Notificación de sistema.'
                ];
        if(isset($request->numero_cotizacion)){
            $correo['contenido']=array('msj'=>'COTIZACION: <h4> '.$request->numero_cotizacion.'</h4>. A SIDO REMISIONADA. '.'<a href="'.$ip_url.'?&numero_cotizacion='.$request->numero_cotizacion.'">Clic aquí para verificar</a>');
        }
        $usuarios=$this->usuario->getUsuario(['recurso'=>'remisiones.index']);//buscar usuarios de aprobaciones de ventas.
        if(!empty($usuarios)){
            foreach ($usuarios as $key => $usuario) {
                $correo['destino']=$usuario->email;
                $this->correo->enviarCorreo($correo);
            }
        }
        //FIN NOTIFICAR
        return redirect('remisiones');
    }
    public function digital($id){
        $objeto=Remision::findOrFail($id);
        $ruta=  '/var/www/html/comercial/storage/app/'.$objeto->archivo_digital;
        $headers = array(
                    'Content-Type' => 'application/octet-stream',
                );
        return response()->download($ruta,$objeto->archivo_digital,$headers);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

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
$objeto = Remision::withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico 
                        # code...
                        $objeto->delete();
                } 
               return redirect('remisiones');    }
}
