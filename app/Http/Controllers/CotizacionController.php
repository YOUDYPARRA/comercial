<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cotizacion;
use App\CotizacionPaqueteInsumo;
use App\InsumoCompraVenta;
use App\PrestamoCotizacion;
use App\Http\Requests;
use App\Calificacion;
use App\Observacion;
use App\Clase;
use App\Estado;
use DB;
use App\Http\Requests\ObservacionStoreRequest;
use App\Helpers\HelperUtil;
use App\Http\Controllers\Controller;
use App\Helpers\HelperUsuario;
use App\Helpers\HelperPrestamoServicio;
use App\Services\ManagerCorreo;
use App\Http\Requests\CotizacionStoreRequest;
use App\Helpers\Contracts\AvisosSistemaContract;
use App\Helpers\Contracts\ConfiguracionClaseContract;
use Validator;


class  CotizacionController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */                                                         //20160204 ADD EMS
    protected $usuario;
    protected $correo;
    protected $validador;
    protected $actualizar=false;
    protected $valido=null;
    protected $reglas_concretar=array('c_bpartner_id'=>'required','id_condicion_factura'=>'required','metodo_pago'=>'required','id_condicion_pago_tiempo'=>'required');
    protected $accesos=[
      'ventas'=>array('ruta'=>'cotizaciones.index?aprobacion=0'),
      'GUARDADO'=>array('ruta'=>'cotizaciones.index','acceso'=>'CotizacionController@index'),//VENTAS CONSUMIBLES
      'APROBADO'=>array('ruta'=>'cotizaciones.index','acceso'=>'CotizacionController@index'),//VENTAS CONSUMIBLES
      'ENVIADO'=>array('ruta'=>'cotizaciones.index?aprobacion=2','acceso'=>'CotizacionController@index'),
      'SOLICITUD'=>array('ruta'=>'cotizaciones.servicio','acceso'=>'CotizacionController@servicio'),//asistente direccion
      'ACEPTADO'=>array('ruta'=>'cotizaciones.servicio','acceso'=>'CotizacionController@servicio'),//asistente direccion
      //'marketing'=>array('ruta'=>'cotizaciones.index?aprobacion=1'),
      'CONCRETADO'=>array('ruta'=>'cotizaciones.autorizadas','acceso'=>'CotizacionController@indexAutorizada'),//CADENA
      'PROCESADO'=>array('ruta'=>'cotizaciones.autorizadas','acceso'=>'CotizacionController@indexAutorizada'),//CADENA
      'PROGRAMADO'=>array('ruta'=>'cotizaciones.autorizadas','acceso'=>'CotizacionController@indexAutorizada'),//CADENA
      'RUTA'=>array('ruta'=>'cotizaciones.autorizadas','acceso'=>'CotizacionController@indexAutorizada'),//CADENA
      'ENTREGADO'=>array('ruta'=>'cotizaciones.autorizadas','acceso'=>'CotizacionController@indexAutorizada'),//CADENA
      'ENTREGADO TERCERO'=>array('ruta'=>'cotizaciones.autorizadas','acceso'=>'CotizacionController@indexAutorizada'),//CADENA
      'RECEPCIONADO'=>array('ruta'=>'cotizaciones.autorizadas','acceso'=>'CotizacionController@indexAutorizada'),//CADENA
    ];

     public function __construct(HelperUsuario $consulta_usuario, ManagerCorreo $envia_correo,Validator $validador){
         $this->usuario= $consulta_usuario;
         $this->correo=$envia_correo;
         $this->validador= new $validador;
     }
    //FIN

     public function cotizacions(){
        return $this->belongsTo('App\CotizacionPaqueteInsumo', 'id_cotizacion','id');
    }

    public function getCotizacionesPorUsuario(Request $request){
        $objetos=\DB::table('cotizaciones')        //$objetos=Cotizacion::on('mysql')
        //->select('usuario','estatus',\DB::raw('count(*) as total'))
        //->where('usuario',$request->usuario)
        //->groupBy('mes')
        //->where('usuario','EDITH ARIADNA MARQUEZ LOPEZ')
        //->where('created_at','LIKE','%2018%')
        //->where('estatus','!=','')
        //->groupBy('estatus')
        ->select('nombre_empleado as empleado','estatus',\DB::raw('YEAR(created_at) as año,MONTH(created_at) as mes,count(*) as total'))
        ->where('estatus','=','CONCRETADO')
        //->where('nombre_empleado','like','%LOPEZ%')
        ->groupBy('mes')
        ->groupBy('año')
        ->groupBy('empleado')
        ->get();        //
        //dd($objetos);
        return response()->json(
                [
                    "msg"=>"Success",
                    "objeto"=>$objetos//->toArray()
                ],200
                );        //return view('paquetes.index',  compact('objetos','request'));        //dd($objetos->toArray());
    }

    public function ultimo(Request $request){
        $objetos=Cotizacion::on('mysql')
        ->select('id','auto')
        ->where('org_name',$request->org_name)        //->whereRaw('auto = (SELECT max(`auto`) FROM cotizaciones)')        //->whereRaw('id = (SELECT max(`id`) FROM cotizaciones)')
        ->orderBy('auto','desc')        //->groupBy('id')
        ->get();
        return response()->json(
                [
                    "msg"=>"Success",
                    "ultimo"=>$objetos->toArray()
                ],200
                );        //return view('paquetes.index',  compact('objetos','request'));        //dd($objetos->toArray());
    }

    public function indexFirmada(Request $request){
        $objetos = Cotizacion::where('estatus','CONCRETADO')
        ->indexBuscar($request)
        ->orderBy('updated_at','DESC')
        ->paginate(25);
        $request->aprobacion=1;
        return view('cotizaciones.indexFirmadas',compact('objetos','request'));
    }

    public function indexAutorizada(Request $request){
        if(!empty($request->buscar)){
          switch ($request->buscar) {
            case '2':
              //CONSULTAR COPMPRA VENTA
              //cuando se haga filtro por compras o venta, hacer consulta de compras_ventas, LAS Q NO TIENE COMPRA O VENTA
              /*
              $objetos = DB::table('cotizaciones')
              ->join('compras_ventas', 'cotizaciones.id', '=', 'compras_ventas.id_cotizacion')
              //->where('compras_ventas.id_cotizacion','=','cotizaciones.id')
              //->select('cotizaciones.*', 'compras_ventas.tipo_archivo', 'compras_ventas.folio')
              ->where('cotizaciones.estatus','=','CONCRETADO')
              ->whereDate('cotizaciones.created_at','>','2017-04-27')
              ->select('cotizaciones.*', 'compras_ventas.tipo_archivo', 'compras_ventas.folio')
              ->where(function($query)
              {
                $query->where('cotizaciones.clase','c')
                  ->orWhere('cotizaciones.clase','cm')
                  ->orWhere('cotizaciones.clase','cst');
              })
              ->orderBy('created_at','desc')
              //->whereBetween('cotizaciones.clase',['c','cst','cm'])
              ->paginate(25);
              */
              //dd($objetos);
              break;
            default:
              // code...
              $objetos = Cotizacion::
              indexBuscar($request)
              ->orderBy('updated_at','DESC')
              ->paginate(25);
              break;
            }
            $request->aprobacion=1;
        }else{
            if(auth()->user()->lugar_centro_costo=='GDL'){
                $objetos = Cotizacion::
                where('estatus','CONCRETADO')                //->where('org_name',auth()->user()->org_name)
                ->where('numero_cotizacion','like','%'.auth()->user()->lugar_centro_costo.'%')
                ->indexBuscar($request)
                ->orderBy('updated_at','DESC')
                ->paginate(25);
                $request->aprobacion=1;
            }else{
                if(auth()->user()->puesto=='ALMACENISTA'){
                    $objetos = Cotizacion::
                    where('estatus','PROCESADO')                //->where('org_name',auth()->user()->org_name)
                    ->orWhere('estatus','RECEPCIONADO')                //->where('org_name',auth()->user()->org_name)
                    ->orWhere('estatus','PROGRAMADO')                //->where('org_name',auth()->user()->org_name)
                    ->orWhere('estatus','RUTA')                //->where('org_name',auth()->user()->org_name)
                    ->orWhere('estatus','ENTREGADO')                //->where('org_name',auth()->user()->org_name)
                    ->orWhere('estatus','ENTREGADO TERCERO')                //->where('org_name',auth()->user()->org_name)
                    ->indexBuscar($request)
                    ->orderBy('updated_at','DESC')
                    ->paginate(25);
                    $request->aprobacion=1;
                }else{//var_dump("expression");
                    $objetos = Cotizacion:://where('created_at','>','2018-07-02 00:00:01')
                    where('estatus','PROCESADO')
                    ->orWhere('estatus','CONCRETADO')
                    ->indexBuscar($request)//->orderBy('id','DESC')
                    ->orderBy('updated_at','DESC')
                    ->paginate(25);
                    $request->aprobacion=1;
                }
            }
        }
        return view('cotizaciones.indexAutorizada',compact('objetos','request'));
    }

    public function index(Request $request){//       if (isset($request->aprobacion)) {
                switch ($request->aprobacion) {
                    case '0':                        # code...Ventas
                        if ($request->user()->can('acceso', 'cotizaciones.index?aprobacion=0')) {
                            if(isset($request->buscar)){//realizar busqueda de todas las cotizaciones.
                               $objetos=Cotizacion::on('mysql')
                                ->indexBuscar($request)
                                ->orderBy('updated_at','DESC')
                                ->paginate(10);
                            }else{//                                echo 'Ventas';
                                $objetos=Cotizacion::on('mysql')
                                ->indexaprobacionventas()
                                ->indexBuscar($request)
                                ->orderBy('updated_at','DESC')
                                ->paginate(7);
                            }
                            return view('cotizaciones.index',  compact('objetos','request'));
                        }else{
                            abort(401);
                        }
                        break;
                    case '1':                        # code...Marketing//                        echo'marketing';
                        if ($request->user()->can('acceso', 'cotizaciones.index?aprobacion=1')) {
                            if(isset($request->buscar)){
                                $objetos=Cotizacion::on('mysql')
                                ->indexBuscar($request)
                                ->orderBy('updated_at','DESC')
                                ->paginate(10);
                            }else{
                                $objetos=Cotizacion::on('mysql')
                                ->indexaprobacionmarketing()
                                ->indexBuscar($request)
                                ->orderBy('updated_at','DESC')
                                ->paginate(7);
                            }
                            return view('cotizaciones.index',  compact('objetos','request'));
                        }else{
                            abort(401);
                        }
                        break;
                    case '2':                        # code...Cobranza
                        if ($request->user()->can('acceso', 'cotizaciones.index?aprobacion=2')) {
                            if(isset($request->buscar)){
                                $objetos=Cotizacion::on('mysql')
                                ->indexBuscar($request)
                                ->orderBy('estatus')
                                ->orderBy('updated_at','DESC')
                                ->paginate(10);                                //echo "BUSCAR";
                            }else{
                                $objetos=Cotizacion::on('mysql')
                                ->indexaprobacioncreditocobranza()//                                ->indexBuscar($request)
                                ->orderBy('updated_at','DESC')
                                ->paginate(7);

                            }//                        $objetos->aprobacion='2';//                        $subject=$objetos->render();//                        $objetos->paginado=str_replace("?", "?aprobacion=2&", $subject);
                        return view('cotizaciones.index',  compact('objetos','request'));
                        break;
                        }else{
                            abort(503);
                        }
                    case '3'://aprobacion en servicio
                        if ($request->user()->can('acceso', 'cotizaciones.index?aprobacion=3')) {
                            if($request->buscar){
                                $objetos=Cotizacion::on('mysql')
                                ->indexBuscar($request)
                                ->orderBy('created_at','DESC')
                                ->paginate(10);
                            }else{
                                $objetos=Cotizacion::on('mysql')
                                ->indexaprobacionservicio()//Buscar con departamento que indique servicio.
                                ->indexBuscar($request)
                                ->orderBy('created_at','DESC')
                                ->paginate(10);
                            }
                            return view('cotizaciones.index',  compact('objetos','request'));
                        break;
                        }else{
                            abort(401);
                        }
                        break;
                    case '4':
                            $objetos=Cotizacion::indexBuscar($request)->get();                                //dd($objetos);
                                return response()->json(
                                [
                                    'msg'=>'Success',
                                    'objetos'=>$objetos,
                                    'prueba'=>$objetos,
                                ],200
                                );
                        break;
                    default:                        # code...CONSULTA DE COTIZACION POR ID USUARIO O ADMINISTRADOR.
                        if(auth()->user()->tipo_usuario=='ADMINISTRADOR'){                            //CONSULTAR TODAS LAS COTIZACIONES.
                            $objetos=Cotizacion::indexBuscar($request)
                                    ->indexBuscar($request)                                    //->orderBy('auto','DESC')
                                    ->orderBy('updated_at','DESC')
                                    ->paginate(15);
                        }else{                            //buscar las cotizaciones segun el usuario en la sesion actual.                            //mumero de cotizacion.                            //fecha de cotizacion                            //Nombre fiscal
                            if(isset($request->buscar)){
                                $objetos= Cotizacion::
                                    indexBuscar($request)                                        //->orderBy('auto','DESC')
                                    ->orderBy('updated_at','DESC')
                                    ->paginate(15);
                            }else{
                                $objetos= Cotizacion::nombreEmpleado(auth()->user()->name)
                                        ->where('estatus','!=','CANCELADO')                                        //->orderBy('auto','DESC')
                                        ->orderBy('updated_at','DESC')
                                        ->paginate(15);
                            }
                        }                        //dd('cotizacionesxxx');
                        return view('cotizaciones.index',  compact('objetos','request'));
                        break;
                }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $cotizacion= new Cotizacion();
        return view('cotizaciones.create',compact('cotizacion'));
    }

    public function reporte($id){
        $objeto=Clase::findOrFail($id);
        return view('reportes.create_cotizacion',compact('objeto'));
    }
