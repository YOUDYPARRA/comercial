<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonaServicio;
use App\Clase as Programacion;
//use App\Clase as Prestamo;
use App\Calificacion;
use App\User;
use Carbon\Carbon;
use App\Helpers\HelperUtil;
use App\Services\ManagerCorreo;
use App\Http\Requests\ProgramacionStoreRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProgramacionController extends Controller
{
    private $objeto;
    private $correo;
    private $user;
    protected $arr_bsc=[];
    public function __construct(ManagerCorreo $correo){
        $this->arr_bsc['clase']='P';
        //$this->arr_bsc['organizacion']=auth()->user()->org_name;
        $this->objeto = new Programacion(['clase'=>'P']);
        $this->correo=$correo;
        $this->user = new User;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //
        if($request->buscar){
            foreach ($request->all() as $key => $value) {
                if($key=='fecha_inicio' ){

                    //echo '-->'.$key;
                    if(!empty($value) ){
                        $f_i=Carbon::createFromFormat('d-m-Y',$value);
                        $arr_fecha_inicio=explode(' ',$f_i);
                        $this->arr_bsc[$key]='*'.$arr_fecha_inicio[0].'*';
                        //$request->fecha_inicio=$arr_fecha_inicio[0];
                    }
                }else if($key=='atiende' ){
                  $arr_id=$this->getPersonas($request->atiende);
                }else{
                    $this->arr_bsc[$key]=$value;
                }
            }
            if(!empty($request->atiende)){
              HelperUtil::log($arr_id);
              $objetos=Programacion::buscar($this->arr_bsc)->whereIn('id',$arr_id)->paginate();
              HelperUtil::log(['$OBJETOS'=>$objetos]);

            }else{

              $objetos=Programacion::buscar($this->arr_bsc)->paginate();
            }
        }else{
            $this->arr_bsc['sucursal']=auth()->user()->lugar_centro_costo;
            $objetos=Programacion::buscar($this->arr_bsc+$request->all())
            ->orderBy('id','desc')
            ->paginate();
        }
        return view('programaciones.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)//id de reporte de servicio
    {
        /*1
        $this->objeto->fecha_inicio=Carbon::createFromFormat('d-m-Y','29-11-2016');
        dd($this->objeto->fecha_inicio);
        */
        //AL CREAR, ENVIAR LA PROGRAMACION Q EXISTA PARA EL REPORTE.
        $objetos=Programacion::buscar(['id_foraneo'=>$id])->get();//regresa DOCUMENTOS relacionados para ese reporte
        return view('programaciones.create',compact('id','objetos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramacionStoreRequest $request )
    {
        //dd($request->persona);
        $x='';
        $i=0;
        $l=0;
        $vacio=0;
        $arr_val=[];
        if(count($request->persona)>0){
            $y=array_sort($request->persona,function($value){
                return $value;

            });
            foreach ($y as $key=> $value) {
                if(!empty($value)){

                    if($l==0){
                        $x=$value;

                    }else if($l>=1){
                        if($x==$value){
                            $i++;
                        }
                        $x=$value;

                    }
                    $l=$l+1;

                }else{
                    $vacio++;
                }

            }

            //dd(count($request->persona));

            if($i>0){
                $arr_val['msg']="INGENIERO DE SERVICIO REPETIDO";
            }
            $z=count($request->persona);
            if($vacio==$z){
                $arr_val['msg']="AGREGE INGENIERO";
            }

        }else{
            $arr_val['msg']="SELECCIONE INGENIERO";
        }
        /*if(!empty($request->id_cotizacion)){
            if(($request->condicion_servicio!='FACTURAR') && ($request->condicion_servicio!='FACTURAR VIP')){
                //dd($request->condicion_servicio);
                $arr_val['msg']="VERIFIQUE LA CONDICION DE SERVICIO CON LA COTIZACION...";
            }

        }
        */

        if($request->condicion_servicio=='CONTRATO'){
            if(empty($request->folio_contrato)){
                $arr_val['msg']="VER LA CONDICION DE SERVICIO CON EL CONTRATO";
            }

        }
        if(!empty($request->folio_contrato)){
            if($request->condicion_servicio!='CONTRATO'){
                $arr_val['msg']="VERIFIQUE LA CONDICION DE SERVICIO CON EL CONTRATO";
            }

        }

        if(!empty($arr_val)){
            return response()->json($arr_val,422);
        }
        //FIN VALIDACIONES
        HelperUtil::log(['GENERAR PROGRAMACION: '=>$request->all()]);

        $this->objeto->autor=auth()->user()->iniciales;
        $this->objeto->fill($request->except(['clase','autor','folio']));
        //$this->objeto->foliar='P';
        $this->objeto->fecha_inicio=Carbon::createFromFormat('d-m-Y',$request->fecha_inicio);
        $this->objeto->fecha_fin=Carbon::createFromFormat('d-m-Y',$request->fecha_fin);
        $this->objeto->id_foraneo=$request->id;
        $reporte=Programacion::findOrFail($request->id);
        $this->objeto->folio=$reporte->folio;
        $this->objeto->estatus='GUARDADO';


        foreach ($request->persona as $persona) {
            # code...
            $user=$this->user->findOrFail($persona);
            $arr_persona=[];
            if(!empty($persona)){
            $arr_persona['id_user']=$user->id;
            $arr_persona['iniciales']=$user->iniciales;
            $arr_persona['email']=$user->email;
            $arr_persona['name']=$user->name;
            $arr_persona['asistencia']=$request->asistencia;//oficina o siti'
            $arr_persona['clase']='P';
            $arr_persona['vigente']='1';
                $arr_personas_servicio[]= new PersonaServicio($arr_persona);
            }
        }
        //dd($this->objeto->folio);
            $this->objeto->save();
            $this->objeto->personas_servicio()->saveMany($arr_personas_servicio);
            $reporte->estatus='PROGRAMADO';
            $reporte->folio_contrato=$request->folio_contrato;
            $reporte->save();
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
    public function show(Request $request , $id)
    {
        $arr_ins_cot=null;
        $arr_ins_pres=null;
        $arr_compras_ventas=null;
        $prestamos=null;
        $cot=null;
        if ($request->wantsJson()){
        //qry por id de la Clase; reporte
            $objeto=Programacion::findOrFail($id);
            $objeto->personas_servicio;
            //INICIO BUSCAR INSUMOS DE COTIZACION
            if(strlen($objeto->id_cotizacion)>0){
                $arr_ins_cot=$this->getCotizaciones($objeto->id_cotizacion);
            }
            //FIN BUSCAR INSUMOS DE COTIZACION
            HelperUtil::log($arr_ins_cot);
            //INICIO BUSCAR INSUMOS DE PRESTAM
            $arr_ins_pres=$this->prestamosProductos($objeto);
            //FIN BUSCAR INSUMOS DE PRESTAMO
            $objeto->insumos=$this->unionInsumos($arr_ins_cot[1],$arr_ins_pres);
            $objeto->numero_cotizacion=$arr_ins_cot[0];
            //$objeto->insumos=$arr_pres;
                return response()->json(
                [
                    "objeto"=>$objeto->toArray()
                ],200
                );
            }
            $objeto= Programacion::findOrFail($id);
            return view('programaciones.show',compact('objeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ////ID DE LA CLASE
        return view('programaciones.edit',compact('id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramacionStoreRequest $request , $id)
    {
        //
        //$this->objeto->fecha_inicio=Carbon::createFromFormat('d-m-Y H',$request->fecha_inicio.' 23');
        //$this->objeto->fecha_inicio=Carbon::createFromFormat('d-m-Y H',$request->fecha_fin.' 23');
            $objeto=Programacion::findOrFail($id);
        foreach ($request->persona as $persona) {
            # code...
            if(!empty($persona)){
            $user=$this->user->findOrFail($persona);
            $arr_persona=[];
            $arr_persona['id_clase']=$id;
            $arr_persona['id_user']=$user->id;
            $arr_persona['iniciales']=$user->iniciales;
            $arr_persona['email']=$user->email;
            $arr_persona['name']=$user->name;
            $arr_persona['asistencia']=$request->asistencia;//oficina o sitio
            $arr_persona['clase']='P';
            $arr_persona['vigente']='1';
                $arr_personas_servicio[]= new PersonaServicio($arr_persona);

            }
        }
        $objeto->fill($request->except(['id_foraneo']));
        $objeto->fecha_inicio=Carbon::createFromFormat('d-m-Y H',$request->fecha_inicio.' 23');
            $objeto->estatus='GUARDADO';
        //dd($request->fecha_fin);
        $objeto->fecha_fin=Carbon::createFromFormat('d-m-Y H',$request->fecha_fin.' 23');
        if ($request->wantsJson()){
            $objeto->update();
            $objeto->personas_servicio()->delete();
            $objeto->personas_servicio()->saveMany($arr_personas_servicio);

            $reporte=Programacion::findOrFail($objeto->id_foraneo);
            $reporte->estatus='PROGRAMADO';
            $reporte->folio_contrato=$request->folio_contrato;
            $reporte->save();

                return response()->json(
                [
                    "msg"=>"ACTUALIZADO CORRECTAMENTE"
                ],200
                );
            }else{
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        //if($request->programacion){//borra la programacion completa y sus relaciones
            $objeto=Programacion::withTrashed()->findOrFail($id);
            if($objeto->trashed())
            {//Si esta eliminado va a restaurar.
                   //$objeto->personas_servicio->restore();
                   $objeto->restore();
            }else
            {//Borrado logico
                    # code...
                    $objeto->delete();
            }

        /*}else{
            $objeto = PersonaServicio::withTrashed()->findOrFail($id);
            if($objeto->trashed())
                    {//Si esta eliminado va a restaurar.
                           $objeto->restore();
                    }else
                    {//Borrado logico
                            # code...
                            $objeto->delete();
                    }

        }
        */
       return redirect('programaciones');
    }
    public function correo(Request $request, $id){//id de programacion
        $objeto=Programacion::findOrFail($id);
        $objeto->estatus='ENVIADO';
        $objeto->update();

            Calificacion::create([
                    'id_producto'=>$id,
                    'nombre_tipo'=>$request->nombre_tipo,
                    'ruta_siguiente'=>$request->ruta_siguiente,
                    'ruta_califico'=>\Route::current()->getName(),
                    'calificacion'=>$request->calificacion,
                    'iniciales'=>auth()->user()->iniciales
                    ]);
                if(!empty($objeto)){
                        # code...
                        $destinos=[];
                    $personas=$objeto->personas_servicio;
                    foreach ($personas as $persona) {
                    $arr_url=explode('/',$request->url());
                            $url= $arr_url[2].'/reportes';
                                //foreach ($usuarios_aprobadores as $key => $aprobador) {
                                    $contenido=array('msj'=>$request->msj.' '.$objeto->folio.
                                        '<a href="'.$url.'?folio='.$objeto->folio.'">Reporte '.$objeto->folio.'Clic aquí para verificar</a>');
                                    $correo=[
                                        'remitente'=>$request->user()->email,
                                        'alias'=>$request->user()->name,
                                        'asunto'=>'Notificación de sistema.'
                                    ];
                                    //dd($aprobador->email);
                                    //echo $aprobador->email;
                                    $destinos[]=$persona->email;
                                    //$correo['destino']=$persona->email;
                                    $correo['contenido']=$contenido;
                               // }
                    }
                    $correo['destino']=$destinos;
                    $this->correo->enviarCorreo($correo);
                    return back();
                }

        }
        private function unionInsumos($arr_cot,$arr_dos){
            $array=[];
            if(!empty($arr_cot)){
                foreach ($arr_cot as $arr) {
                    $array[]=$arr;
                }
            }
            if(!empty($arr_dos)){
                foreach ($arr_dos as $arr_) {
                    $array[]=$arr_;
                }

            }
            HelperUtil::log($array);
            return $array;
        }
        private function prestamosCotizacion($cotizacion){//COLOCA ATRIBUTO NUMERO DE COTIZACION y regresa el insumo

            $arr=null;
            $insumos=$cotizacion->cotPaqIns;
                foreach ($insumos as  $insumo) {
                        $insumo->folio=$cotizacion->numero_cotizacion.' '.$cotizacion->version;
                        $arr[]=$insumo;
                }
            return $arr;
        }
        private function prestamosProductos($objeto){
            $prestamos=null;
            $arr=null;
            $prestamos=Programacion::where('clase','F')
            ->where('id_foraneo',$objeto->id_foraneo)
            ->whereIn('dato',['stock','EQUIPO'])
            ->whereNotIn('estatus',['GUARDADO','ENTREGADO','CERRADO'])
            ->get();
            if(!empty($prestamos)){
                foreach ($prestamos as  $prestamo) {
                    foreach ($prestamo->insumos_compras_ventas->where('clase','F') as $producto) {
                        $producto->dato=$producto->especificaciones;
                        $producto->folio=$prestamo->folio;
                        $arr[]=$producto;
                    }
                }
            }
            return $arr;
        }
        private function getCotizaciones($campo_cotizacion){
            $arr_cotizciones=explode(',',$campo_cotizacion);
            $arr_productos_cotizacion='';
            $numero_cotizacion='';
            $lineas=null;
            $folio_cotizacion=null;
            if(count($arr_cotizciones)>1){
                foreach ($arr_cotizciones as $id) {
                    $o=new Programacion(['id_cotizacion'=>$id]);
                    $cotizacion=$o->rel_cotizacion;
                    $folio_cotizacion=$cotizacion->numero_cotizacion.' '.$cotizacion->version;
                    $numero_cotizacion=$numero_cotizacion.' , '.$folio_cotizacion;
                    $arr_productos_cotizacion[]=$this->prestamosCotizacion($cotizacion);//pasa por parametro la cotizacion
                }
                foreach ($arr_productos_cotizacion as $arreglo) {
                    foreach ($arreglo as $linea) {
                        $lineas[]=$linea;
                    }
                }
            }else{
                //solo hay un id de cotizacion
                $o=new Programacion(['id_cotizacion'=>$arr_cotizciones]);
                    $cotizacion=$o->rel_cotizacion;
                    $lineas=$this->prestamosCotizacion($cotizacion);//pasa por parametro la cotizacion
                    $folio_cotizacion=$cotizacion->numero_cotizacion.' '.$cotizacion->version;
                    $numero_cotizacion=$folio_cotizacion;
            }
            return array($numero_cotizacion,$lineas );
        }
        private function getPersonas($iniciales){
          HelperUtil::log(['$iniciales'=>$iniciales]);
          $personas='';
          $arr_personas='';
          $personas=PersonaServicio::buscar(['iniciales'=>$iniciales,'clase'=>'P'])->get();
          foreach ($personas as $persona) {
            $arr_personas[]=$persona->id;
          }
          return $arr_personas;
        }

}
