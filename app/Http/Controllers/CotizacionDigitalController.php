<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cotizacion;
use App\Http\Requests\CotizacionDigitalStoreRequest;
use App\Services\ManagerCorreo;
use App\Helpers\HelperUsuario;
use App\Http\Controllers\Controller;

class  CotizacionDigitalController extends Controller
{
    protected $correo;
    protected $usuario;
    public function __construct(HelperUsuario $usuario,ManagerCorreo $correo){
        $this->correo=$correo;
        $this->usuario=$usuario;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //20160204 ADD EMS
//     public function __construct(){
//         $this->middleware('auth');
//     }
//    
//    public function index(Request $request)
//    {
//   
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $cotizacion = new Cotizacion();
        $cotizacion->id =$id;
        return view('cotizaciones_digitales.create',compact('cotizacion'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CotizacionDigitalStoreRequest $request)
    {   //
        $arr_url=explode('/',$request->url());
                $url= $arr_url[2].'/cotizaciones';
        $file = $request->file('file');
       $arr_nombre_archivo =explode('.',$file->getClientOriginalName());
       $nombre='Cot'.$request->id.'.'.$arr_nombre_archivo[count($arr_nombre_archivo)-1];
       \Storage::disk('local')->put($nombre,  \File::get($file));
        $cotizacion = Cotizacion::findOrFail($request->id);
        $cotizacion->cotizacion_digital=$nombre;
        //$cotizacion->estatus='CONCRETADO';
        $cotizacion->update();
        //  INICIA ENVIAR AVISO 
        if($cotizacion->nombre_empleado==$request->user()->name){
        //ENVIA AVISO A CREDITO Y COBRANZA q el usuario subio un archivo a la cotizacion
            $usuarios_dpto=$this->usuario->getUsuario(['recurso'=>'cotizaciones.index?aprobacion=2']);
        }else{
        //Envia AVISO A USUARIO
            $usuarios_dpto=$this->usuario->getUsuario(['nombre'=>$cotizacion->nombre_empleado]);
        }

        $msj['msj']='<h3>SE HA MODIFICADO EL ARCHIVO DIGITALIZADO, DE COTIZACION.</h3> '.$cotizacion->numero_cotizacion.'<a href="'.$url.'?numero_cotizacion='.$cotizacion->numero_cotizacion.'">Clic aquí para verificar</a>';
        foreach ($usuarios_dpto as $key => $usuario_dpto) {
            $aviso=[
              'remitente'=>$request->user()->email,
            'alias'=>$request->user()->name,
            'asunto'=>'Notificación de sistema.',
            'contenido'=>$msj,
            'destino'=>$usuario_dpto->email,
            ];
            $this->correo->enviarCorreo($aviso);
            
        }
        //FIN ENVIO AVISO COTIZACIONES NOTIFICADOS . . .
        return view('cotizaciones_digitales.create',compact('cotizacion'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objeto = Cotizacion::findOrFail($id);
        $ruta=  '/var/www/html/comercial/storage/app/'.$objeto->cotizacion_digital;
        $headers = array(
                    'Content-Type' => 'application/octet-stream',
                );
//                return response()->download(app_path().'/Cot9.pdf','Cot9.pdf',$headers);
                return response()->download($ruta,$objeto->cotizacion_digital,$headers);
    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }

}