/*
    public function prestamo($id){ //dd();
        $objeto=Clase::findOrFail($id);
        return view('prestamos.create_cotizacion',compact('objeto'));
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CotizacionStoreRequest $request,ConfiguracionClaseContract $clasificar){
    //dd($request->get('fecha_vigencia'));        //dd($request->get('centro_costo'));    //dd($request->get("tipo_facturacion"));    //dd($request->all());
        HelperUtil::log(['CREAR COTIZACION; EN PETICION'=>$request->all()]);
        $vers=$request->get('version');
        $autos=Cotizacion::select('auto')->where('org_id',$request->org_id)->orderBy('auto','desc')->limit(1)->get();        //dd($ordenes);
        $numero_cotizacion=$request->get('numero_cotizacion');
        if($vers>1){                                                //dd($request->get('version'));//dd($request->get('id'));
            $cotAct = Cotizacion::find($request->get('id'));        //$objeto=array('estatus'=>'CANCELADO');        //var_dump($cotAct);
            $cotAct->update(['estatus'=>'CANCELADO']);
            $auto=$autos[0]->auto;
        }else{
            if(empty($autos[0])){
                $auto=1;
                $numero_cotizacion=$numero_cotizacion."-".$auto;
            }else{
                $auto=$autos[0]->auto+1;
                $numero_cotizacion=$numero_cotizacion."-".$auto;
            }                                                       //dd($numero_cotizacion);// dd($request->get('id_condicion_pago_tiempo'));//var_dump("version =1");
        }
        $aprobacion_ventas='';
        $aprobacion_marketing='';
        $cotizacion = array(
                            'fecha_vigencia' => $request->get('fecha_vigencia'),
                            'sr' => $request->get('sr'),
                            'equipo' => $request->get('equipo'),
                            'aprobacion_ventas' => $aprobacion_ventas,
                            'aprobacion_marketing' => $aprobacion_marketing,
                            'nombre_fiscal' => $request->get('nombre_fiscal'),
                            'tipo_moneda' => $request->get('tipo_moneda'),
                            'tipo_cliente' => $request->get('tipo_cliente'),
                            'numero_cotizacion' => $numero_cotizacion,
                            'nombre_empleado' => $request->get('nombre_empleado'),
                            'estatus' => $request->get('estatus'),
                            'version' => $request->get('version'),
                            'rfc' => $request->get('rfc'),
                            'fecha' => $request->get('fecha'),
                            'fecha_entrega' => $request->get('fecha_entrega'),
                            'nombre_cliente' => $request->get('nombre_cliente'),
                            'calle_entrega' => $request->get('calle_entrega'),
                            'telefono' => $request->get('telefono'),
                            'celular' => $request->get('celular'),
                            'contacto' => $request->get('contacto'),
                            'correo' => $request->get('correo'),
                            'colonia_entrega' => $request->get('colonia_entrega'),
                            'codigo_postal_entrega' => $request->get('codigo_postal_entrega'),
                            'ciudad_entrega' => $request->get('ciudad_entrega'),
                            'estado_entrega' => $request->get('estado_entrega'),
                            'pais_entrega' => $request->get('pais_entrega'),
                            'representante_legal' => $request->get('representante_legal'),
                            'subtotal' => $request->get('subtotal'),
                            'iva' => $request->get('iva'),
                            'total' => $request->get('total'),
                            'departamento' => $request->get('departamento'),
                            'c_bpartner_id' =>  $request->get('c_bpartner_id'),
                            'c_location_id' => $request->get('c_location_id'),
                            'ad_user_id' => $request->get('ad_user_id'),
                            'usuario' => $request->get('usuario'),
                            'precio' => $request->get('precio'),
                            'tiempo_entrega' => $request->get('tiempo_entrega'),
                            'condicion_pago' => $request->get('condicion_pago'),
                            'guia_mecanica_salvaguarda_instalacion' => $request->get('condicion_guia_mecanica_salvaguarda_instalacion_v'),
                            'garantia' => $request->get('garantia'),
                            'capacitacion' => $request->get('capacitacion'),
                            'validez' => $request->get('validez'),
                            'anticipo' => $request->get('anticipo'),
                            'reporte' => $request->get('reporte'),
                            'calle_fiscal'=> $request->get('calle_fiscal'),
                            'colonia_fiscal'=> $request->get('colonia_fiscal'),
                            'codigo_postal_fiscal'=> $request->get('codigo_postal_fiscal'),
                            'ciudad_fiscal'=> $request->get('ciudad_fiscal'),
                            'estado_fiscal'=> $request->get('estado_fiscal'),
                            'pais_fiscal'=> $request->get('pais_fiscal'),
                            'org_name'=> $request->get('org_name'),
                            'auto'=> $auto,
                            'nota'=> $request->get('nota'),
                            'mensaje_atencion'=> $request->get('mensaje_atencion'),
                            'area'=> $request->get('area'),
                            'centro_costo'=> $request->get('centro_costo'),
                            'no_orden_servicio'=> $request->get('no_orden_servicio'),
                            'no_contrato'=> $request->get('no_contrato'),
                            'fecha_factura'=> '',
                            'iniciales_asignado'=> $request->get('iniciales_asignado'),
                            'no_pedido'=> $request->get('no_pedido'),
                            'id_condicion_factura'=> $request->get('id_condicion_factura'),
                            'id_condicion_pago_tiempo'=> $request->get('id_condicion_pago_tiempo'),
                            'id_metodo_envio'=> $request->get('id_metodo_envio'),
                            'metodo_pago'=> $request->get('metodo_pago'),
                            'cotizacion'=> $request->get('cotizacion'),
                            'venta'=> $request->get('venta'),
                            'compra'=> $request->get('compra'),
                            'venta_compra'=> $request->get('venta_compra'),
                            'org_id'=> $request->get('org_id')
                            );
HelperUtil::log(['cotizacion'=>$cotizacion]);
        $cotizacion = new Cotizacion($cotizacion);
        //$evaluar=(object)$cotizacion;
        $cl=$clasificar->configuracion('cotizacion',$cotizacion);
        //HelperUtil::log(['$cl :'.count($cl)=>$cl]);
        if($cl){
            $cotizacion['clase']=$cl;
        }else{
            $cotizacion['clase']=$cotizacion->getClase(auth()->user()->puesto);
        }
        $cotizacion->save();
        $this->calificacion('CREADO',$cotizacion->id);
        //HelperUtil::log(['$cotizacion->id'=>$cotizacion->id]);
        //$cotizacion=Cotizacion::create($cotizacion);
    //OBTENER LA CLASE DEL DOCUMENTO
        //$cotizacion->clase=$cotizacion->getClase(auth()->user()->puesto);
        //HelperUtil::log(['clase'=>$cotizacion->clase]);
        //$cotizacion->update();
    //FIN OBTENER LA CLASE DEL DOCUMENTO
//HelperUtil::log(['sE GUARDA LA COTIZACION'=>$cotizacion]);
//HelperPrestamoServicio::delInsumosCot($cotizacion->id);
       $nuevo=array();
        $i=0;
        $a=count($request->objeto);//dd($a);
        $m=0;
        $kk=$request->objeto;//dd($kk);//dd($nuevo);
        $ok2=array_keys($kk);//dd($ok2[1]);
        for($l=0; $l<$a; $l++){
        $m=$ok2[$l];
        $nuevo[$l]=$kk[$m];
      }
        while($i<$a){//dd($request->objeto);
        $cotizacionPaqueteInsumo = [
                 'id_cotizacion' => $cotizacion->id,
                 'id_paquete'    => $nuevo[$i]['id_paquete'],
                 'id_insumo'     => $nuevo[$i]['id_insumo'],
                 'bandera_insumo' => $nuevo[$i]['bandera_insumo'],
                 'codigo_proovedor' => $nuevo[$i]['codigo_proovedor'],
                 'tipo_equipo' => $nuevo[$i]['tipo_equipo'],
                 'tipo_cambio' => $nuevo[$i]['tipo_cambio'],
                 'marca' => $nuevo[$i]['marca'],
                 'modelo' => $nuevo[$i]['modelo'],
                'descripcion' => $nuevo[$i]['descripcion'],
                'caracteristicas' => $nuevo[$i]['caracteristicas'],
                'especificaciones' => $nuevo[$i]['especificaciones'],
                'costos' => $nuevo[$i]['costos'],
                'unidad_medida' => $nuevo[$i]['unidad_medida'],
                'unidad_compra' => $nuevo[$i]['unidad_compra'],
                'cantidad_unidad_compra' => $nuevo[$i]['cantidad_unidad_compra'],
                'costo_moneda' => $nuevo[$i]['costo_moneda'],
                'precio' => $nuevo[$i]['precio'],
                'cantidad' => $nuevo[$i]['cantidad'],
                'descuento' => $nuevo[$i]['descuento'],
                'id_insumo_prestamo' => $nuevo[$i]['id_insumo_prestamo'],
                'id_prestamo' => $nuevo[$i]['id_prestamo'],
                'm_product_category_id' => $nuevo[$i]['m_product_category_id']
                 ];
            $insumo_cotizacion=CotizacionPaqueteInsumo::create($cotizacionPaqueteInsumo);
            /**
            *Ver si viene id_insumo_prestamo
            *Buscar y descontar de prestamo el insumo actual
            *Buscar Si hay un insumo anterior en cotizacion
            *Buscar y Obtener para Verificar cual insumo no vienen en la peticion para sumar a prestamo
            *Actualizar prestamo.insumo.cantidad
            **/
            HelperPrestamoServicio::restInsumPrest($insumo_cotizacion);
            /**RELACIONAR LAS LINEAS DE PRESTAMO CON LA COTIZACION**/
            $this->relPrestCot($cotizacionPaqueteInsumo['id_prestamo'],$cotizacion->id);
            /**FIN RELACIONAR LAS LINEAS DE PRESTAMO CON LA COTIZACION**/
            if(!empty($request->reporte)){//AGREGAR numero de cotizacion al reporte
                $reporte='';
                $reporte=Clase::buscar(['clase'=>'R','folio'=>$request->reporte])->get();
                if(is_object($reporte)){
                    $reporte[0]->update(['id_cotizacion' => $cotizacion->id]);
              }
            }//FIN AGREGAR NUMERO DE COTIZACION A REPORTE           // CotizacionPaqueteInsumo::create($request->nuevo[$i]);
        $i++;
        }        //$cotizacion->programa();        //Session::flash('message','! Registro guardado exitosamente ¡');   //return redirect('cotizaciones')->with('message','EL REGISTRO SE HA GUARDADO CORRECTAMENTE');
        return redirect('cotizaciones')->withSuccess('EL REGISTRO SE HA GUARDADO CORRECTAMENTE');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id){//        dd($id);
        switch ($request->vi){
                case '0':                    //regresa el nuevo numero de version
                        $cotizacion = Cotizacion::findOrFail($id);
                        $version_actual= $cotizacion->version+1;                        //                        dd($version_actual);
                        return response()->json(
                                [
                                    'msg'=>'Success',
                                    'version'=>$version_actual
                                ],200
                                );
                    break;
                default :                        //$objeto = Cotizacion::find($id);                            //realizar consulta Cotizacion                          //  return $objeto;
                    break;
            }
    }
    /**
     *
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $cotizacion = Cotizacion::find($id);
        //lineas de prestamos
        //ver si campo venta tienealgo
        //colocar cotizacion.objeto
        $objeto=$this->getLnPres($cotizacion->venta);
        $cotizacion->objeto=$objeto;
        $cotizacion->aloka=45;
        $cotizacion->codonics=20;
        $cotizacion->del=45;
        $cotizacion->hitachi=45;
        $cotizacion->hologic=30;
        $cotizacion->sony=30;
        $cotizacion->villa=45;
        return view('cotizaciones.edit',compact('cotizacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id,AvisosSistemaContract $notificar){         //dd($r);        //
        //dd($request->get('fecha_vigencia'));
        HelperUtil::log(['Cotizacion Update: $request->all()'=>$request->all()]);
        if($request->tipo_actualizacion=="actualizar" || $request->tipo_actualizacion==null || $request->tipo_actualizacion==""){        //dd($request->all());
        $objeto = Cotizacion::find($id);                                                        //        $objeto->estatus=$request->calificacion;
            if( isset($request->calificacion) ){//REaliza validacion de estatus condicionado a viaticos y tipo de pago
              //HelperUtil::log(['Clase Qry'=>$objeto->clase,'Estatus Qry'=>$objeto->estatus]);
                if(empty($request->calificacion)){
                  return back()->withErrors(['APROBACION NO PUEDE SER CAMPO VACIO']);
                }else{
                    $this->estatus($request,$objeto,$id,$notificar);//HelperUtil::log(['$this->actualizar :'.count($this->actualizar)=>$this->actualizar]);
                    if(is_array($this->actualizar) ){//VERIFICA SI SE ACTUALIZO
                      return back()->withErrors($this->actualizar);
                      //return back()->withErrors(['VERIFICAR CAMPOS FISCALES/ENTREGA, PAGO Y/O VIATICO']);
                    }else{
                      return back();
                    }
                }
            }else{
                $objeto->update($request->except('reporte'));
                $this->calificacion('ACTUALIZADO',$id);
            }
//dd($request->all());
            if(isset($request->objeto)){
              HelperUtil::log(['Borrar Lineas :'=>'Borrar Lineas']);
                $objeto->cotPaqIns()->delete();
                /*foreach ($request->objeto as $key => $value) {
                    $arr_dat['id_cotizacion']=$id;
                    foreach ($value as $key=> $i){                              //                       echo $key.'=>'.$i;
                        if($key=='id_pack'){
                            $key='id_paquete';
                        }
                        if($key!='total'){
                            $arr_dat[$key]=$i;
                        }
                    }
                    $ins=new CotizacionPaqueteInsumo($arr_dat);
                    $arr_obj[]=$ins;
                }*/
                //HelperUtil::log(['$request->objeto :'.count($request->objeto)=>$request->objeto]);
                $this->actualizarLineas($request,$objeto);
                //$objeto->cotPaqIns()->saveMany($arr_obj);

            }                                                                                       //dd($arr_obj);

            if ($request->wantsJson()){
                return response()->json(["msg"=>"Success"],200);
            }else{                                                                                  //Session::flash('message','! Registro actualizado exitosamente ¡');
                if(isset($request->version)){                                                       //dd('NO HAY REPORTE');                //if(!empty($request->reporte) && $request->estatus=='VALIDADO'){                  //  dd('HAY REPORTE');                    //return redirect('cotizaciones');
                    if(auth()->user()->area=='SERVICIO TECNICO'){                                   //  dd('HAY REPORTE');                    //return redirect('cotizaciones');
                        if(auth()->user()->puesto=='SECRETARIA' || auth()->user()->puesto=='GERENTE DE OPERACIONES'){                  //  dd('HAY REPORTE');                    //return redirect('cotizaciones');
                            return redirect('cotizaciones/servicio')->withSuccess('EL REGISTRO SE HA ACTUALIZADO CORRECTAMENTE CST');
                        }else{
                            return redirect('cotizaciones')->withSuccess('EL REGISTRO SE HA ACTUALIZADO CORRECTAMENTE CstC');
                        }
                    }
                    return redirect('cotizaciones')->withSuccess('EL REGISTRO SE HA ACTUALIZADO CORRECTAMENTE C');
                }
            }//FIN DE ELSE WANTSJSON
        }// FIN DE ACTUALIZAR
        if($request->tipo_actualizacion=="version"){                                         //dd("VERSION");
            //$vers=$request->get('version')+1;                                               var_dump("version");var_dump($vers);
            $autos=Cotizacion::select('auto')->where('org_id',$request->org_id)->orderBy('auto','desc')->limit(1)->get();                               //dd($ordenes);
            $vers=Cotizacion::select('version')->where('numero_cotizacion',$request->numero_cotizacion)->orderBy('version','desc')->limit(1)->get();                               //dd($ordenes);
            $auto=$autos[0]->auto;
            $version=$vers[0]->version+1;
            $numero_cotizacion=$request->get('numero_cotizacion');                          //if($request->get('version')>1){                            //dd($request->get('version'));//dd($request->get('id'));
            /*if($vers>1){                                                                    //dd($request->get('version'));//dd($request->get('id'));
                $cotAct = Cotizacion::find($request->get('id'));                            //$objeto=array('estatus'=>'CANCELADO');        //var_dump($cotAct);
                $cotAct->update(['estatus'=>'SOLICITUD']);
            }*/
            $aprobacion_ventas='';
            $aprobacion_marketing='';
            $cotizacion = array(
                            'fecha_vigencia' => $request->get('fecha_vigencia'),
                            'sr' => $request->get('sr'),
                            'equipo' => $request->get('equipo'),
                            'aprobacion_ventas' => $aprobacion_ventas,
                            'aprobacion_marketing' => $aprobacion_marketing,
                            'nombre_fiscal' => $request->get('nombre_fiscal'),
                            'tipo_moneda' => $request->get('tipo_moneda'),
                            'tipo_cliente' => $request->get('tipo_cliente'),
                            'numero_cotizacion' => $request->get('numero_cotizacion'),
                            'nombre_empleado' => $request->get('nombre_empleado'),
                            'estatus' => $request->get('estatus'),
                            'version' => $version,
                            'rfc' => $request->get('rfc'),
                            'fecha' => $request->get('fecha'),
                            'fecha_entrega' => $request->get('fecha_entrega'),
                            'nombre_cliente' => $request->get('nombre_cliente'),
                            'calle_entrega' => $request->get('calle_entrega'),
                            'telefono' => $request->get('telefono'),
                            'celular' => $request->get('celular'),
                            'contacto' => $request->get('contacto'),
                            'correo' => $request->get('correo'),
                            'colonia_entrega' => $request->get('colonia_entrega'),
                            'codigo_postal_entrega' => $request->get('codigo_postal_entrega'),
                            'ciudad_entrega' => $request->get('ciudad_entrega'),
                            'estado_entrega' => $request->get('estado_entrega'),
                            'pais_entrega' => $request->get('pais_entrega'),
                            'representante_legal' => $request->get('representante_legal'),
                            'subtotal' => $request->get('subtotal'),
                            'iva' => $request->get('iva'),
                            'total' => $request->get('total'),
                            'departamento' => $request->get('departamento'),
                            'c_bpartner_id' =>  $request->get('c_bpartner_id'),
                            'c_location_id' => $request->get('c_location_id'),
                            'ad_user_id' => $request->get('ad_user_id'),
                            'usuario' => $request->get('usuario'),
                            'precio' => $request->get('precio'),
                            'tiempo_entrega' => $request->get('tiempo_entrega'),
                            'condicion_pago' => $request->get('condicion_pago'),
                            'guia_mecanica_salvaguarda_instalacion' => $request->get('condicion_guia_mecanica_salvaguarda_instalacion_v'),
                            'garantia' => $request->get('garantia'),
                            'capacitacion' => $request->get('capacitacion'),
                            'validez' => $request->get('validez'),
                            'anticipo' => $request->get('anticipo'),
                            'reporte' => $request->get('reporte'),
                            'calle_fiscal'=> $request->get('calle_fiscal'),
                            'colonia_fiscal'=> $request->get('colonia_fiscal'),
                            'codigo_postal_fiscal'=> $request->get('codigo_postal_fiscal'),
                            'ciudad_fiscal'=> $request->get('ciudad_fiscal'),
                            'estado_fiscal'=> $request->get('estado_fiscal'),
                            'pais_fiscal'=> $request->get('pais_fiscal'),
                            'org_name'=> $request->get('org_name'),
                            'auto'=> $auto,
                            'nota'=> $request->get('nota'),
                            'mensaje_atencion'=> $request->get('mensaje_atencion'),
                            'area'=> $request->get('area'),
                            'centro_costo'=> $request->get('centro_costo'),
                            'no_orden_servicio'=> $request->get('no_orden_servicio'),
                            'no_contrato'=> $request->get('no_contrato'),
                            'fecha_factura'=> '',
                            'iniciales_asignado'=> $request->get('iniciales_asignado'),
                            'no_pedido'=> $request->get('no_pedido'),
                            'id_condicion_factura'=> $request->get('id_condicion_factura'),
                            'id_condicion_pago_tiempo'=> $request->get('id_condicion_pago_tiempo'),
                            'id_metodo_envio'=> $request->get('id_metodo_envio'),
                            'metodo_pago'=> $request->get('metodo_pago'),
                            'cotizacion'=> $request->get('cotizacion'),
                            'venta'=> $request->get('venta'),
                            'compra'=> $request->get('compra'),
                            'venta_compra'=> $request->get('venta_compra'),
                            'org_id'=> $request->get('org_id')
            );
            $cotizacion=Cotizacion::create($cotizacion);                                        //OBTENER LA CLASE DEL DOCUMENTO
            $cotizacion->clase=$cotizacion->getClase(auth()->user()->puesto);                   //HelperUtil::log(['clase'=>$cotizacion->clase]);
            if(($cotizacion->cotizacion=='VENTA') ||($cotizacion->cotizacion=='COTIZACION') ){
              $cotizacion->update();                                                              //FIN OBTENER LA CLASE DEL DOCUMENTO
            }else{
              $cotizacion->venta='';
              $cotizacion->update();                                                              //FIN OBTENER LA CLASE DEL DOCUMENTO
            }

            $this->actualizarLineas($request,$cotizacion);

                if(!empty($request->reporte)){                                                  //AGREGAR numero de cotizacion al reporte
                    $reporte='';
                    $reporte=Clase::buscar(['clase'=>'R','folio'=>$request->reporte])->get();
                    if(is_object($reporte)){
                        $reporte[0]->update(['id_cotizacion' => $cotizacion->id]);
                    }
                }                                                                               //FIN AGREGAR NUMERO DE COTIZACION A REPORTE// CotizacionPaqueteInsumo::create($request->nuevo[$i]);
                                                                                               //Session::flash('message','! Registro guardado exitosamente ¡');        //return redirect('cotizaciones');
            if(auth()->user()->area=='SERVICIO TECNICO'){                                       //  dd('HAY REPORTE');                    //return redirect('cotizaciones');
                if(auth()->user()->puesto=='SECRETARIA' || auth()->user()->puesto=='GERENTE DE OPERACIONES'){                  //  dd('HAY REPORTE');                    //return redirect('cotizaciones');
                    return redirect('cotizaciones/servicio')->withSuccess('EL REGISTRO SE HA ACTUALIZADO CORRECTAMENTE ST');
                }else{
                    return redirect('cotizaciones')->withSuccess('EL REGISTRO SE HA ACTUALIZADO CORRECTAMENTE ST');
                }
            }
        } // FIN DE IF VERSION
    }

    public function observar(ObservacionStoreRequest $request){                                             //dd($request);
        $objeto= new Observacion();
        $objeto->observacion='<:'.$request->user()->iniciales.':>'.$request->observacion.'. . .';
        $objeto->nombre_tipo=$request->nombre_tipo;
        $objeto->id_producto=$request->id_producto;
        $objeto->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $objeto = Cotizacion::withTrashed()->find($id);
        if(str_word_count($objeto->id)>0){
            $objetos = CotizacionPaqueteInsumo::withTrashed()
            ->idCotizacion($objeto->id)
            ->get();
            /**INICIO VERIFICAR PRESTAMO**/
            $ordenes=$objeto->conOrden();//OBTIENE SI EXISTEN ORDENES DE COMPRA O DE VENTA
            $prestado=$this->verPrestado($id);//si recibe cero; prestamo estatus=prestado o no tiene prestamo relacionado
            if($prestado==0 && empty($ordenes)){
              //SOLO SE PUEDE ELIMINAR SI NO HAY PRESTAMO RELACIONADO
              $insumos=CotizacionPaqueteInsumo::idCotizacion($id)->get();
              //$objeto->update(['estatus'=>$request->calificacion]);
              //$this->actualizar=true;
            }else{
              //generar mensaje de que se debe revisar prestamo(s)
              return back()->withErrors(['VERIFICAR PRESTAMO(S)']);
            }
            /**FIN VERIFICAR PRESTAMO **/
            if ($objeto->trashed()) {//el elemento fue borrado y habra que habiltarlo

                $objetos->restore();
            }else{//BORRADO LOGICO DEL ELEMENTO.
                $objetos->delete();
            }
        }
        if ($objeto->trashed()) {//el elemento fue borrado y habra que habiltarlo
            $objeto->restore();
        }else{//BORRADO LOGICO DEL ELEMENTO.
            $objeto->delete();
        }//      return redirect('cotizaciones_paquetes_insumos.index');
        return redirect()->action('CotizacionPaqueteInsumoController@index');
    }

    /*public function cancelar(Request $request,$id){//Cambia el estatus de documento        //dd($request->all());
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'contratos',
            'ruta_siguiente'=>$request->ruta_siguiente,
            'ruta_califico'=>$califico,
            'calificacion'=>$request->estatus,
            'iniciales'=>$iniciales
            ]);        //dd($request->all());
        $objeto=Cotizacion::findOrFail($id);
        $objeto->update($request->all());
        return back();
    }*/

    public function servicio(Request $request){
        $arr_bsc= array('area'=>'SERVICIO TECNICO');
        $objetos=COTIZACION::buscar($arr_bsc+$request->all())
        ->orderBy('created_at','DESC')
        ->paginate(15);
        if(count($objetos)==0){
            unset($arr_bsc['nombre_empleado']);
            $objetos=COTIZACION::buscar($arr_bsc+$request->all())
            ->orderBy('created_at','DESC')
            ->paginate(15);
        }        //dd($objetos);
        return view('cotizaciones.cotizaciones',  compact('objetos','request'));
    }

    public function archivos($id){
        return view('cotizaciones.archivos');
    }

    private function estatus($request,$objeto,$id, $notificar){
        $destinatario='';
        switch ($request->calificacion) {
            case 'CANCELADO':
            /*
            *VERIFICAR Y VALIDAR LAS LINEAS DE LA COTIZACION Y SI EL CAMPO id_prestamo tiene contenido
            *Ver que el prestamo se encuentre con estatus prestado para cada linea
            *Que no tenga Documento de venta(s) Compra(s)
            *SI Prestamo.estatus=prestado, Eliminar las lineas relacion prestamo_cotizacion
            */
            $ordenes='';
            $restauraprestamo='';
            $cotizacion = Cotizacion::findOrFail($id);
            $ordenes=$cotizacion->conOrden();//OBTIENE SI EXISTEN ORDENES DE COMPRA O DE VENTA diferentes de cancelado
            $prestado=$this->verPrestado($id);//si recibe cero; prestamo estatus=prestado o no tiene prestamo relacionado
            //HelperUtil::log(['$prestado :'=>$prestado]);
            //HelperUtil::log(['$ordenes :'=>$ordenes]);
            if($prestado==0 && empty($ordenes)){
              //SOLO SE PUEDE CANCELAR SI NO HAY PRESTAMO RELACIONADO
              $insumos=CotizacionPaqueteInsumo::idCotizacion($id)->get();
              //dd($insumos);
              $objeto->update(['estatus'=>$request->calificacion]);
              $this->calificacion($request->calificacion,$id);
              $this->actualizar=true;
            }else{
              //generar mensaje de que se debe revisar prestamo(s)
              $this->actualizar=['VERIFICAR DOCUMENTOS RELACIONADOS VENTA(S), COMPRA(S), PRESTAMO(S) '];
            }
            return;
            break;
            case 'ENVIADO':
              //*VALIDACIONES
                $hay_viat=$objeto->viaticoPresente();
                $this->valido=Validator::make($objeto->toArray(),$this->reglas_concretar);
                if($this->valido->fails() || $hay_viat){//HelperUtil::log(['ERROR ENCONTRADO Y POR LO TANTO NO ACTUALIZAR']);
                  $this->actualizar=['VERIFICAR CAMPOS FISCALES/ENTREGA, PAGO Y/O VIATICO'];
                }else{
                  //$dir='CotizacionController@indexAutorizada';
                  $dir='cotizaciones.index?aprobacion=2';
                  //$dir='CotizacionController@indexAutorizada';
                    $this->actualizar=true;//activa bandera para verificar si se realizo la actualizacion correctamente
                    //*ACTUALIZACIONES DE DOCUMENTO
                    $objeto->update(['estatus'=>$request->calificacion]);
                    $this->calificacion($request->calificacion,$id);
                    /*ALERTAS segun usuarios configurado sin enviar correo*/
                    $notificar->avisa(['recurso'=>'cotizaciones.update',
                      'estado'=>'ENVIADO',
                      'acceso'=>'CotizacionController@index',
                      //'acceso'=>'CotizacionController@indexAutorizada',
                      'dato'=>'buscar=>1&numero_cotizacion='.$objeto->numero_cotizacion,
                      'descripcion'=>'ACCESO A COTIZACION CONCRETADO '.$objeto->clase.' '.$objeto->numero_cotizacion,
                      'id_foraneo'=>$objeto->id]);
                      //*AVISOS SEGUN ESTADOS:
                      $usuarios_notifica=$objeto->usuarioAviso($dir);//buscar los usuarios a los que habria q avisar por correo
                      $this->aviso_correo($request,$objeto,$dir,$usuarios_notifica);
                }
                return;
                break;
                default:
                //dd($request->all());
                //*ACTUALIZACIONES DE DOCUMENTO
                if(($request->calificacion=='RECEPCIONADO') || ($request->calificacion=='APROBADO') || ($request->calificacion=='DESAPROBADO') || ($request->calificacion=='ENTREGADO') || ($request->calificacion=='ENTREGADO TERCERO') ){
                    //BUSCAR EL AUTOR DE LA COTIZACION Y SU CORREO
                    if($objeto->clase=='CST'){
                      $acceso=$this->accesos['ACEPTADO'];
                    }else{
                      $destinatario=$this->usuario->getUsuario(['nombre'=>$objeto->nombre_empleado]);//buscar autor de cotizacion
                      $c=$request->calificacion;
                      $acceso=$this->accesos['APROBADO'];
                    }

                }elseif($objeto->clase=='CST' && $request->calificacion=='VERIFICADO'){
                  //dd('xxx');
                          $c=$request->calificacion;
                          $acceso=$this->accesos['ACEPTADO'];
                  }elseif ($objeto->clase=='CST' && $request->calificacion=='VALIDO') {
                        $c=$request->calificacion;
                        $acceso=$this->accesos['ACEPTADO'];
                  }else {
                    $c=$request->calificacion;
                    if(array_key_exists($c,$this->accesos) ){
                      $acceso=$this->accesos[$c];
                    }else {
                      $objeto->update(['estatus'=>$request->calificacion]);
                      $this->calificacion($request->calificacion,$id);
                      $this->actualizar=true;
                      return;
                      //return back();
                      //dd('VERIFICAR CLAVE, YA QUE NO EXISTE, CONSULTE A SISTEMAS, ESTATUS CAMBIADO');
                      // code...
                    }
                  }
                    $objeto->update(['estatus'=>$request->calificacion]);
                    $this->actualizar=true;//activa bandera para verificar si se realizo la actualizacion correctamente
                    $this->calificacion($request->calificacion,$id);
                    $dir=$acceso['ruta'];
                    $acc=$acceso['acceso'];
                    //dd($dir);
                    //HelperUtil::log(['DIR'=>$dir]);
                    //*ALERTAS
                    $notificar->avisa(['recurso'=>'cotizaciones.update',
                      'estado'=>$c,
                      'acceso'=>$acc,
                      'dato'=>'buscar=>1&numero_cotizacion='.$objeto->numero_cotizacion,
                      'descripcion'=>'ACCESO A COTIZACION '.$objeto->estatus.' '.$objeto->clase.' '.$objeto->numero_cotizacion,
                      'id_foraneo'=>$objeto->id]);
                      //*AVISOS por correo electronico
                      if(empty($destinatario)){
                        $usuarios_notifica=$objeto->usuarioAviso($dir);//buscar los usuarios a los que habria q avisar por correo buscado por la configuracion de estados y de permiso
                        //dd($usuarios_notifica);
                      }else{
                        $usuarios_notifica=$destinatario;
                      }
                    $this->aviso_correo($request,$objeto,$dir,$usuarios_notifica);
                return;
                break;
        }

    }
    private function calificacion($estatus,$id){
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'cotizacion',
            'ruta_siguiente'=>'',
            'ruta_califico'=>$califico,
            'calificacion'=>$estatus,
            'iniciales'=>$iniciales
            ]);
    }
    private function aviso_correo($request,$objeto,$ref,$destinos){
        //$d=explode('.', $ref);
        //HelperUtil::log(['$ref :'.count($ref)=>$ref]);
        $ddir=$this->esIndex($ref);

      $arr_url=explode('/',$request->url());
      $url= $arr_url[2].'/'.$ddir.'?buscar=1&numero_cotizacion='.$objeto->numero_cotizacion;
      $destinatarios=[];
      $correo=[
          'remitente'=>auth()->user()->email,
          'alias'=>auth()->user()->name,
          'asunto'=>'Notificación de sistema.',
          'contenido'=>array('msj'=>'ESTATUS DE COTIZACION '.$objeto->clase.' '. $objeto->estatus.':  <h4> '.$objeto->numero_cotizacion.'</h4>'.$this->desgloce_lineas($objeto).'<a href="'.$url.'">Clic aquí para verificar</a>')
      ];
      foreach ($destinos as $key => $destino) {
          $destinatarios[]=$destino->email;
      }
      $correo['destino']=$destinatarios;
      $this->correo->enviarCorreo($correo);
    }
    private function esIndex($dir){
        $index=false;
        $arr=explode('.', $dir);
        if (count($arr)>=2){
            $url0=$this->soloIndex($arr[1]);
            $url1=$arr[0];
            $index=$url1.'/'.$url0;
            //$index=$url1.$url0;
        }
        return $index;
    }
    private function soloIndex($str){
        $i='';
        $arr_i=explode('?', $str);
        if($arr_i[0] != 'index'){
            $i='/'.$arr_i[0];
        }elseif($str=='index'){
            //$i=$str;
        }else{
            $i='?'.$arr_i[1];
        }
        return $i;
    }


    private function desgloce_lineas($objeto){
      $lineas='<br><table>';
      foreach ($objeto->cotPaqIns()->get() as $linea) {
        $lineas=$lineas.'<tr><td>'.$linea->bandera_insumo.'</td>
        <td>'.$linea->codigo_proovedor.'</td>
        <td>'.$linea->tipo_equipo.'</td>
        <td>'.$linea->marca.'</td>
        </tr>';
      }
      return $lineas.'</table>';
    }
    /*private function restInsumPrest($insumo_cotizacion){

    }*/
    private function relPrestCot($id_linea_prestamo,$id_cotizacion){//ALTA DE LA RELACION DE INSUMO EN LA COTIZACION
      if(!empty($id_linea_prestamo) ){

        PrestamoCotizacion::create([
          'id_prestamo'=>$id_linea_prestamo,
          'id_cotizacion'=>$id_cotizacion
        ]);
      }
    }
    private function ElimRelPrestCot($id_cotizacion){//BAJA DE LA RELACION DE INSUMO EN LA COTIZACION
      PrestamoCotizacion::buscar(['id_cotizacion'=>$id_cotizacion])->delete();
    }
    private function verPrestado($id_cotizacion){/*verifica los prestamos relacionados y regresa los que no estan prestado*/
      /**Regresa Cero cuando los prestamos tienen estatus ==prestado**/
      $prestamos=0;
      $insumos=CotizacionPaqueteInsumo::idCotizacion($id_cotizacion)->get();
      foreach ($insumos as $insumo) {/*ver si insumo tiene id_prestamo */
        if(!empty($insumo->id_prestamo) ){
          //ver si el prestamo es prestado
          $prestamo='';
          $prestamo=Clase::findOrFail($insumo->id_prestamo);
          //HelperPrestamoServicio::getPrestamo($insumo->id_prestamo);
          //dd($prestamo);
          if($prestamo->estatus!='PRESTADO'){
            $prestamos++;
          }

        }//fin si tiene prestamo
      }//fin foreach insumos
      return $prestamos;
    }//fin function prestado
    private function getLnPres($folio_venta){//
      $ln=null;
          if(!empty($folio_venta)){
          //obtener el id de prestamo
          $prestamo=Clase::buscar(['folio'=>$folio_venta,'clase'=>'F'])->first();
          //obtener lineas relacionadas al prestamo
          $ln=HelperPrestamoServicio::getLineasPrestamos($prestamo->id);
        }
      return $ln;
    }
