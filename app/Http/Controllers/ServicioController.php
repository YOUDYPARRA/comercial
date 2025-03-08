<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase as Servicio;
use App\Servicio as RelServicio;
use App\PersonaServicio;
use App\Prestamo;
use App\Coordinacion;
use App\TiempoServicio;
use App\InsumoCompraVenta;
use App\User;
use App\Calificacion;
use App\Http\Requests\ArchivoDigitalStoreRequest;
use App\Http\Requests\ServicioArchivoStoreRequest;
use URL;
use Carbon\Carbon;
use App\Services\ManagerCorreo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\HelperUtil;


class ServicioController extends Controller
{
protected $arr_bsc=[];
private $user;
protected $correo;
    public function __construct(ManagerCorreo $envia_correo){
        $this->arr_bsc['clase']='S';
        //$this->arr_bsc['organizacion']=auth()->user()->org_name;
         $this->correo=$envia_correo;
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
        if ($request->wantsJson()){
            $objetos=Servicio::buscar($this->arr_bsc+$request->all())->get();

                return response()->json(
                [
                    "msg"=>"Success",
                    "objetos"=>$objetos->toArray()
                ],200
                );
            }else{
            switch (last(explode('/', URL::current()))) {
                case 'resguardo':
                    break;

                default:
                    # code...it a index general mostrando las ordenes por coordinacion
                    if(!empty($request->buscar)){
                        $coordinaciones=Coordinacion::buscar(['nombre'=>auth()->user()->departamento,'modelo'=>'reportes']);
                          foreach ($coordinaciones as $value) {
                                $arr_cor[]=$value->atributo;
                            }
                        if(!empty($arr_cor)){
                            $this->arr_bsc['coordinacion']=$arr_cor;// SE HA GENERADO ARRAY DE COORDINACIONES PARA BUSCAR
                        }
                        $objetos=Servicio::buscar($this->arr_bsc+$request->all())->paginate(25);

                        //echo '-.>'+$request->coordinacion;
                    }else{
                        //echo '->'+$request->coordinacion;
                        $coordinaciones=Coordinacion::buscar(['nombre'=>$request->coordinacion,'modelo'=>'reportes']);
                          foreach ($coordinaciones as $value) {
                                $arr_cor[]=$value->atributo;
                            }
                        if(!empty($arr_cor)){
                            $this->arr_bsc['coordinacion']=$arr_cor;// SE HA GENERADO ARRAY DE COORDINACIONES PARA BUSCAR
                        }
                    }
                    //HelperUtil::log($request->all());
                    foreach ($request->all() as $key => $value) {
                            $this->getBscCampoExterno($key,$value);
                        }
                      //  HelperUtil::log($this->arr_bsc);
                    $objetos=Servicio::buscar($this->arr_bsc+$request->all())
                    ->orderBy('updated_at','desc')
                    ->paginate(25);
                    break;
            }
            return view('servicios.index',compact('objetos','request'));
            }
    }
    public function restaurar(Request $request)
    {
        //
        $objetos=Servicio::OnlyTrashed()
        ->buscar($request->all())
        //->buscar($this->arr_bsc+$request->all())
        ->paginate(15);
        return view('servicios.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo(last(explode('/', URL::current())));
        return view('servicios.create');
    }
    public function recepcion($id)//solo cuando la orden esta capturada.
    {
        $objeto=Servicio::findOrFail($id);
        return view('servicios.recepcion',compact('objeto'));
    }
    public function resguardo($id)//cambia el resguardo de una orden de servicio
    {
        $objeto=Servicio::findOrFail($id);
        return view('servicios.resguardo',compact('objeto'));
    }
    public function valida($id)//cambia el resguardo de una orden de servicio
    {
        $objeto=Servicio::findOrFail($id);
        return view('servicios.recepcion',compact('objeto'));
    }
    public function archiva($id)//CAMPO PARA CAPTURAR LOCALIDAD DE DOCUMENTO ALMACENADO FISICAMENTE, EJ: CAJON, ESTANTE, ETC.
    {
        $objeto=Servicio::findOrFail($id);
        return view('servicios.recepcion',compact('objeto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //AUN NO USADO
        dd('Guardar PERO NO SE USA ACTUALMENTE');
        $servicio=Servicio::buscar(['clase'=>'S','folio'=>trim($request->folio)])->get();
        dd(count($servicio));
        if(count($servicio)==0){
            $objeto = new Servicio($request->all());
            $vigencia=$objeto->vigencia= Carbon::now()->addWeeks(3);
            $objeto->clase='S';
            $objeto->estatus='RESGUARDO';
            $objeto->folio=trim($request->folio);
            $objeto->fecha_asignacion= Carbon::now();
            $objeto->autor= auth()->user()->iniciales;
            $objeto->sucursal= auth()->user()->lugar_centro_costo;
            //$objeto->organizacion= auth()->user()->org_name;
            $objeto->enviar_aviso= 'S';//enviar aviso a ing de servicio asignado.
            $objeto->save();
            $user=$this->user->findOrFail($request->persona);
            $arr_persona=[];
            $arr_persona['id_user']=$user->id;
            $arr_persona['iniciales']=$user->iniciales;
            $arr_persona['email']=$user->email;
            $arr_persona['name']=$user->name;
            $arr_persona['clase']=$request->clase;
            $arr_personas_servicio[]= new PersonaServicio($arr_persona);
            $objeto->personas_servicio()->saveMany($arr_personas_servicio);
            //Inicia registro servicio

            //Fin registro servicio
            //Inicia registro fechas

            //Fin registro fechas
            //Inicia registro insumo servicio

            //Fin registro insumo servicio
            return redirect('servicios/create')->withErrors(['SE HA RESGUARDADO EL DOCUMENTO.']);
        }else{
            return redirect('servicios/create')->withErrors(['EL FOLIO DEL DOCUMENTO YA EXISTE.']);
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
      switch ($request->v) {
          case '0'://Verificar folio de o.s. existente
          //HelperUtil::log(['Entrar aqui'=>'Entrar aqui']);
          $usable=null;
          $usable=$this->folioUsable($id,$request->organizacion);
            if ($request->wantsJson()){
                    return response()->json(
                    [
                        "objeto"=>$usable
                    ],200
                    );
                }
            break;
          default:
                  $objeto=Servicio::findOrFail($id);
                  $objeto->rel_servicio;
                  //dd($objeto->rel_servicio);
                  $objeto->rel_horario;
                  $insumos_servicio=InsumoCompraVenta::buscar(['clase'=>'S','id_compra_venta'=>$id])->get();

                  $objeto->insumos_compras_ventas=$insumos_servicio;
                  //$objeto->insumos_compras_ventas;
                  $objeto->personas_servicio;
                  $objeto->rel_reporte;
                  //$objeto->rel_cotizacion;
                  $objeto->numero_cotizacion=$this->getCotizaciones($objeto->id_cotizacion);
                  if ($request->wantsJson()){
                          return response()->json(
                          [
                              "objeto"=>$objeto->toArray()
                          ],200
                          );
                      }
                  return view('servicios.show',compact('objeto'));
            break;
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
        return view('servicios.edit',compact('id'));
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
        //INSERTA UNA NUEVA ORDEN DE SERVICIO. USADO ACTUALMENTE.
HelperUtil::log(['ORDEN DE SERVICIO CON PRESTAMOSS'=>$request->all()]);
        //dd($request->id_prestamo_refaccion);
        $arr_val=[];
        /*if(!empty($request->id_cotizacion)){
            if(($request->condicion_servicio!='FACTURAR') && ($request->condicion_servicio!='FACTURAR VIP')){
                //dd($request->condicion_servicio);
                $arr_val['msg']="VERIFIQUE LA CONDICION DE SERVICIO CON LA COTIZACION...";
            }
        }*/
        if(!empty($arr_val)){
            return response()->json($arr_val,422);
        }
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'servicios',
            'ruta_siguiente'=>'servicios.index',
            'ruta_califico'=>$califico,
            'calificacion'=>$request->calificacion,
            'iniciales'=>$iniciales
            ]);
        if(empty($id)){//CREAR NUEVA ORDEN DE SERVICIO
              if(empty($request->folio)){
                $objeto = new Servicio($request->except(['folio','fecha_recepcion']));
                $objeto->foliar='S';
              }else{
                $objeto = new Servicio($request->except(['fecha_recepcion']));
              }
              $objeto->vigencia= Carbon::now()->addWeeks(3);
              $objeto->autor= auth()->user()->iniciales;
              $objeto->sucursal= auth()->user()->lugar_centro_costo;

        }else{
          $objeto=Servicio::findOrFail($id);
          $objeto->fill($request->except(['fecha_recepcion','clase']));
          //INICIO ACTUALIZACION DE ORDEN DE SEVICIO
                            //$objeto->fecha_asignacion= $programa->created_at;
                            if(!empty($request->fecha_captura)){
                                //Inicia registro servicio
                                $arrc=explode(' ',Carbon::now());
                                $arr=explode('-',$arrc[0]);
                                $fecha=$arr[2].'-'.$arr[1].'-'.$arr[0];
                                $request->fecha_recepcion=null;
                                $objeto->fecha_captura=Carbon::createFromFormat('d-m-Y',$fecha);
                                $objeto->fecha_atencion=Carbon::createFromFormat('d-m-Y',$request->fecha_atencion);
                                $objeto->clase='S';
                                $objeto->estatus='CAPTURADO';
                                //dd($objeto);
                                $objeto->save();
                                $rel_servicio= new RelServicio($request->all());
                                $rel_servicio->id_foraneo=$objeto->id;
                                $rel_serv_ant=RelServicio::buscar(['id_foraneo'=>$objeto->id]);
                                $rel_serv_ant->delete();
                                //dd($rel_servicio);
                                $rel_servicio->save();
                                //Fin registro servicio
                                //colocar vigencia en 0 en clase P cuando el reporte haya sido cerrado con la captura de la o.s.
                                //COLOCAR S EN clase resguardo cuando se captura la  O.S.
                            }

                            //inicia update personal
                            if(isset($request->persona)){
                                foreach ($request->persona as $persona) {
                                    if(!empty($persona)){
                                    $user=$this->user->findOrFail($persona);
                                    $arr_persona=[];
                                    $arr_persona['id_clase']=$objeto->id;
                                    $arr_persona['id_user']=$user->id;
                                    $arr_persona['iniciales']=$user->iniciales;
                                    $arr_persona['email']=$user->email;
                                    $arr_persona['name']=$user->name;
                                    $arr_persona['asistencia']='';//para servicio no aplica
                                    $arr_persona['clase']=$request->clase;
                                        $arr_personas_servicio[]= new PersonaServicio($arr_persona);

                                    }
                                }
                                 $objeto->personas_servicio()->delete();
                                 $servicios_reporte=$objeto->getServiciosReporte();
                                 //AGREGAR OTRAS PERSONAS EN EL SERVICIO CON SUS HORAS.

                                 foreach ( $servicios_reporte as $persona) {
                                    $user=$this->user->findOrFail($persona->id_ingeniero_atencion);
                                    $ver_persona_repetido=0;
                                    foreach ($arr_personas_servicio as $persona_servicio) {
                                        if($persona_servicio->name==$user->name){
                                            $ver_persona_repetido++;
                                        }
                                    }
                                    if($ver_persona_repetido==0){
                                        $arr_persona=[];
                                        $arr_persona['id_clase']=$objeto->id;
                                        $arr_persona['id_user']=$user->id;
                                        $arr_persona['iniciales']=$user->iniciales;
                                        $arr_persona['email']=$user->email;
                                        $arr_persona['name']=$user->name;
                                        $arr_persona['asistencia']='';//para servicio no aplica
                                        $arr_persona['clase']=$request->clase;
                                        $arr_personas_servicio[]= new PersonaServicio($arr_persona);
                                    }
                                    //HORARIOS
                                    $horario=[];
                                    $horario=TiempoServicio::findOrFail($persona->id_horario);
                                    //dd($horarioz);
                                    if(count($horario)>0){
                                        $arr_hor[]=$horario;
                                    }//FIN HORARIOS
                                 }
                                 //FIN AGREGAR OTRAS PERSONAS
                                 //dd($arr_hor);
                                 $objeto->personas_servicio()->saveMany($arr_personas_servicio);
                            }
                            //fin modifica personas
                            //Inicio registro fechas
                            //dd($request->horarios);
                            if(isset($request->horarios)){
                                foreach ($request->horarios as $horario) {
                                    # code...
                                    $obj_horario=new TiempoServicio($horario);

                                    $obj_horario->fecha=Carbon::parse($obj_horario->fecha)->format('Y-m-d');
                                    //$obj_horario->fecha=Carbon::createFromFormat('d-m-Y H',$obj_horario->fecha.'23');
                                    $obj_horario->id_foraneo=$objeto->id;
                                    $arr_hor[]=$obj_horario;
                                }
                                    //dd($obj_horario);
                                $objeto->rel_horario()->delete();
                                $objeto->rel_horario()->saveMany($arr_hor);
                            }
                            //Fin registro fechas
                            //Inicia registro insumo servicio
                                //dd($request->id_prestamo_refaccion);
                                //$prestamos=Servicio::findOrFail($request->id_prestamo_refaccion);
                                //dd($prestamos);
                            if(count($request->insumos)>0 && $request->id_prestamo_refaccion>0){
                                //dd($request->insumos);
                                $arr_insumos=[];
                                $prestamos=$this->prestamo($request->id_prestamo_refaccion);
                                $insumos_prestamo=$prestamos->insumos_compras_ventas()->where('clase','F')->get();
                                $validacion_prestamo=0;
                                foreach ($request->insumos as $insumo_servicio) {
                                    $insumo=new InsumoCompraVenta($insumo_servicio);
                                    foreach ($insumos_prestamo as  $insumo_prestamo) {
                                        if($insumo_prestamo->codigo_proovedor==$insumo->codigo_proovedor){
                                            if ($dif=$this->difInsumos($insumo_prestamo->cantidad,$insumo->cantidad) ){//diferencia de las q hay en la orden(cant ocupada) y en prestamo (cant no ocupadas)
                                                $insumo_prestamo->cantidad=$dif;
                                                $insumo_prestamo->check='ENTREGADO';//PIEZA PARA ENTREGAR
                                                $insumo_prestamo->save();
                                            }else{
                                                HelperUtil::log(['LINEAS DE PRESTAMO'=>'ENTRE A REMISIONAR']);
                                                $insumo_prestamo->check='REMISIONAR';
                                                $insumo_prestamo->save();
                                            }
                                        }
                                    }
                                }
                                //ver los estatus (check q tienen las lineas, si son mas de una linea y son todas con el mismo check, colocar requisicion con ese check)
                                $poner_estado=$this->getRequisicionEstatus($prestamos);
                                if(! empty($poner_estado) ){//si todas las lineas de productos, se ecuentran en remisionar, cambiar prestamo a remisionar
                                    $prestamos->estatus=$poner_estado;
                                }
                                $this->nuevoRequisicionEntrega($prestamos);
                                //FIN verificar existencia de prestamo

                                /*if(count($insumos_prestamo)==$validacion_prestamo){//cerrar prestamo si validacion =0
                                    if($prestamos->estatus=='PRESTADO'){
                                        $prestamos->estatus='REMISIONAR';
                                    }
                                    if($prestamos->estatus=='REMISIONADO'){
                                        $prestamos->estatus='CERRADO';
                                    }
                                    $prestamos->save();
                                }*/
                                //dd($request->insumos);
                                    //(dd($arr_insumos_compras);
                                //$insumos_servicio->delete();
                                }//Fin registro insumo servicio
                                if(count($request->insumos)>0){//INICIO GUARDAR INSUMOS SERVICIO
                                    $arr_insumos=[];
                                    foreach ($request->insumos as $insumo_servicio) {
                                        $insumo=new InsumoCompraVenta($insumo_servicio);
                                        $insumo->clase='S';
                                        $arr_insumos[]=$insumo;
                                    }
                                    $objeto->insumos_compras_ventas()->delete();
                                    $objeto->insumos_compras_ventas()->saveMany($arr_insumos);
                                }//FIN GUARDAR INSUMOS EN SERVICIO
                                    $reporte =$this->getReporte($objeto->id_foraneo);
                                /*if(!empty($request->resuelto_por)){
                                    if(strlen($request->resuelto_por)>0){
                                        $reporte->resuelto_por=$request->resuelto_por;
                                        $reporte->estatus='CERRADO';
                                        $reporte->save();
                                    }*/

                               // }else{
                                    //$reporte->estatus='ESPERA'; se cambia a cerrado ya que un reporte solo debe tener una orden de servicio.
                                      //  $reporte->estatus='CERRADO';
                                    $reporte->vigencia=Carbon::now()->addWeeks(3);
                                    $reporte->save();
                                //}
          //FIN D ACTUALIZACION DE ORDEN DE SERVICIO
        }
        //dd($request->programacion);
        //Inicia registro vigencias PROGRAMADO y estatus de reporte A CERRADO
        HelperUtil::log('COMENZAR CON GUARDADO DE ORDEN DE SERVICIO');
//HelperUtil::log(['insumos en o.s.'.count($request->insumos)=>$request->insumos]);
        //dd($request->insumos);
        if(isset($request->programacion)){
            //dd($request->programacion);
            $programa=Servicio::findOrFail($request->programacion);
            //dd($programa->personas_servicio);
            foreach ($programa->personas_servicio as $p_servicio) {
                # code...
                //$p_servicio = new PersonaServicio($persona_servicio);
                $p_servicio->vigente='0';
                $p_servicio->update();
                //dd($p_servicio);
            }//fin vigencia PROGRAMADO
            /*if(strlen($request->resuelto_por)>0){
                $programa->estatus='CERRADO';
                $programa->update();
            }*/
            $objeto->fecha_asignacion= $programa->created_at;


        if(!empty($request->fecha_captura)){
            //Inicia registro servicio
            $arrc=explode(' ',Carbon::now());
            $arr=explode('-',$arrc[0]);
            $fecha=$arr[2].'-'.$arr[1].'-'.$arr[0];
            $request->fecha_recepcion=null;
            $objeto->fecha_captura=Carbon::createFromFormat('d-m-Y',$fecha);
            $objeto->fecha_atencion=Carbon::createFromFormat('d-m-Y',$request->fecha_atencion);
            $objeto->clase='S';
            $objeto->estatus='CAPTURADO';
            $objeto->save();
            $rel_servicio= new RelServicio($request->all());
            $rel_servicio->id_foraneo=$objeto->id;
            $rel_serv_ant=RelServicio::buscar(['id_foraneo'=>$objeto->id]);
            $rel_serv_ant->delete();
            $rel_servicio->save();
            //Fin registro servicio
            //colocar vigencia en 0 en clase P cuando el reporte haya sido cerrado con la captura de la o.s.
            //COLOCAR S EN clase resguardo cuando se captura la  O.S.
        }

        //inicia update personal
        if(isset($request->persona)){
            foreach ($request->persona as $persona) {
                if(!empty($persona)){
                $user=$this->user->findOrFail($persona);
                $arr_persona=[];
                $arr_persona['id_clase']=$objeto->id;
                $arr_persona['id_user']=$user->id;
                $arr_persona['iniciales']=$user->iniciales;
                $arr_persona['email']=$user->email;
                $arr_persona['name']=$user->name;
                $arr_persona['asistencia']='';//para servicio no aplica
                $arr_persona['clase']=$request->clase;
                    $arr_personas_servicio[]= new PersonaServicio($arr_persona);

                }
            }
             $objeto->personas_servicio()->delete();
             $servicios_reporte=$objeto->getServiciosReporte();
             //AGREGAR OTRAS PERSONAS EN EL SERVICIO CON SUS HORAS.

             foreach ( $servicios_reporte as $persona) {
                $user=$this->user->findOrFail($persona->id_ingeniero_atencion);
                $ver_persona_repetido=0;
                foreach ($arr_personas_servicio as $persona_servicio) {
                    if($persona_servicio->name==$user->name){
                        $ver_persona_repetido++;
                    }
                }
                if($ver_persona_repetido==0){
                    $arr_persona=[];
                    $arr_persona['id_clase']=$objeto->id;
                    $arr_persona['id_user']=$user->id;
                    $arr_persona['iniciales']=$user->iniciales;
                    $arr_persona['email']=$user->email;
                    $arr_persona['name']=$user->name;
                    $arr_persona['asistencia']='';//para servicio no aplica
                    $arr_persona['clase']=$request->clase;
                    $arr_personas_servicio[]= new PersonaServicio($arr_persona);
                }
                //HORARIOS
                $horario=[];
                $horario=TiempoServicio::findOrFail($persona->id_horario);
                //dd($horarioz);
                if(count($horario)>0){
                    $arr_hor[]=$horario;
                }//FIN HORARIOS
             }
             //FIN AGREGAR OTRAS PERSONAS
             //dd($arr_hor);
             $objeto->personas_servicio()->saveMany($arr_personas_servicio);
        }
        //fin modifica personas
            //dd($objeto);
        //Inicio registro fechas
        //dd($request->horarios);
        if(isset($request->horarios)){
            foreach ($request->horarios as $horario) {
                # code...
                $obj_horario=new TiempoServicio($horario);

                $obj_horario->fecha=Carbon::parse($obj_horario->fecha)->format('Y-m-d');
                //$obj_horario->fecha=Carbon::createFromFormat('d-m-Y H',$obj_horario->fecha.'23');
                $obj_horario->id_foraneo=$objeto->id;
                $arr_hor[]=$obj_horario;
            }
                //dd($obj_horario);
            $objeto->rel_horario()->delete();
            $objeto->rel_horario()->saveMany($arr_hor);
        }
        //Fin registro fechas
        //Inicia registro insumo servicio
        if(count($request->insumos)>0 ){
            $arr_insumos=[];
            $arr_cambios_prestamos=[];
            $validacion_prestamo=0;
            foreach ($request->insumos as $insumo_servicio) {
                    //9IJ0print_r($insumo_servicio);COLOCA EL ESTADO DEL CHECK EN LA LINEA
                $insumo_servicio=(object)$insumo_servicio;
                $insumo_prestamo=null;
                HelperUtil::log(['INSUMO EN SERVICIO'=>$insumo_servicio]);
                //$insumo=new InsumoCompraVenta($insumo_servicio);
                if(isset($insumo_servicio->clase)){
                    HelperUtil::log('ISSET ES VERDADERO'.$insumo_servicio->clase);
                    if($insumo_servicio->clase=='F'){//verifica si la linea es de un prestamo
                        $insumo_prestamo=InsumoCompraVenta::where('id',$insumo_servicio->id)->where('check','')->first();
                        HelperUtil::log(['$insumo_prestamo original a comparar :'.count($insumo_prestamo)=>$insumo_prestamo]);
                        if(count($insumo_prestamo)>0){
                            $dif=$this->difInsumos($insumo_prestamo->cantidad,$insumo_servicio->cantidad);
                            HelperUtil::log(['DIFERENCIA'=>$dif]);
                        if ($dif){//diferencia de las q hay en la orden(cant ocupada) y en prestamo (cant no ocupadas)
                            $this->nuevaLnEstado($insumo_prestamo->id_compra_venta,$insumo_prestamo,($insumo_prestamo->cantidad-$dif),'REMISIONAR');
                            $this->lineaEstado($insumo_prestamo,'ENTREGADO',$dif);
                        }else{
                            HelperUtil::log(['LINEAS DE PRESTAMO'=>'ENTRE A REMISIONAR']);
                            $this->lineaEstado($insumo_prestamo,'REMISIONAR');
                        }
                        $temp_arr_cambios_prestamos=$this->prestamosCambiaEstatus($insumo_prestamo->id_compra_venta,$arr_cambios_prestamos);
                        if(!empty( $temp_arr_cambios_prestamos )){
                            $arr_cambios_prestamos=$temp_arr_cambios_prestamos;
                        }

                        }//fin si se encuentra check=''

                    }//fin comprueba clase=f
                }//FIN ISSET CLASE
            }
            //ver los estatus (check q tienen las lineas, si son mas de una linea y son todas con el mismo check, colocar requisicion con ese check)
            //$this->procEstatusPrestamo($arr_cambios_prestamos);
        }//Fin registro insumo servicio prestamo
            if(count($request->insumos)>0){//INICIO GUARDAR INSUMOS SERVICIO
                $arr_insumos=[];
                foreach ($request->insumos as $insumo_servicio) {
                    $insumo=new InsumoCompraVenta($insumo_servicio);
                    $insumo->clase='S';
                    $arr_insumos[]=$insumo;
                }
                $objeto->insumos_compras_ventas()->delete();
                $objeto->insumos_compras_ventas()->saveMany($arr_insumos);
            }//FIN GUARDAR INSUMOS EN SERVICIO
            $reporte = $this->getReporte($programa->id_foraneo);
            /*if(!empty($request->resuelto_por)){
                if(strlen($request->resuelto_por)>0 && (($request->condicion_servicio != 'GARANTIA' || $request->condicion_servicio != 'GARANTIA SERVICIO' || $request->condicion_servicio != 'GARANTIA COMERCIAL') )){
                    $reporte->resuelto_por=$request->resuelto_por;
                    $reporte->estatus='CERRADO';
                    $reporte->save();
                }else{
                    $reporte->estatus='PENDIENTE';
                    $reporte->save();
                }
            }else{
                //$reporte->estatus='ESPERA'; se cambia a cerrado ya que un reporte solo debe tener una orden de servicio.
                  //  $reporte->estatus='CERRADO';
                $reporte->vigencia=Carbon::now()->addWeeks(3);
                $reporte->save();
            }*/
       //Fin registro  estatus de reporte
        }else if(!empty($request->validada)){
            $objeto->rel_servicio->save($request->all());
        }else if(!empty($request->fecha_recepcion)){
            $arrc=explode(' ',Carbon::now());
            $arr=explode('-',$arrc[0]);
            $fecha=$arr[2].'-'.$arr[1].'-'.$arr[0];
            $objeto->fecha_recepcion=Carbon::createFromFormat('d-m-Y',$fecha);
            $objeto->fill($request->except('fecha_recepcion'));
            //echo 'GuardarRECEP';
            $objeto->save();
        }

        //RESPUESTA...
        if ($request->wantsJson()){
                return response()->json(
                [
                    "msg"=>"ACTUALIZADO CORRECTAMENTE"
                ],200
                );
            }else{

            return back()->withErrors(['SE HA ACTUALIZADO EL DOCUMENTO.']);
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
        $objeto = Servicio::withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico
                        # code...
                        $objeto->delete();
                }
               return redirect('servicios');
    }
    public function resguardos(Request $request){//listado de ordenes de servicio resguardadas
        # code...1IR POR PERSONA_SERVICIO CON RESGUARDO POR PERSONA_SERVICIO.ID SEGUN LA SESION en PERSONA_SERVICIO  PARA OBTENER OS. RESGUARDO.
        $objetos=PersonaServicio::buscar(['clase'=>'resguardo','id_user'=>auth()->user()->id])->paginate(15);//qry tdos los resguardos
    #2QRY IR TODAS LAS PROGRAMACIONES DE USUARIO
        $arr=[];
        $persona_programas=PersonaServicio::buscar(['clase'=>'P','vigente'=>'1','id_user'=>auth()->user()->id])->get();//qry tdos los
        foreach ($persona_programas as $p_programa) {
            # code...
            $e=[$p_programa->programa->id=>$p_programa->programa->folio.' '.$p_programa->programa->nombre_fiscal];
            $arr[]=$e;
        }
        $programas=$arr;
        if(empty($programas)){
            $programas=array('0' =>'0');
        }
        return view('servicios.resguardos',compact('objetos','request','programas'));

    }
    public function captura(Request $r){
        return view('servicios.captura',compact('r'));
    }
    public function digitalizar($id){
        $objeto=Servicio::findOrFail($id);
        return view('servicios.digitalizar',compact('objeto'));
    }
    public function archivar(ArchivoDigitalStoreRequest $request){
        $file = $request->file('file');
       $arr_nombre_archivo =explode('.',$file->getClientOriginalName());
       $nombre='Ser'.$request->id.'.'.$arr_nombre_archivo[count($arr_nombre_archivo)-1];
       \Storage::disk('local')->put($nombre,  \File::get($file));
        $objeto = Servicio::findOrFail($request->id);
        $objeto->rel_servicio()->update(['digitalizacion'=>$nombre]);
        //$ser=RelServicio::buscar(['id_foraneo'=>$request->id])->get();
        //$objeto->update();
        return view('servicios.digitalizar',compact('objeto'));
    }
    public function digital($id){
        $objeto=Servicio::findOrFail($id);
        $ruta=  '/var/www/html/comercial/storage/app/'.$objeto->rel_servicio->digitalizacion;
        $headers = array(
                    'Content-Type' => 'application/octet-stream',
                );
        return response()->download($ruta,$objeto->rel_servicio->digitalizacion,$headers);
    }

    public function registro_archivo($id){
        //dd($id);
        //$objeto=RelServicio::buscar(['id_foraneo'=>$id])->get();
        $objeto=Servicio::findOrFail($id);
        return view('servicios.archivo',compact('objeto'));

    }
    public function archivo(ServicioArchivoStoreRequest $request,$id){
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'servicios',
            'ruta_siguiente'=>'servicios.index',
            'ruta_califico'=>$califico,
            'calificacion'=>'archivado',
            'iniciales'=>$iniciales
            ]);
        $objeto=Servicio::findOrFail($id);
        $objeto->rel_servicio()->update([
            'descripcion_archivado'=>$request->descripcion_archivado
            ]);
        return redirect('servicios');
    }
    private function procEstatusPrestamo($arr_prestamo){
        $poner_estado='';
        $prestamo='';
        HelperUtil::log(['ARRAY DE IDS PRESTAMOS PARA PROCESAR: '=>$arr_prestamo]);
        if(!empty($arr_prestamo) && is_array($arr_prestamo)){
            foreach ($arr_prestamo as  $id_prestamo) {
                $prestamo=$this->prestamo($id_prestamo);

                $poner_estado=$this->getRequisicionEstatus($prestamo);
                HelperUtil::log(['PONER ESTADO PRESTAMO'=>$poner_estado,'EN ID DE PRESTAMO:'=>$prestamo->id]);
                if( empty($poner_estado) ){//NO SE SABE Q ESTADO TIENE, POR LO TANTO HAY Q SEPARA Y HOMOGENIAR LINEAS
                    $this->nuevoRequisicionEntrega($prestamo);
                    $prestamo->update(['estatus'=>'REMISION']);//GUARDAR
                    //$prestamos->save();
                }else{//si todas las lineas de productos, se ecuentran en remisionar
                    $prestamo->update(['estatus'=>$poner_estado]);//GUARDAR
                    //$prestamos->estatus=$poner_estado;
                    //$prestamos->save();
                }
            }
        }

    }
    private function difInsumos($cant_insumo_prestamo,$cant_insumo_servicio){
        $diferencia=0;
        if($cant_insumo_prestamo!=$cant_insumo_servicio ){
            $diferencia=$cant_insumo_prestamo-$cant_insumo_servicio;
        }
        /*else if($cant_insumo_prestamo==$cant_insumo_servicio){
            $diferencia=$cant_insumo_servicio;
        }*/
        return $diferencia;
    }
    private function prestamo($id){
        return $prestamo=Servicio::find($id);
    }
    /***
    *relacion de prestamo con la tabla clase
    ***/
    private function getRPrestamo($prestamo,$id){
        $r_prestamo=$prestamo->prestamo;
        $prestamo_nvo= new Prestamo($r_prestamo->toArray());
        $prestamo_nvo->id_foraneo=$id;
        $prestamo_nvo->clase='F';
        return $prestamo_nvo->save();

    }
    private function getReporte($id){
        return Servicio::findOrFail($id);
    }
    private function getRequisicionEstatus($prestamo){
        $estado='';
        HelperUtil::log(['id'=>$prestamo->id]);
        $insumos_prestamo=$prestamo->insumos_compras_ventas()->where('clase','F')->count();
        $insumos_prestamo_remisionar=$prestamo->insumos_compras_ventas()->where('clase','F')->where('check','REMISIONAR')->count();
        $insumos_prestamo_entregado=$prestamo->insumos_compras_ventas()->where('clase','F')->where('check','ENTREGADO')->count();
        HelperUtil::log(['insumos en prestamo'=>$insumos_prestamo,'insumos remisionar'=>$insumos_prestamo_remisionar,'insumos prestamo entregado'=>$insumos_prestamo_entregado]);
        if($insumos_prestamo==$insumos_prestamo_remisionar){
            $estado='REMISION';
        }
        elseif ($insumos_prestamo==$insumos_prestamo_entregado) {
            $estado='ENTREGADO';
        }
        return $estado;
    }
    private function nuevoRequisicionEntrega($prestamo){
            $prestamo_insumo_entregar='';
            $prestamo_entregar= new Servicio($prestamo->toArray());
            $prestamo_entregar->estatus='PRESTADO';
            //$prestamo_entregar->dato='PRESTAMO';
            //$prestamo_entregar->foliar='F';
            $prestamo_entregar->save();
            $prestamo->insumos_compras_ventas()->where('clase','F')->where('check','ENTREGADO')->update(['id_compra_venta'=>$prestamo_entregar->id]);
            $prestamo->insumos_compras_ventas()->where('clase','F')->where('check','')->update(['id_compra_venta'=>$prestamo_entregar->id,'check'=>'ENTREGADO']);
            $this->getRPrestamo($prestamo,$prestamo_entregar->id);
            //ENVIAR CORREO DE AVISO SEGUN FLUJO
    }
    /**
    *@REQUISICION PARA SUSTITUCION
    **/
    private function prestamosCambiaEstatus($id_prestamo,$arr_id_prestamo){//RECIBE UN ID DE PRESTAMO PARA GUARDAR EN EL ARREGLO
        $existen=0;
        $arr_ids=[];
        HelperUtil::log(['id d prestamo a cambiar estatus'=>$id_prestamo,'array de presamos'=>$arr_id_prestamo]);
        if(!empty($arr_id_prestamo) ){
            foreach ($arr_id_prestamo as $value) {
                if($value!=$id_prestamo){
                    $existen++;
                }
            }
        }else{
            $arr_ids[]=$id_prestamo;
        }
        HelperUtil::log(['VARIABLE EXISTEN'=>$existen]);
        if($existen){
            $arr_id_prestamo[]=$id_prestamo;
            $arr_ids=$arr_id_prestamo;
        }
        HelperUtil::log(['REGRESA IDS DE PRESTAMOS PARA PROCESAR'=>$arr_ids]);
        return $arr_ids;
    }
    private function nuevoRequisicion($prestamo){
            $prestamo_insumo_entregar='';
            $lineas=$prestamo->insumos_compras_ventas()->where('clase','F')->where('check','REMISIONAR')->get();
                $prestamo_entregar= new Servicio($prestamo->toArray());
                $prestamo_entregar->estatus='GUARDADO';
                $prestamo_entregar->foliar='F';
                $prestamo_entregar->save();
                foreach ($lineas as  $linea) {
                    $this->nuevaLnEstado($prestamo_entregar->id,$linea);
                }
                $this->getRPrestamo($prestamo,$prestamo_entregar->id);
            //ENVIAR CORREO DE AVISO SEGUN FLUJO
    }
    private function lineaEstado($ln,$estado,$cantidad=""){
        if($cantidad>0){
            $ln->cantidad=$cantidad;
        }
            $ln->check=$estado;
            $ln->save();
    }
    private function nuevaLnEstado($id_compra_venta,$linea,$cantidad="",$estado=""){
        $linea->check=$estado;
        if(!empty($cantidad)){
            $linea->$cantidad=$cantidad;
        }
        $linea->id_compra_venta=$id_compra_venta;
        $linea_nueva =new InsumoCompraVenta($ln->toArray());
        $linea_nueva->save();
    }
    private function getOtroCampo(Array $condiciones,$campo_resultado=''){
        $bsc='';
        $res=[];
        $rsl='';
        if(empty($campo_resultado) ){
                $res=Servicio::buscar($condiciones)->get();
            }else{
                foreach(Servicio::buscar($condiciones)->get() as $rsl)
                {
                    $res[]=$rsl->$campo_resultado;
                }
            }
            if(count($res)>1){
              $bsc=implode("+",$res);
            }else{
              $bsc=$res[0];
            }
            //HelperUtil::log($bsc);
        return $bsc;
    }
    private function getBscCampoExterno($key,$value){
            switch ($key) {
                case 'reporte':
                          if(!empty($value) ){
                            $this->arr_bsc['id_foraneo']=$this->getOtroCampo([
                                                            'clase'=>'R',
                                                            'folio'=>$value
                                                          ],'id');
                          }
                    break;
                case 'iniciales':
                $os='';
                    foreach(PersonaServicio::buscar(['iniciales'=>$value])->get() as $persona){
                      //HelperUtil::log(['persona'=>$persona->servicio]);
                      if(!empty($persona->servicio)){
                        $os[]=$persona->servicio->folio;
                      }
                        //HelperUtil::log(['orden de servicio relacionada'=>$os]);
                    }
                    if(!empty($os)){
                      $this->arr_bsc['folio']=implode("+",$os);
                    }
                    break;
            }
    }
    private function getCotizaciones($campo_cotizacion){
            $numero_cotizacion='';
        if(!empty($campo_cotizacion)){

            $arr_cotizciones=explode(',',$campo_cotizacion);
            $folio_cotizacion=null;
            if(count($arr_cotizciones)>1){
                foreach ($arr_cotizciones as $id) {
                    $o=new Servicio(['id_cotizacion'=>$id]);
                    $cotizacion=$o->rel_cotizacion;
                    $folio_cotizacion=$cotizacion->numero_cotizacion.' '.$cotizacion->version;
                    $numero_cotizacion=$numero_cotizacion.' , '.$folio_cotizacion;
                }

            }else{
                //solo hay un id de cotizacion
                $o=new Servicio(['id_cotizacion'=>$arr_cotizciones]);
                    $cotizacion=$o->rel_cotizacion;
                    $folio_cotizacion=$cotizacion->numero_cotizacion.' '.$cotizacion->version;
                    $numero_cotizacion=$folio_cotizacion;
            }
        }
        return $numero_cotizacion;
    }

}
