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

class DevolucionController extends Controller
{
    protected $arr_bsc=[];
    private $objeto;
    private $usuario;
    public function __construct(HelperUsuario $consulta_usuario){
        $this->arr_bsc['clase']='DEV';
        $this->objeto = new ClasePrestamo(['clase'=>'DEV','sucursal'=>auth()->user()->lugar_centro_costo]);
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
          if(isset($request->id)){
            $this->arr_bsc['id_foraneo']=$request->id;
          }
            $objetos=ClasePrestamo::buscar($this->arr_bsc+$request->all())
            ->orderBy('updated_at')
            ->paginate(15);
        }else{
            $objetos=ClasePrestamo::buscar($this->arr_bsc)
            ->orderBy('folio','desc')
            ->orderBy('created_at','desc')
            ->orderBy('updated_at','desc')
            ->paginate(15);
        }
        return view('devoluciones.index',compact('objetos','request'));
    }
    public function eliminados(Request $request)
    {
        $objetos=ClasePrestamo::onlyTrashed()->paginate();
        return view('devoluciones.index',compact('objetos','request'));
    }

    public function create($id){ //id de prestamo    //dd($id);//$prestamo= ClasePrestamo::findOrFail($id);
      //$objeto= Reporte::findOrFail($id);                       //dd($reporte);
      return view('devoluciones.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequisicionStoreRequest $request)
    {
        HelperUtil::log(['GENERA DEVOLUCION'=>$request->all()]);
        $this->objeto->fill($request->except(['clase','folio']));
        //$this->objeto->dato=json_encode(array('p_delivery_location_id'=>$request->p_delivery_location_id,'dato'=>$request->dato));
        //$reporte=$request->all();
        $this->objeto->foliar='DEV';
        $this->objeto->estatus='GUARDADO';
        $this->objeto->sucursal= auth()->user()->lugar_centro_costo;
        $this->objeto->fecha_recepcion=Carbon::now();
        $this->objeto->autor=auth()->user()->iniciales;
        $prestamo= new Prestamo($request->except(['p_delivery_location_id']));
        $prestamo->clase='DEV';
            $this->objeto->save();
            /*$reporte=ClasePrestamo::findOrFail($request->id);
            $reporte->id_prestamo_refaccion=$this->objeto->id;
            $reporte->save();*/
            $this->objeto->prestamo()->save($prestamo);
            //INICIO alta de insumos.
            $this->altaInsumosDev($request->insumos);
            //FIN ALTA DE INSUMOS.
            $es_equipo=$this->especificaciones($request->insumos);
            $this->objeto->update(['dato'=>$es_equipo]);

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
                    default:
                    $objeto=ClasePrestamo::findOrFail($id);
                        $objeto->prestamo;
                        $insumos_servicio=InsumoCompraVenta::buscar(['clase'=>'DEV','id_compra_venta'=>$id])->get();
                        $objeto->insumos_compras_ventas=$insumos_servicio;
                        return response()->json(
                        [
                            "objeto"=>$objeto->toArray()
                        ],200
                        );
                        break;
                }
            }
        return view('devoluciones.show',compact('objeto'));
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
        return view('devoluciones.edit',compact('id'));
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
        $this->objeto=ClasePrestamo::findOrFail($id);
        $this->objeto->fill($request->all() );
        //$objeto->fill($request->all());
        //$objeto->dato=json_encode(array('p_delivery_location_id'=>$request->p_delivery_location_id));
        //$objeto->estatus='GUARDADO';
        HelperUtil::log(['$this->objeto->id'=>$this->objeto->id]);
        $objeto->update();
        $objeto->prestamo()->delete();
        $prestamo= new Prestamo($request->all());
        $prestamo->id_foraneo=$id;
        $prestamo->clase='DEV';
        $prestamo->save();
        //INICIO alta de insumos.
        $this->altaInsumosDev($request->insumos);
        //FIN ALTA DE INSUMOS.
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
                  return redirect('devoluciones');

                }
    }
    /*
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
    }*/
    public function estatus(CalificacionStoreRequest $request, $id,AvisosSistemaContract $notificar){
      $objeto=ClasePrestamo::findOrFail($id);
      if($request->calificacion=='CANCELADO'){
        if(!$this->cancelDev($objeto)){
        //}else{
          return back()->withErrors('VERIFIQUE PRESTAMO(s)');
        }
      }
      //dd($request->all());
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
        //HelperUtil::log(['AVISAR A: '.count($destinos),$destinos]);
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
          //INICIO SI CANCELA, SUMAR CANT A PRESTAMO
          $this->cancelDev();
          //FIN SI CANCELA, SUMAR CANT A PRESTAMO
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

    private function altaInsumosDev($insumos){//Alta de insumos por DEVOLUCION

      $arr_insumos=[];
      foreach ($insumos as $insumo_compra) {
        HelperUtil::log(['$insumo_compra :'=>$insumo_compra]);
              $insumo=new InsumoCompraVenta($insumo_compra);
              $insumo->id_compra_venta=$this->objeto->id;
              $insumo->clase='DEV';
                if($insumo_compra['id']>0){
                }else{
                    HelperPrestamoServicio::restInsumPrest($insumo);
                }
              
              $arr_insumos[]=$insumo;
          }
      $insumos_servicio=InsumoCompraVenta::buscar(['clase'=>'DEV','id_compra_venta'=>$this->objeto->id])->delete();
      //DESCONTAR CANTIDADES DE PRESTAMO
      //FIN DESCONTAR CANTIDADES DE PRESTAMO
      return $this->objeto->insumos_compras_ventas()->saveMany($arr_insumos);
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
    /*private function estatusPrestamo($devolucion){
      $insumos_dev=InsumoCompraVenta::buscar(['id_compra_venta'=>$devolucion->id])->first();
      return HelperPrestamoServicio::setCerrPres($insumos_dev->id_prestamo,$devolucion->id);
    }*/
    private function cancelDev($devolucion){
      $insumos_dev=InsumoCompraVenta::buscar(['id_compra_venta'=>$devolucion->id])->get();
      $prestado=0;
      foreach ($insumos_dev as $insumo) {
          //GET SI PRESTAMO ESTA PRESTADO
          if(HelperPrestamoServicio::getPrestado($insumo->$id_prestamo) ){
                  $prestado++;
          }else{
            $insumo->id_prestamo='';
            $insumo->id_insumo_prestamo='';
            $insumo->save();
          }
      }
      if(empty($prestado)){//sumar la cantidad a prestamo
        HelperPrestamoServicio::cancelDoc($insumo->id,$insumo->cantidad);
      }
      return $prestado;
    }

}