private function actualizarLineas($request,$cotizacion){
        $nuevo=array();
        $i=0;
        $a=count($request->objeto);                                                         //dd($a);
        $m=0;
        $kk=$request->objeto;                                                               //dd($kk);//dd($nuevo);
        $ok2=array_keys($kk);                                                               //dd($ok2[1]);
        for($l=0; $l<$a; $l++){
            $m=$ok2[$l];
            $nuevo[$l]=$kk[$m];
        }
        $this->ElimRelPrestCot($cotizacion->id);
        //HelperPrestamoServicio::delInsumosCot($cotizacion->id);
        while($i<$a){                                                                       //dd($request->objeto);
            $cotizacionPaqueteInsumo = [
                'id_cotizacion' => $cotizacion->id,
                'id_paquete'    => $nuevo[$i]['id_paquete'],
                'id_insumo'     => $nuevo[$i]['id_insumo'],
                'bandera_insumo' => $nuevo[$i]['bandera_insumo'],
                'codigo_proovedor' => $nuevo[$i]['codigo_proovedor'],
                'tipo_equipo' => $nuevo[$i]['tipo_equipo'],
                'tipo_cambio' => $nuevo[$i]['tipo_cambio'],
                'marca' => $nuevo[$i]['marca'],
                'modelo' => $nuevo[$i]['modelo'],
                'descripcion' => $nuevo[$i]['descripcion'],
                'caracteristicas' => $nuevo[$i]['caracteristicas'],
                'especificaciones' => $nuevo[$i]['especificaciones'],
                'costos' => $nuevo[$i]['costos'],
                'unidad_medida' => $nuevo[$i]['unidad_medida'],
                'unidad_compra' => $nuevo[$i]['unidad_compra'],
                'cantidad_unidad_compra' => $nuevo[$i]['cantidad_unidad_compra'],
                'costo_moneda' => $nuevo[$i]['costo_moneda'],
                'precio' => $nuevo[$i]['precio'],
                'cantidad' => $nuevo[$i]['cantidad'],
                'descuento' => $nuevo[$i]['descuento'],
                'id_insumo_prestamo' => $nuevo[$i]['id_insumo_prestamo'],
                'id_prestamo' => $nuevo[$i]['id_prestamo'],
                'm_product_category_id' => $nuevo[$i]['m_product_category_id']
            ];
            HelperUtil::log(['$cotizacionPaqueteInsumo'=>$cotizacionPaqueteInsumo]);
            if(($cotizacion->cotizacion=='VENTA') ||($cotizacion->cotizacion=='COTIZACION') ||  ($cotizacion->cotizacion=='VENTA Y COMPRA') ){
              $insumo_cotizacion=CotizacionPaqueteInsumo::create($cotizacionPaqueteInsumo);
              $this->relPrestCot($cotizacionPaqueteInsumo['id_prestamo'],$cotizacion->id);
              if( (array_key_exists('id', $nuevo[$i] ) ) &&  ($nuevo[$i]['id']>0)  ){
                //no me calcular en prestamo
              }else{
                HelperPrestamoServicio::restInsumPrest($insumo_cotizacion);
              }
            }else{
              //HelperUtil::log(['QUITAR LINEA DE ID_PRESTAMO'=>'QUITAR LINEA DE ID_PRESTAMO']);
              $cotizacionPaqueteInsumo[$i]['id_prestamo']='';
              $cotizacionPaqueteInsumo[$i]['id_insumo_prestamo']='';
              $insumo_cotizacion=CotizacionPaqueteInsumo::create($cotizacionPaqueteInsumo);
            }
            $i++;
          }
}//fin actualizar lineas
    /*
    public function proceso(Request $request,$id){
      $objeto = Cotizacion::find($id);
      $proc=$this->esProceso($objeto,$request);
      //dd($proc);
      $objeto->update($proc);
      return redirect('cotizaciones');
    }
    private function esProceso($objeto,$request){
      $arr=[];
      if(isset($request->cotizacion)){
        $arr['cotizacion']=true;
      }else{
        $arr['cotizacion']=false;
      }
      if(isset($request->venta)){
        $arr['venta']=true;
      }else{
        $arr['venta']=false;
      }
      if(isset($request->compra)){
        $arr['compra']=true;
      }else{
        $arr['compra']=false;
      }
      if(isset($request->venta_compra)){
        $arr['venta_compra']=true;
      }else{
        $arr['venta_compra']=false;
      }
      return $arr;
    }*/
}
