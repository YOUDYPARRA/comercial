<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase as Reporte;
use App\Coordinacion;
use App\Tercero;
use App\User;
use App\Calificacion;
use Carbon\Carbon;
use App\Services\ManagerCorreo;
use App\Observacion;
use App\Http\Requests\ObservacionStoreRequest;
use App\Http\Requests\ReporteStoreRequest;
use App\Http\Requests\EnviarARequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use URL;
use App\Helpers\HelperUtil;
use App\Helpers\HelperUsuario;

class ReporteController extends Controller
{
protected $arr_bsc=[];
protected $correo;
protected $tercero;
protected $usuario;
    public function __construct(ManagerCorreo $envia_correo,HelperUsuario $consulta_usuario){
        $this->arr_bsc['clase']='R';
        //$this->arr_bsc['organizacion']=auth()->user()->org_name;
         $this->correo=$envia_correo;
         $this->tercero= new Tercero();
         $this->usuario= $consulta_usuario;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->wantsJson()){
            $objetos=Reporte::buscar($this->arr_bsc+$request->all())->get();

                return response()->json(
                [
                    "msg"=>"Success",
                    "objetos"=>$objetos->toArray()
                ],200
                );
            }else{

                if(!isset($request->buscar)){
                    $coordinaciones=Coordinacion::buscar(['nombre'=>auth()->user()->departamento,'modelo'=>'reportes']);
                      foreach ($coordinaciones as $value) {
                            $arr_cor[]=$value->atributo;
                        }
                    if(!empty($arr_cor)){
                        $arr_bsc['coordinacion']=$arr_cor;
                    }

                }else{
                    $coordinaciones=Coordinacion::buscar(['nombre'=>$request->coordinacion,'modelo'=>'reportes']);
                      foreach ($coordinaciones as $value) {
                            $arr_cor[]=$value->atributo;
                        }
                    if(!empty($arr_cor)){
                        $arr_bsc['coordinacion']=$arr_cor;                    }
                }
                $objetos=Reporte::buscar($this->arr_bsc+$request->all())
                ->orderBy('updated_at','desc')
                ->paginate(15);
                return view('reportes.index',compact('objetos','request'));
            }
    }
    public function restaurar(Request $request)
    {
        //
        $objetos=Reporte::OnlyTrashed()
        ->buscar($request->all())
        //->buscar($this->arr_bsc+$request->all())
        ->paginate(15);
        return view('reportes.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('reportes.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReporteStoreRequest $request)
    {
        //
        //dd($request->p_delivery_location_id);
        ///INICIO VERIFICA TERCERO
        HelperUtil::log(['GENERAR REPORTE: '=>$request->all()]);
        $tercero=null;
        $tercero=$this->tercero->name($request->nombre_fiscal)->get();
        ///FIN VERIFICA TERCERO
        $objeto = new Reporte($request->all());
        //$objeto->id_cliente=$request->p_delivery_location_id;//ID DE ENTREGA
        $vigencia=$objeto->vigencia= Carbon::now()->addWeeks(1);
        //echo $vigencia;
        $objeto->foliar='R';
        if(count($tercero)==0){
            $objeto->estatus='INVALIDO';
        }else{
            $objeto->estatus='ENVIADO';
        }
        HelperUtil::log(['TERCERO: '=>'TERCERO']+$tercero->toArray());
        $objeto->fecha_recepcion= Carbon::now();
        //$objeto->fecha_inicio=$request->fecha_inicio;
        if(!empty($request->fecha_inicio)){
            $objeto->fecha_inicio=Carbon::createFromFormat('d-m-Y H',$request->fecha_inicio.'23');
        }else{
            $objeto->fecha_inicio=Carbon::now();
        }
        if(!empty($request->fecha_fin)){
            $objeto->fecha_fin=Carbon::createFromFormat('d-m-Y H',$request->fecha_fin.'23');
        }else{
            $objeto->fecha_fin=Carbon::now();
        }
        $objeto->autor= auth()->user()->iniciales;
        //$objeto->sucursal= auth()->user()->lugar_centro_costo;
        //$objeto->organizacion= auth()->user()->org_name;
        $objeto->enviar_aviso= 'S';//enviar aviso a ing de servicio asignado.
        $objeto->clase= 'R';
        $objeto->modificable= '0';
        HelperUtil::log(['REPORTE'=>':']+$objeto->toArray());
        $objeto->save();

        //INICIO aviso coordinacion
        if($objeto->estatus=='ENVIADO'){
            $arr_des=[];
            //BUSCAR COORDINACION SEGÚN REPORTE DE SERVICIO en coordinaciones.nombre
            //HelperUtil::log(['Coordinacion::nombre($objeto->coordinacion)->get() :'.count(Coordinacion::nombre($objeto->coordinacion)->get())=>Coordinacion::nombre($objeto->coordinacion)->get()]);
            foreach(Coordinacion::nombre($objeto->coordinacion)->get() as $pseudocoordinacion){
                //HelperUtil::log(['$departamento  :'.count($pseudocoordinacion->nombre )=>$pseudocoordinacion->nombre]);
                //HelperUtil::log(['ID:'.count($pseudocoordinacion->nombre )=>$pseudocoordinacion->id]);
                //HelperUtil::log(['$pseudocoordinacion->nombre :'.count($pseudocoordinacion->nombre)=>$pseudocoordinacion->nombre]);
                foreach ($this->usuario->getUsuario(['departamento'=>'*'.$pseudocoordinacion->coordinacion.'*','puesto'=>'*COORDINADOR*']) as $coordinador) {
                    //HelperUtil::log(['$coordinador :'.count($coordinador)=>$coordinador->email]);
                    //inicio verifica q no se repita correo
                    $agregar=0;
                    foreach ($arr_des as $value) {
                        if($value==$coordinador->email){
                            $agregar++;
                        }
                    }
                    //if($agregar==0){
                        //HelperUtil::log(['$objeto->sucursal :'.count($objeto->sucursal)=>$objeto->sucursal]);
                        if($objeto->sucursal=='GDL'){
                            $gdl=$this->usuario->getUsuario(['lugar_centro_costo'=>'GDL','puesto'=>'*COORDINADOR*'])->first();
                            $arr_des[]=$gdl->email;
                        }
                        $arr_des[]=$coordinador->email;
                    //}
                    //fin verifica q no se repita correo
                }
            }//fin foreach coordinacion
            $this->reporteEnviado($objeto,$arr_des,$request);
        }
          if ($request->wantsJson()){
                return response()->json(
                [
                    "msg"=>"GUARDADO CORRECTAMENTE"
                ],200
                );
            }else{
                abort(404);
        }
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
        $objetos=Reporte::buscar(['id_foraneo'=>$id])->get();
        $objeto=Reporte::findOrFail($id);
        if(is_object($objeto->r_cotizaciones)){
            $objeto->r_cotizaciones;
        }

        if ($request->wantsJson()){
                return response()->json(
                [
                    "objeto"=>$objeto->toArray()
                ],200
                );
            }
        return view('reportes.show',compact('objeto','objetos'));
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
        return view('reportes.edit',compact('id'));
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
         $objeto=Reporte::findOrFail($id);
         $objeto->estatus=$this->invalidoEnviado($objeto);
         $objeto->modificable='0';
         if(!empty($request->resuelto_por)){
                if(strlen($request->resuelto_por)>0){
                    $califico=\Route::current()->getName();
                    Calificacion::create([
                    'id_producto'=>$id,
                    'nombre_tipo'=>'reportes',
                    'ruta_siguiente'=>'reportes.index',
                    'ruta_califico'=>$califico,
                    'calificacion'=>$request->resuelto_por,
                    'iniciales'=>auth()->user()->iniciales
                    ]);
                    $objeto->resuelto_por=$request->resuelto_por;
                    $objeto->estatus='CERRADO';
                    $objeto->save();
                }
        }else{
          $objeto->update($request->all());
        }
        //$objeto->id_cliente=$request->p_delivery_location_id;
        HelperUtil::log(['REPORTE UPDATE']+$objeto->toArray());
        if ($request->wantsJson()){
                return response()->json(
                [
                    "msg"=>"ACTUALIZADO CORRECTAMENTE"
                ],200
                );
            }else{
            return back();
        }
    }
    public function observar(ObservacionStoreRequest $request, $id)
    {
        $objeto= new Observacion();
        $objeto->observacion='<:'.$request->user()->iniciales.':>'.$request->observacion.'. . .';
        $objeto->nombre_tipo=$request->nombre_tipo;
        $objeto->id_producto=$request->id_producto;
        $objeto->save();
        return back();
    }

     public function correo(Request $request, $id)
    {

        $objeto=Reporte::findOrFail($id);
        switch ($request->vi) {
            case '0':
            echo 'ENVIAR CORREO';
                # code...AVISO REPORTE PARA MODIFICAR
            $objeto->update($request->all());
            Calificacion::create([
                    'id_producto'=>$id,
                    'nombre_tipo'=>$request->nombre_tipo,
                    'ruta_siguiente'=>$request->ruta_siguiente,
                    'ruta_califico'=>\Route::current()->getName(),
                    'calificacion'=>$request->calificacion,
                    'iniciales'=>auth()->user()->iniciales
                    ]);
                $usuarios_aprobadores=$this->usuario->getUsuario(['recurso'=>'reportes.correo']);//buscar usuarios de servicio con permiso de correo
                if(!empty($usuarios_aprobadores)){
                //dd($usuarios_aprobadores);
                    $arr_url=explode('/',$request->url());
                            $url= $arr_url[2].'/reportes';
                                foreach ($usuarios_aprobadores as $key => $aprobador) {
                                    $contenido=array('msj'=>$request->msj.' '.$objeto->folio.
                                        '<a href="'.$url.'?folio='.$objeto->folio.'&estatus='.$objeto->estatus.'">Clic aquí para verificar</a>');
                                    $correo=[
                                        'remitente'=>$request->user()->email,
                                        'alias'=>$request->user()->name,
                                        'asunto'=>'Notificación de sistema.'
                                    ];
                                    //dd($aprobador->email);
                                    //echo $aprobador->email;
                                    $correo['destino']=$aprobador->email;
                                    $correo['contenido']=$contenido;
                                    $this->correo->enviarCorreo($correo);
                                }
                }
                HelperUtil::log(['REPORTE CORREO :'.count($objeto)=>$objeto]);
                return back();
                break;

            default:
                # ENVIA PARA SOLICITAR MODIFICAR REPORTE DE SERVICIO
                //$objeto->update($request->all());
                //$objeto->calificacion()->delete();
                Calificacion::create([
                    'id_producto'=>$id,
                    'nombre_tipo'=>$request->nombre_tipo,
                    'ruta_siguiente'=>$request->ruta_siguiente,
                    'ruta_califico'=>\Route::current()->getName(),
                    'calificacion'=>$request->calificacion,
                    'iniciales'=>auth()->user()->iniciales
                    ]);
                $usuarios_aprobadores=User::buscar(['puesto'=>'GERENTE DE OPERACIONES'])->get();
                if(!empty($usuarios_aprobadores)){
                    $arr_url=explode('/',$request->url());
                            $url= $arr_url[2].'/reportes';
                            $sitio=null;
                            $sitio=HelperUtil::getSitio();

                                foreach ($usuarios_aprobadores as $key => $aprobador) {
                                    $contenido=array('msj'=>$request->msj.' '.$objeto->folio.
                                        '<a href="'.$url.'?folio='.$objeto->folio.'&estatus='.$objeto->estatus.'">Clic aquí para verificar</a>');
                                    $correo=[
                                        'remitente'=>$request->user()->email,
                                        'alias'=>$request->user()->name,
                                        'asunto'=>'Notificación de sistema.'
                                    ];
                                    $correo['destino']=$aprobador->email;
                                    $correo['contenido']=$contenido;
                                    $this->correo->enviarCorreo($correo);
                                }
                }
                HelperUtil::log(['REPORTE CORREO :'.count($objeto)=>$objeto]);
                return back();
                break;
        }
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
        $objeto = Reporte::withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico
                        # code...
                        $objeto->delete();
                }
               return redirect('reportes');
    }
    public function crea($id)
    {
        //
        return view('reportes.crea',compact('id'));
    }
    public function reporteEnviado($objeto,Array $destinos,$request){
            //$arr_des[]=$destinatario;
        HelperUtil::log(['$destinos :'.count($destinos)=>$destinos]);
        $arr_url=explode('/',$request->url());
        $url= $arr_url[2].'/reportes';
            $destinatario[]=array('destino' => $destinos,
            'msj'=>'REPORTE DE SERVICIO CREADO '.$objeto->folio.'<a href="'.$url.'?folio='.$objeto->folio.'">Clic aquí para verificar</a>'
            );
        if(!empty($destinos)){
             $objeto->aviso($destinatario);
            }
            return;
    }
    public function enviar(EnviarARequest $request,$id){
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'reportes',
            'ruta_siguiente'=>'reportes.index',
            'ruta_califico'=>$califico,
            'calificacion'=>$request->estatus,
            'iniciales'=>$iniciales
            ]);
        //dd($request->all());
        $objeto=Reporte::findOrFail($id);
        $objeto->update(['estatus'=>'ENVIADO']);
        //INICIO enviar aviso a aprobador
        $aprobador=null;
        foreach ($request->aprobador as $val) {
                $aprobador[]= new User(['email'=>$val]);
            }
        //INICIO enviar aviso a aprobador
        if(!empty($aprobador)){
            $arr_url=explode('/',$request->url());
            $url= $arr_url[2].'/reportes';

            foreach ($aprobador as $v) {
                $destinatario=array('destino' => $v->email,'msj'=>
                    'REPORTE DE SERVICIO GENERADO '.$objeto->folio_contrato. ' '.$objeto->estatus.' <a href="'.$url.'?folio='.$objeto->folio.'">Clic aquí para verificar</a>'
                 );
                $arr_des[]=$destinatario;
            }

        if(!empty($arr_des)){
         $objeto->aviso($arr_des);
        }
        }
        //FIN enviar aviso a aprobador
        return back();
    }
    public function invalidoEnviado($objeto){/*VERIFICA A ENVIADO A ESTATUS CUANDO ES INVALIDO Y TIENE DATOS VALIDOS DE ENTREGA Y FISCALES*/
        $valido='INVALIDO';
        if($objeto->estatus=='INVALIDO'){
            if(!empty($objeto->c_bpartner_id)){
                if(!empty($objeto->c_location_id)){
                    $valido='ENVIADO';
                }
            }
        }
        return $valido;
    }
}
