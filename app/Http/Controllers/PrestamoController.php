<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase as ClasePrestamo;
use App\Clase as Reporte;
use App\InsumoCompraVenta;
use App\Prestamo;
use App\Permiso;
use App\Coordinacion;
use App\User;
use App\Cotizacion;
use App\Estado;
use App\Helpers\HelperUsuario;
use App\Helpers\HelperUtil;
use App\Helpers\HelperPrestamoServicio;
use App\Calificacion;
use Carbon\Carbon;
use App\Observacion;
use App\Http\Requests\ObservacionStoreRequest;
use App\Http\Requests\CalificacionStoreRequest;
use App\Http\Requests\RequisicionStoreRequest;
use App\Http\Requests\EnviarARequest;
use App\CotizacionPaqueteInsumo;
use App\Http\Requests;
use App\Http\Requests\ArchivoDigitalStoreRequest;
use App\Http\Controllers\Controller;
use App\Helpers\Contracts\AvisosSistemaContract;

class PrestamoController extends Controller
{
    protected $arr_bsc=[];
    private $objeto;
    private $usuario;
    private $limite=3;
    public function __construct(HelperUsuario $consulta_usuario){
        $this->arr_bsc['clase']='F';
        //$this->arr_bsc['organizacion']=auth()->user()->org_name;
        $this->objeto = new ClasePrestamo(['clase'=>'F','sucursal'=>auth()->user()->lugar_centro_costo]);
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
        if($request->buscar){
            $objetos=ClasePrestamo::buscar($this->arr_bsc+$request->all())
            ->orderBy('folio')
            ->paginate(15);
        }else{
            //$objetos=ClasePrestamo::buscar(['estatus'=>'SOLICITUD'])->paginate(15);
        //dd($this->arr_bsc);
            $objetos=ClasePrestamo::buscar($this->arr_bsc)
            ->orderBy('folio','desc')
            ->orderBy('created_at','desc')
            ->orderBy('updated_at','desc')
            ->paginate(15);
        //dd($objetos);
        }
        return view('prestamos.index',compact('objetos','request'));
    }
    public function eliminados(Request $request)
    {
        $objetos=ClasePrestamo::onlyTrashed()->paginate();
        //dd($objetos);
        return view('prestamos.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requisicion($id)//id de reporte
    {
        //$prestamo= ClasePrestamo::findOrFail($id);
        return view('prestamos.requisicion',compact('id'));

    }
    public function create($id)//id de reporte
    { //dd($id);//$prestamo= ClasePrestamo::findOrFail($id);
      $objeto= Reporte::findOrFail($id);                       //dd($objeto);
      return view('prestamos.create',compact('objeto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequisicionStoreRequest $request)
    {
        //
        HelperUtil::log(['GENERA REQUISICION DE PRESTAMO'=>$request->all()]);
        $this->objeto->fill($request->except(['clase','folio']));
        //$this->objeto->dato=json_encode(array('p_delivery_location_id'=>$request->p_delivery_location_id,'dato'=>$request->dato));
        $reporte=$request->all();
        $this->objeto->foliar='F';
        $this->objeto->estatus='GUARDADO';
        $this->objeto->sucursal= auth()->user()->lugar_centro_costo;
        //$this->objeto->organizacion= auth()->user()->org_name;
        $this->objeto->fecha_recepcion=Carbon::now();
        $this->objeto->autor=auth()->user()->iniciales;
        $prestamo= new Prestamo($request->except(['p_delivery_location_id']));
        $prestamo->clase='F';
            $this->objeto->save();
        //dd($this->objeto->id);
            $reporte=ClasePrestamo::findOrFail($request->id);
            $reporte->id_prestamo_refaccion=$this->objeto->id;
            $reporte->save();
            $this->objeto->prestamo()->save($prestamo);
            $this->objeto->programa($reporte);
            //INICIO alta de insumos.
            $arr_insumos=[];
            foreach ($request->insumos as $insumo_compra) {
                    $insumo=new InsumoCompraVenta($insumo_compra);
                    $insumo->id_compra_venta=$this->objeto->id;
                    $insumo->clase='F';
                    $arr_insumos[]=$insumo;
                }
                //dd($arr_insumos_compras);
            $this->objeto->insumos_compras_ventas()->saveMany($arr_insumos);
            //FIN ALTA DE INSUMOS.
            $es_equipo=$this->especificaciones($request->insumos);
            $this->objeto->update(['dato'=>$es_equipo]);
            //$id_presta=$prestamo->id;
            //ACTUALIZAR REPORTE CON EL ULTIMO PRESTAMO
            if(!empty($request->id_foaneo)){//AGREGAR numero al reporte
                $reporte='';
                $reporte=ClasePrestamo::findOrFail($request->id_foraneo);
                if(is_object($reporte)){
                    $reporte[0]->update(['id_prestamo_refaccion' => $prestamo->id]);
                }
            }
            //FIN ACTUALIZAR REPORTE
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
        if ($request->wantsJson()){
                switch ($request->v) {
                    case '0':
                        # code... CONSULTA SOLO PARA ORDEN DE SERVICIO, VALIDA Q LA LINEA NO SE HAYA USADO
                        //16-10-2018 la orden de servicio no se va a afectar
                        $objeto=ClasePrestamo::findOrFail($id);
                        $objeto->prestamo;
                        $insumos_servicio=InsumoCompraVenta::buscar(['clase'=>'F','id_compra_venta'=>$id])->where('check','<>','')->get();
                        $objeto->insumos_compras_ventas=$insumos_servicio;
                        return response()->json(
                        [
                            "objeto"=>$objeto->toArray()
                        ],200
                        );
                        break;
                    case 1:/**CONSULTA  Y ENTREGAR LAS LINEAS DE PRODUCTOS DE LOS PRESTAMOS REALACIONADOS*/
                            /**
                            *1CONSULTA EL REPORTE DEL  PRESTAMO RECIBIDO POR PARAMETRO
                            *2CONSULTAR LOS PRESTAMOS REALACIONADOS CON ESTATUS DE PRESTADO
                            *3 REGRESAR EL ARREGLO DE INSUMOS CON EL FOLIO E ID DEL PRESTAMO
                            */
                            $lineas_productos=$this->getLineasPrestamos($id);
                            HelperUtil::log(['$lineas_productos'=>$lineas_productos]);
                            return response()->json(
                            [
                                "objeto"=>$lineas_productos
                            ],200
                            );
                            break;
                    case 2:
                          /* VALIDACION AL RETIRAR PIEZA EN COTIZACION QUE SE HA CREADO DESDE UN PRESTAMO CON ESTATUS PRESTADO
                          *OBTENER EL ESTATUS DEL PRESTAMO == prestado
                          *OBTENER LAS LINEAS DELA O.S.; VERIFICAR QUE NO EXISTA EN LAS O.S.
                          *bsq insumos_compras_ventas
                          *
                          */
                          /**VERIFICA EL STATUS DEL PRESTAMO(PRESTADO) Y SI EXISTEN O.S. CON ESTA PIEZA AGREGADA**/
                          //InsumoCompraVenta::buscar([])->get()
                          $msg=[];
                          $arr_lineas_servicio_activo=$this->getLineaServicio($id,$request->codigo_proovedor);//obtiene las lineas de servicios con estatus q no son cancelados(activos)
                          //$arr_lineas_prestamo_prestado=$this->getLineasPrestamosDelete($id);//obtiene las lineas de los prestamos con estatus prestado
                          //$existe_prestado=0;
                          //foreach ($arr_lineas_prestamo_prestado as  $ln) {
                            // code...verificar de este arreglo cual linea coincide con el codigo de proveedor
                            //HelperUtil::log(['$ln->codigo_proovedor'=>$ln->codigo_proovedor]);
                            //HelperUtil::log(['$request->codigo_proovedor'=>$request->codigo_proovedor]);
                            //if($ln->codigo_proovedor==$request->codigo_proovedor){//ver si el codigo es igual q el de prestado
                              //$existe_prestado++;//esta como prestado el producto, SUMAR 1
                            //}
                          //}
                          //HelperUtil::log(['$existe_prestado'=>$existe_prestado]);
                          if(count($arr_lineas_servicio_activo)>0){
                            $msg[]='EXISTE ORDEN DE SERVICIO RELACIONADA';
                          }elseif($this->getPrestado($id) ){
                          }else{
                            $msg[]='VERIFIQUE PRESTAMO';
                            //Realizar el calculo de las cantidades de cotizacion-prestamo regresando las cantidades al prestamo

                          }
                          return response()->json(
                          [
                              "msg"=>$msg
                          ],200
                          );
                    break;
                    case 3:/**RESTAURAR la cantidad de UNA LINEA ELIMINADA EN EL PRESTAMO y en la cotizacion,**/
                    /**recibe id InsumoCompraVenta**/
                    //dd($id);
                    //HelperUtil::log(['$objeto->objeto'=>$request->objeto]);
                    $obj=json_decode($request->objeto);
                    //HelperUtil::log(['$objeto->objeto'=>$obj->id]);
                    //HelperUtil::log(['$eliminar'=>$obj->id]);
                    if(isset($obj->id_cotizacion) ){
                      $this->restauraLinea($id,$obj->cantidad,$obj->id_cotizacion);
                    }elseif(isset($obj->id_devolucion)){
                      $this->restauraLnDev($id,$obj->cantidad,$obj->id_devolucion);
                    }
                    if($request->wantsJson()){
                      return response()->json(
                      [
                          "msg"=>"ACTUALIZADO CORRECTAMENTE"
                      ],200
                      );
                    }
                    break;
                    case '4'://regresa lineas solo de un prestamo en particular
                    $lineas_productos=HelperPrestamoServicio::getLineasPrestamo($id);
                    return response()->json(
                    [
                        "objeto"=>$lineas_productos
                    ],200
                    );
                      break;
                    default:
                    $objeto=ClasePrestamo::findOrFail($id);
                        $objeto->prestamo;
                        $insumos_servicio=InsumoCompraVenta::buscar(['clase'=>'F','id_compra_venta'=>$id])->get();
                        $objeto->insumos_compras_ventas=$insumos_servicio;
                        return response()->json(
                        [
                            "objeto"=>$objeto->toArray()
                        ],200
                        );
                        break;
                }

            }else{
              switch ($request->v) {
                case '0'://DESLIGAR EL PRESTAMO
                      // code...ID DE COTIZACION,
                      //Tomar cada linea
                      //Sumar cotizacion.cantidad a prestamo.calculo
                      //Eliminar cotizacion.id_insumo_prestamo y cotizacion.id_insumo
                      $cotizacion=Cotizacion::findOrFail($id);
                      $cotizacion->venta='';
                      $insumos_cotizacion=CotizacionPaqueteInsumo::idCotizacion($id)->get();
                      //dd($insumos_cotizacion);
                      foreach ($insumos_cotizacion as $insumo) {
                        //dd($insumo);
                        if($this->getPrestado($insumo->id_prestamo) ){//tiene un estatus prestado
                          //dd('prestado');
                          HelperUtil::log(['$desligar'=>$insumo]);
                          $this->restauraLinea($insumo->id_insumo_prestamo,$insumo->cantidad,$insumo->id_cotizacion,false);
                          $insumo->id_prestamo='';
                          $insumo->id_insumo_prestamo='';
                          $insumo->save();
                          $cotizacion->update();
                        }else{//no esta prestado
                          return back()->withErrors(['Verifique Estatus de Prestamo relacionado con codigo proveedor: '.$insumo->codigo_proovedor]);
                        }
                      }
                      return back()->withSuccess('ACTUALIZACION EXITOSA');
                  break;
                default:
                  // code...
                  $objeto=ClasePrestamo::findOrFail($id);
                  return view('prestamos.show',compact('objeto'));
                  break;
              }//fin switch
            }//fin else
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
        return view('prestamos.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequisicionStoreRequest $request, $id)
    {
        //dd($request->get('tipo_moneda'));
        //dd($request->get('condicion_factura'));
        //dd($request->get('metodo_pago'));
        //dd($request->get('pago_tiempo'));
        $objeto=ClasePrestamo::findOrFail($id);
        $objeto->fill($request->all());
        //$objeto->dato=json_encode(array('p_delivery_location_id'=>$request->p_delivery_location_id));
        //$objeto->estatus='GUARDADO';
        $objeto->save();
        $objeto->prestamo()->delete();
        $prestamo= new Prestamo($request->all());
        $prestamo->id_foraneo=$id;
        $prestamo->clase='F';
        $prestamo->save();
        //INICIO alta de insumos.
            $arr_insumos=[];
            foreach ($request->insumos as $insumo_compra) {
                    $insumo=new InsumoCompraVenta($insumo_compra);
                    $insumo->id_compra_venta=$this->objeto->id;
                    $insumo->clase='F';
                    $arr_insumos[]=$insumo;
                }                                                                                               //dd($arr_insumos_compras);
                $insumos_servicio=InsumoCompraVenta::buscar(['clase'=>'F','id_compra_venta'=>$id])->delete();

            $objeto->insumos_compras_ventas()->saveMany($arr_insumos);                                          //FIN ALTA DE INSUMOS.
            $es_equipo=$this->especificaciones($request->insumos);
            $objeto->update(['dato'=>$es_equipo]);
            if ($request->wantsJson()){
                return response()->json(
                [
                    "msg"=>"ACTUALIZADO CORRECTAMENTE"
                ],200
                );
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests $request,$id)
    {
        //
        $objeto = ClasePrestamo::withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico
                        # code...
                        $objeto->delete();
                }
                if($request->wantsJson()){
                  return response()->json(
                  [
                      "msg"=>"ACTUALIZADO CORRECTAMENTE"
                  ],200
                  );
                }else{
                  return redirect('prestamos');

                }
    }
    private function restauraLinea($id_insumo_compra_venta,$cantidad,$id_insumo_cotizacion,$elim_cot=true)
    {//recibe cantidad de linea de la cotizacion q se esta eliminando
        $objeto = InsumoCompraVenta::withTrashed()->findOrFail($id_insumo_compra_venta);//linea prestamo
        if($elim_cot){

          $insumo_cotizacion=CotizacionPaqueteInsumo::findOrFail($id_insumo_cotizacion)->delete();//linea cotizacion

        }
        //HelperUtil::log(['$cantidad'=>$cantidad]);
        $objeto->calculo=$objeto->calculo+$cantidad;
        HelperUtil::log(['$objeto'=>$objeto]);
        $objeto->save();
        return $objeto;
    }
    private function restauraLnDev($id_insumo_compra_venta,$cantidad,$id_insumo_dev)
    {//recibe cantidad de linea de la cotizacion q se esta eliminando
        //HelperUtil::log(['LN PRES'=>$id_insumo_compra_venta]);
        //HelperUtil::log(['LN DEV'=>$id_insumo_dev]);
        $objeto = InsumoCompraVenta::withTrashed()->findOrFail($id_insumo_compra_venta);//ln de prestamo
        HelperUtil::log(['$objeto de ln de prestamo'=>$objeto]);
        InsumoCompraVenta::findOrFail($id_insumo_dev)->delete();//ln de devolucion
        //HelperUtil::log(['$cantidad'=>$cantidad]);
        $objeto->calculo=$objeto->calculo+$cantidad;
        //HelperUtil::log(['$objeto'=>$objeto]);
        $objeto->save();
        return $objeto;
    }
    public function digitalizar($id){
        $objeto=ClasePrestamo::findOrFail($id);
        return view('prestamos.digitalizar',compact('objeto'));
    }
    public function archivar(ArchivoDigitalStoreRequest $request){
        $file = $request->file('file');
       $arr_nombre_archivo =explode('.',$file->getClientOriginalName());
       $nombre='Pr'.$request->id.'.'.$arr_nombre_archivo[count($arr_nombre_archivo)-1];
       \Storage::disk('local')->put($nombre,  \File::get($file));
        $objeto = ClasePrestamo::findOrFail($request->id);
        $objeto->prestamo->digitalizacion=$nombre;
        //dd($objeto->prestamo);
        $objeto->prestamo->update();
        return view('prestamos.digitalizar',compact('objeto'));
    }
    public function digital($id){
        $objeto=ClasePrestamo::findOrFail($id);
        $ruta=  '/var/www/html/comercial/storage/app/'.$objeto->prestamo->digitalizacion;
        $headers = array(
                    'Content-Type' => 'application/octet-stream',
                );
        return response()->download($ruta,$objeto->prestamo->digitalizacion,$headers);
    }
    public function estatus(CalificacionStoreRequest $request, $id,AvisosSistemaContract $notificar){
       $objeto=ClasePrestamo::findOrFail($id);
       if($request->calificacion=='CERRADO'){
         //HelperUtil::log(['$request->calificacion'=>$request->calificacion]);
         $arr_cerrar=HelperPrestamoServicio::setCerrPres($id);
         //dd($arr_cerrar);
         if ($arr_cerrar[0]==0) {
           // code...
         }else {
           return back()->withErrors('VERIFIQUE ESTADO DE COTIZACION(ES) O DEVOLUCION(ES) RELACIONADAS ('.$arr_cerrar[1].')');
         }
       }
       //dd($cerrar);

       $objeto->estatus=$request->calificacion;
        $objeto->update();
        //dd($objeto);
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>$objeto->clase,
            'ruta_siguiente'=>'',
            'ruta_califico'=>'',
            'calificacion'=>$request->calificacion,
            'iniciales'=>auth()->user()->iniciales
            ]);
        //INICIO AVISO
        if($objeto->dato!='COMPRAR'){
            $objeto->dato='';
        }
        $estado_aviso= Estado::buscar([
            'clase'=>$objeto->clase,
            'subclase'=>$objeto->dato,
            'organizacion'=>$objeto->organizacion,
            'estado'=>$objeto->estatus,
            ])->get();
        $destinos=$this->usuarioAviso($estado_aviso,$objeto,$request);
        HelperUtil::log(['AVISAR A: '.count($destinos),$destinos]);
        if(!empty($destinos)){
            $objeto->aviso($destinos);
        }
        //FIN ENVIO AVISO
        //INICIO ALERTA
        $notificar->avisa([
          /*buscar configurados*/
        'recurso'=>'prestamos.estatus',
          'estado'=>$objeto->estatus,
          /*Persistir mensaje de alerta*/
          'acceso'=>'PrestamoController@index',
          'dato'=>'buscar=1&folio='.$objeto->folio,
          'descripcion'=>'ACCESO A REQUISICION '.$objeto->estatus.' '.$objeto->folio,
          'id_foraneo'=>$objeto->id
          ]);
          //FIN ALERTA
        return back();
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
    public function enviar(EnviarARequest $request,$id){
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'F',
            'ruta_siguiente'=>'prestamos.index',
            'ruta_califico'=>$califico,
            'calificacion'=>$request->estatus,
            'iniciales'=>$iniciales
            ]);
        //dd($request->all());
        $objeto=ClasePrestamo::findOrFail($id);
        //$objeto->update(['estatus'=>'ENVIADO']);
        //INICIO enviar aviso a aprobador
        $aprobador=null;
        foreach ($request->aprobador as $val) {
                $aprobador[]= new User(['email'=>$val]);
            }
        //INICIO enviar aviso a aprobador
        if(!empty($aprobador)){
            $arr_url=explode('/',$request->url());
            $url= $arr_url[2].'/prestamos';

            foreach ($aprobador as $v) {
                $destinatario=array('destino' => $v->email,'msj'=>
                    'REQUISICION DE PIEZA SOLICITADA, REPORTE: '.$objeto->rel_reporte->folio. ' '.$objeto->estatus.' <a href="'.$url.'?folio='.$objeto->folio.'">Clic aquí para verificar</a>'
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
    private function usuarioAviso($estado_aviso,$objeto,$request){
        $destinatario=[];
        $coordinaciones=[];
        foreach ($estado_aviso as  $v) {
            # code...BUSCAR USUARIOS Q TENGAN PERMISO prestamos.index
            foreach($v->avisos as $usuario_estado_aviso){//usuarios q deben recibir avisos.
                //HelperUtil::log(['ESTADOS PARA AVISO EN CLASE AVI '.count($usuario_estado_aviso),$usuario_estado_aviso]);
                if($usuario_estado_aviso->condicion=='COORDINADOR DE SERVICIOS'){
                    $coordinaciones=Coordinacion::buscar(['nombre'=>$objeto->coordinacion])->get();
                    if(count($coordinaciones)){
                    //HelperUtil::log(['COORDINACIONES  '.count($coordinaciones),$coordinaciones]);
                        foreach ($coordinaciones as $coordinacion) {
                                $usuarios=[];
                                $usuar=$this->usuario->getUsuario([
                                $usuario_estado_aviso->condicionante => $usuario_estado_aviso->condicion,
                                'departamento'=>$coordinacion->coordinacion
                                ]);//usuarios con rol
                                if(count($usuar)){
                                    if(!empty($usuarios)){
                                    $usuarios[]=$usuar;
                                    }else{
                                    $usuarios=$usuar;
                                    }
                                }
                                //HelperUtil::log(['ESTADOS-USUARIO PARA AVISO EN COORDINADOR  '.count($usuarios),$usuarios]);
                        }
                    }
                }else{
                    $usuarios=$this->usuario->getUsuario([$usuario_estado_aviso->condicionante => $usuario_estado_aviso->condicion]);//usuarios con rol
                }
                //filtrar usuarios q tiene permiso en la url presamos.estatus en permiso
            }
        }
        if(isset($usuarios) && (count($usuarios)>0) && (!empty($usuarios)) ){
            $arr_url=explode('/',$request->url());
            $url= $arr_url[2].'/prestamos';
                //HelperUtil::log(['ESTADOS-USUARIO PARA AVISO DE PRESTAMO '.count($usuarios),$usuarios]);
                foreach ($usuarios as $key=>$usuario) {
                //HelperUtil::log(['USUARIO AUN SIN VALIDAR PERMISO  '.count($usuario),$usuario]);
                    foreach ($usuario->permisos()->where('recurso','prestamos.index')->get() as $usuario_notificar) {
                //HelperUtil::log(['USUARIO CON PERMISO DE PRESTAMO.INDEX  '.count($usuario),$usuario]);
                        $email =$usuarios[$key]->email;
                        //echo $email;
                        $destinatario[]=array('destino'=>$email,
                            'msj'=>'REQUISICION  '.$objeto->folio.' '.$objeto->estatus.'<a href="'.$url.'?folio='.$objeto->folio.'&buscar=1">Clic aquí para verificar</a>'
                         );
                    }

                }

        }
        return $destinatario;
    }
    private function especificaciones($insumos){
        $es_equipo='stock';
        $equipo=0;
        $indefinido=0;
        foreach ($insumos as $insumo) {
            if(array_key_exists('especificaciones',$insumo)){
                if($insumo['especificaciones']=='EQUIPO'){
                    $equipo++;
                }
            }else{
                $indefinido++;
            }
        }
        if($equipo){
            $es_equipo='EQUIPO';
        }elseif($indefinido){
            $es_equipo='';
        }
        return $es_equipo;
    }

    private function getPrestado($id_prestamo){//obtener el estatus prestado del prestamo
      return HelperPrestamoServicio::getPrestado($id_prestamo);
    }
    private function getLineaServicio($id_prestamo,$codigo_proovedor){//Buscar las lineas parecidas en la os y si existe en alguna orden regresar la existencia de folio de la o.s.
      HelperPrestamoServicio::getLineaServicio($id_prestamo,$codigo_proovedor);
    }
    /*private function getLineasPrestamosDelete($id_prestamo){
      return HelperPrestamoServicio::getLineasPrestamosDelete($id_prestamo);
    }*/
    private function getLineasPrestamos($id_prestamo){
      return HelperPrestamoServicio::getLineasPrestamos($id_prestamo);
    }

}
