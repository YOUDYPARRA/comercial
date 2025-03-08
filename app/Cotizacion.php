<?php
namespace App;
use DB;
use App\Clase;
use App\Estado;
use App\Helpers\HelperUtil;
use App\Helpers\HelperUsuario;
use App\Services\ManagerCorreo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
                class Cotizacion extends Model{
                        use SoftDeletes;
                    protected $dates = ['deleted_at'];
                    protected $fillable=[
                        'subtotal',
                        'equipo',
                        'fecha',
                        'nombre_fiscal',
                        'numero_cotizacion',
                        'fecha',
                        'iva',
                        'total',
                        'aprobacion_ventas',
                        'fecha_aprobacion_ventas',
                        'aprobacion_marketing',
                        'fecha_aprobacion_marketing',
                        'version',
                        'nombre_empleado',
                        'estatus',
                        'contacto',
                        'correo',
                        'telefono',
                        'celular',
                        'tipo_moneda',
                        'tipo_cliente',
                        'aprobacion_cobranza',
                        'fecha_aprobacion_cobranza',
                        'c_bpartner_id',
                        'c_location_id',
                        'ad_user_id',
                        'rfc',
                        'nombre_cliente',
                        'calle_entrega',
                        'colonia_entrega',
                        'codigo_postal_entrega',
                        'ciudad_entrega',
                        'estado_entrega',
                        'pais_entrega',
                        'representante_legal',
                        'fecha_entrega',
                        'departamento',
                        'nota',
                        'usuario',
                        'precio',
                        'tiempo_entrega',
                        'condicion_pago',
                        'guia_mecanica_salvaguarda_instalacion',
                        'garantia',
                        'capacitacion',
                        'validez',
                        'anticipo',
                        'reporte',
                        'calle_fiscal',
                        'colonia_fiscal',
                        'codigo_postal_fiscal',
                        'ciudad_fiscal',
                        'estado_fiscal',
                        'org_name',
                        'auto',
                        'pais_fiscal',
                        'no_reporte',
                        'centro_costo',
                        'no_contrato',
                        'no_orden_servicio',
                        'mensaje_atencion',
                        'area',
                        'iniciales_vendedor_asignado',
                        'fecha_factura',
                        'iniciales_asignado',
                        'no_pedido',
                        'id_condicion_factura',
                        'id_condicion_pago_tiempo',
                        'id_metodo_envio',//id de direccion de envio
                        'metodo_pago',
                        'org_id',
                        'clase',
                        'cotizacion',
                        'venta',
                        'compra',
                        'venta_compra',
                        'sr',
                        'fecha_vigencia',
                        	];
    protected $table='cotizaciones';

    public function cotPaqIns(){
        return $this->hasMany('App\CotizacionPaqueteInsumo', 'id_cotizacion', 'id');
    }

    public function re_obs(){
        return $this->hasMany('App\Observacion','id_producto','id');
    }

    public function getLnPrestAttribute(){
      $prestamo=false;
      foreach ($this->cotPaqIns as $v) {
        if($v->id_prestamo!=''){
          $prestamo=true;
        }
      }
      return $prestamo;
    }
    public function getObservacionesAttribute(){
        $observacion='';
        foreach ($this->re_obs->where('nombre_tipo','cotizacion') as $obs) {
            $observacion=$obs->observacion.' '.$observacion;
        }
        return $observacion;
    }

    public function getObservacionesDetalleAttribute(){
        $observacion='';
        foreach ($this->rel_observaciones->where('nombre_tipo','cotizacion') as $obs) {
            $observacion=$obs->updated_at.' : '.$obs->observacion;
            $observacion=$observacion.'//'.$observacion;
        }
        return $observacion;
    }

    public function scopeAuto($query,$iva){
        if(trim($iva)!=""){
            $arr=explode("*", $iva);
            if(count($arr)>=2){
                $iva=  str_replace("*", "%", $iva);
                $query->where('auto','like',$iva);
            }  else {
                $query->where('auto',$iva);
            }
        }
    }

    public function scopeNombreFiscal($query,$nombre_fiscal){
        if(trim($nombre_fiscal)!=""){
            $arr=explode("*", $nombre_fiscal);
            if(count($arr)>=2){
                $nombre_fiscal=  str_replace("*", "%", $nombre_fiscal);
                $query->where('nombre_fiscal','like',$nombre_fiscal);
            }  else {
                $query->where('nombre_fiscal',$nombre_fiscal);
            }
        }
    }

    public function scopeNumeroCotizacion($query,$numero_cotizacion){
        if(trim($numero_cotizacion)!=""){
            $arr=explode("*", $numero_cotizacion);
            if(count($arr)>=2){
                $numero_cotizacion=  str_replace("*", "%", $numero_cotizacion);
                $query->where('numero_cotizacion','like',$numero_cotizacion);
            }  else {
                echo $numero_cotizacion;
                $query->where('numero_cotizacion',$numero_cotizacion);
            }
        }
    }

    public function scopeFecha($query,$fecha){
        if(trim($fecha)!=""){
            $arr=explode("*", $fecha);
            if(count($arr)>=2){
                $fecha=  str_replace("*", "%", $fecha);
                $query->where('fecha','like',$fecha);
            }else{
                $query->where('fecha',$fecha);
            }
        }
    }

    public function scopeSubtotal($query,$subtotal){
        if(trim($subtotal)!=""){
            $arr=explode("*", $subtotal);
            if(count($arr)>=2){
                $subtotal=  str_replace("*", "%", $subtotal);
                $query->where('subtotal','like',$subtotal);
            }  else {
                $query->where('subtotal',$subtotal);
            }
        }
    }

    public function scopeIva($query,$iva){
        if(trim($iva)!=""){
            $arr=explode("*", $iva);
            if(count($arr)>=2){
                $iva=  str_replace("*", "%", $iva);
                $query->where('iva','like',$iva);
            }  else {
                $query->where('iva',$iva);
            }
        }
    }

    public function scopeTotal($query,$total){
        if(trim($total)!=""){
            $arr=explode("*", $total);
            if(count($arr)>=2){
                $total=  str_replace("*", "%", $total);
                $query->where('total','like',$total);
            }  else {
                $query->where('total',$total);
            }
        }
    }

    public function scopeIndexAprobacionVentas($query){
        $query
        ->where('estatus','ENVIADO')
        ->where('fecha_aprobacion_ventas','!=','')
        ->where('fecha_aprobacion_marketing','')//        ->where('fecha_aprobacion_cobranza','')
        ->WhereNotIn('departamento',['OPERACIONES','OPERACIONES CODONICS','OPERACIONES RESONANCIA MAG','OPERACIONES (US/Thinprep)','OPERACIONES GDL','OPERACIONES MASTOGRAFIA/DENSITOMETRIA','OPERACIONES MTY','OPERACIONES MRD','OPERACIONES RAYOS X','OPERACIONES TOMOGRAFIA'])
        ->orWhere('estatus','DESAPROBADO');//        ->WhereNotIn('departamento',['VENTAS CONSUMIBLES','OPERACIONES','OPERACIONES CODONICS','OPERACIONES RESONANCIA MAG','OPERACIONES (US/Thinprep)','OPERACIONES GDL','OPERACIONES MASTOGRAFIA/DENSITOMETRIA','OPERACIONES MTY','OPERACIONES MRD','OPERACIONES RAYOS X','OPERACIONES TOMOGRAFIA']);
    }

    public function scopeIndexAprobacionMarketing($query){
        $query
        ->where('fecha_aprobacion_ventas','>','0')
        ->Where('estatus','APROBADO')
        ->where('fecha_aprobacion_marketing','=','0')
        ->where('fecha_aprobacion_cobranza','=','0')
        ->WhereNotIn('departamento',['VENTAS CONSUMIBLES','OPERACIONES','OPERACIONES CODONICS','OPERACIONES RESONANCIA MAG','OPERACIONES (US/Thinprep)','OPERACIONES GDL','OPERACIONES MASTOGRAFIA/DENSITOMETRIA','OPERACIONES MTY','OPERACIONES MRD','OPERACIONES RAYOS X','OPERACIONES TOMOGRAFIA']);
    }

    public function scopeIndexAprobacionCreditoCobranza($query){
        $query->WhereIn('estatus',['ENVIADO','ACEPTABLE']);
                //->where('fecha_aprobacion_ventas','!=','')
                /*                ->where('fecha_aprobacion_marketing','!=','')                ->where('fecha_aprobacion_cobranza','')                */
                /*                ->WhereNotIn('departamento',['OPERACIONES','OPERACIONES CODONICS','OPERACIONES RESONANCIA MAG','OPERACIONES (US/Thinprep)','OPERACIONES GDL','OPERACIONES MASTOGRAFIA/DENSITOMETRIA','OPERACIONES MTY','OPERACIONES MRD','OPERACIONES RAYOS X','OPERACIONES TOMOGRAFIA'])                */
                //->orWhere('estatus','APROBADO');
                //->orWhere('estatus','CONCRETADO');
                /*                ->WhereNotIn('departamento',['OPERACIONES','OPERACIONES CODONICS','OPERACIONES RESONANCIA MAG','OPERACIONES (US/Thinprep)','OPERACIONES GDL','OPERACIONES MASTOGRAFIA/DENSITOMETRIA','OPERACIONES MTY','OPERACIONES MRD','OPERACIONES RAYOS X','OPERACIONES TOMOGRAFIA'])                */
                /*                ->WhereNotIn('departamento',['OPERACIONES','OPERACIONES CODONICS','OPERACIONES RESONANCIA MAG','OPERACIONES (US/Thinprep)','OPERACIONES GDL','OPERACIONES MASTOGRAFIA/DENSITOMETRIA','OPERACIONES MTY','OPERACIONES MRD','OPERACIONES RAYOS X','OPERACIONES TOMOGRAFIA']);                */
                //->where('fecha_aprobacion_marketing','!=','')
                //->where('fecha_aprobacion_cobranza','');
    }

    public function scopeIndexAprobacionServicio($query){
        $query->where('aprobacion_servicio','!=','')
        ->WhereIn('departamento',['OPERACIONES','OPERACIONES CODONICS','OPERACIONES RESONANCIA MAG','OPERACIONES (US/Thinprep)','OPERACIONES GDL','OPERACIONES MASTOGRAFIA/DENSITOMETRIA','OPERACIONES MTY','OPERACIONES MRD','OPERACIONES RAYOS X','OPERACIONES TOMOGRAFIA']);
    }

    public function scopeIndexBuscar($query,$request){
        foreach ($request->all() as $key => $value) {
            $dato = array_search($key,$this->fillable);            //echo $dato;
            $campo=$this->fillable[$dato];            //echo $campo;
            $comodin=strpos($request->$campo,'*');
            if(trim($request->$campo!='')){//validar que campos han sido llenados o usados.
                if($comodin!==false){
                    $string=  str_replace("*", "%", $request->$campo);
                    $query->where($campo,'like',$string);
                }else{
                    $query->where($campo,$request->$campo);                //echo $campo;                //echo $request->$campo;
                }
            }
        }
    }

    public function scopeAprobacionVentas($query,$aprobacion_ventas){
        if(trim($aprobacion_ventas)!=""){
            $arr=explode("*", $aprobacion_ventas);
            if(count($arr)>=2){
                $aprobacion_ventas=  str_replace("*", "%", $aprobacion_ventas);
                $query->where('aprobacion_ventas','like',$aprobacion_ventas);
            }  else {
                $query->where('aprobacion_ventas','=','');
            }
        }
    }

    public function scopeFechaAprobacionVentas($query,$fecha_aprobacion_ventas){
        if(trim($fecha_aprobacion_ventas)!=""){
            $arr=explode("*", $fecha_aprobacion_ventas);
            if(count($arr)>=2){
                $fecha_aprobacion_ventas=  str_replace("*", "%", $fecha_aprobacion_ventas);
                $query->where('fecha_aprobacion_ventas','like',$fecha_aprobacion_ventas);
            }  else {
                $query->where('fecha_aprobacion_ventas',$fecha_aprobacion_ventas);
            }
        }
    }

    public function scopeAprobacionMarketing($query,$aprobacion_marketing){
        if(trim($aprobacion_marketing)!=""){
            $arr=explode("*", $aprobacion_marketing);
            if(count($arr)>=2){
                $aprobacion_marketing=  str_replace("*", "%", $aprobacion_marketing);
                $query->where('aprobacion_marketing','like',$aprobacion_marketing);
            }  else {
                $query->where('aprobacion_marketing',$aprobacion_marketing);
            }
        }
    }

    public function scopeFechaAprobacionMarketing($query,$fecha_aprobacion_marketing){
        if(trim($fecha_aprobacion_marketing)!=""){
            $arr=explode("*", $fecha_aprobacion_marketing);
            if(count($arr)>=2){
                $fecha_aprobacion_marketing=  str_replace("*", "%", $fecha_aprobacion_marketing);
                $query->where('fecha_aprobacion_marketing','like',$fecha_aprobacion_marketing);
            }  else {
                $query->where('fecha_aprobacion_marketing',$fecha_aprobacion_marketing);
            }
        }
    }

    public function scopeVersion($query,$version){
        if(trim($version)!=""){
            $arr=explode("*", $version);
            if(count($arr)>=2){
                $version=  str_replace("*", "%", $version);
                $query->where('version','like',$version);
            }  else {
                $query->where('version',$version);
            }
        }
    }

    public function scopeNombreEmpleado($query,$nombre_empleado){
        if(trim($nombre_empleado)!=""){
            $arr=explode("*", $nombre_empleado);
            if(count($arr)>=2){
                $nombre_empleado=  str_replace("*", "%", $nombre_empleado);
                $query->where('nombre_empleado','like',$nombre_empleado);
            }  else {
                $query->where('nombre_empleado',$nombre_empleado);
            }
        }
    }

    public function scopeEstatus($query,$estatus){
        if(trim($estatus)!=""){
            $arr=explode("*", $estatus);
            if(count($arr)>=2){
                $estatus=  str_replace("*", "%", $estatus);
                $query->where('estatus','like',$estatus);
            }  else {
                $query->where('estatus',$estatus);
            }
        }
    }

    public function scopeContacto($query,$contacto){
        if(trim($contacto)!=""){
            $arr=explode("*", $contacto);
            if(count($arr)>=2){
                $contacto=  str_replace("*", "%", $contacto);
                $query->where('contacto','like',$contacto);
            }  else {
                $query->where('contacto',$contacto);
            }
        }
    }

    public function scopeCorreo($query,$correo){
        if(trim($correo)!=""){
            $arr=explode("*", $correo);
            if(count($arr)>=2){
                $correo=  str_replace("*", "%", $correo);
                $query->where('correo','like',$correo);
            }  else {
                $query->where('correo',$correo);
            }
        }
    }

    public function scopeTelefono($query,$telefono){
        if(trim($telefono)!=""){
            $arr=explode("*", $telefono);
            if(count($arr)>=2){
                $telefono=  str_replace("*", "%", $telefono);
                $query->where('telefono','like',$telefono);
            }  else {
                $query->where('telefono',$telefono);
            }
        }
    }

    public function scopeCelular($query,$celular){
        if(trim($celular)!=""){
            $arr=explode("*", $celular);
            if(count($arr)>=2){
                $celular=  str_replace("*", "%", $celular);
                $query->where('celular','like',$celular);
            }  else {
                $query->where('celular',$celular);
            }
        }
    }

    public function scopeTipoMoneda($query,$tipo_moneda){
        if(trim($tipo_moneda)!=""){
            $arr=explode("*", $tipo_moneda);
            if(count($arr)>=2){
                $tipo_moneda=  str_replace("*", "%", $tipo_moneda);
                $query->where('tipo_moneda','like',$tipo_moneda);
            }  else {
                $query->where('tipo_moneda',$tipo_moneda);
            }
        }
    }

    public function scopeTipoCliente($query,$tipo_cliente){
        if(trim($tipo_cliente)!=""){
            $arr=explode("*", $tipo_cliente);
            if(count($arr)>=2){
                $tipo_cliente=  str_replace("*", "%", $tipo_cliente);
                $query->where('tipo_cliente','like',$tipo_cliente);
            }  else {
                $query->where('tipo_cliente',$tipo_cliente);
            }
        }
    }

    public function scopeAprobacionCobranza($query,$aprobacion_cobranza){
        if(trim($aprobacion_cobranza)!=""){
            $arr=explode("*", $aprobacion_cobranza);
            if(count($arr)>=2){
                $aprobacion_cobranza=  str_replace("*", "%", $aprobacion_cobranza);
                $query->where('aprobacion_cobranza','like',$aprobacion_cobranza);
            }  else {
                $query->where('aprobacion_cobranza',$aprobacion_cobranza);
            }
        }
    }

    public function scopeFechaAprobacionCobranza($query,$fecha_aprobacion_cobranza){
        if(trim($fecha_aprobacion_cobranza)!=""){
            $arr=explode("*", $fecha_aprobacion_cobranza);
            if(count($arr)>=2){
                $fecha_aprobacion_cobranza=  str_replace("*", "%", $fecha_aprobacion_cobranza);
                $query->where('fecha_aprobacion_cobranza','like',$fecha_aprobacion_cobranza);
            }  else {
                $query->where('fecha_aprobacion_cobranza',$fecha_aprobacion_cobranza);
            }
        }
    }

    public function scopeCBpartnerId($query,$c_bpartner_id){
        if(trim($c_bpartner_id)!=""){
            $arr=explode("*", $c_bpartner_id);
            if(count($arr)>=2){
                $c_bpartner_id=  str_replace("*", "%", $c_bpartner_id);
                $query->where('c_bpartner_id','like',$c_bpartner_id);
            }  else {
                $query->where('c_bpartner_id',$c_bpartner_id);
            }
        }
    }

    public function scopeCLocationId($query,$c_location_id){
        if(trim($c_location_id)!=""){
            $arr=explode("*", $c_location_id);
            if(count($arr)>=2){
                $c_location_id=  str_replace("*", "%", $c_location_id);
                $query->where('c_location_id','like',$c_location_id);
            }  else {
                $query->where('c_location_id',$c_location_id);
            }
        }
    }

    public function scopeAdUserId($query,$ad_user_id){
        if(trim($ad_user_id)!=""){
            $arr=explode("*", $ad_user_id);
            if(count($arr)>=2){
                $ad_user_id=  str_replace("*", "%", $ad_user_id);
                $query->where('ad_user_id','like',$ad_user_id);
            }  else {
                $query->where('ad_user_id',$ad_user_id);
            }
        }
    }

    public function scopeRfc($query,$rfc){
        if(trim($rfc)!=""){
            $arr=explode("*", $rfc);
            if(count($arr)>=2){
                $rfc=  str_replace("*", "%", $rfc);
                $query->where('rfc','like',$rfc);
            }  else {
                $query->where('rfc',$rfc);
            }
        }
    }

    public function scopeNombreCliente($query,$nombre_cliente){
        if(trim($nombre_cliente)!=""){
            $arr=explode("*", $nombre_cliente);
            if(count($arr)>=2){
                $nombre_cliente=  str_replace("*", "%", $nombre_cliente);
                $query->where('nombre_cliente','like',$nombre_cliente);
            }  else {
                $query->where('nombre_cliente',$nombre_cliente);
            }
        }
    }

    public function scopeCalleEntrega($query,$calle_entrega){
        if(trim($calle_entrega)!=""){
            $arr=explode("*", $calle_entrega);
            if(count($arr)>=2){
                $calle_entrega=  str_replace("*", "%", $calle_entrega);
                $query->where('calle_entrega','like',$calle_entrega);
            }  else {
                $query->where('calle_entrega',$calle_entrega);
            }
        }
    }

    public function scopeColoniaEntrega($query,$colonia_entrega){
        if(trim($colonia_entrega)!=""){
            $arr=explode("*", $colonia_entrega);
            if(count($arr)>=2){
                $colonia_entrega=  str_replace("*", "%", $colonia_entrega);
                $query->where('colonia_entrega','like',$colonia_entrega);
            }  else {
                $query->where('colonia_entrega',$colonia_entrega);
            }
        }
    }

    public function scopeCodigoPostalEntrega($query,$codigo_postal_entrega){
        if(trim($codigo_postal_entrega)!=""){
            $arr=explode("*", $codigo_postal_entrega);
            if(count($arr)>=2){
                $codigo_postal_entrega=  str_replace("*", "%", $codigo_postal_entrega);
                $query->where('codigo_postal_entrega','like',$codigo_postal_entrega);
            }  else {
                $query->where('codigo_postal_entrega',$codigo_postal_entrega);
            }
        }
    }

    public function scopeCiudadEntrega($query,$ciudad_entrega){
        if(trim($ciudad_entrega)!=""){
            $arr=explode("*", $ciudad_entrega);
            if(count($arr)>=2){
                $ciudad_entrega=  str_replace("*", "%", $ciudad_entrega);
                $query->where('ciudad_entrega','like',$ciudad_entrega);
            }  else {
                $query->where('ciudad_entrega',$ciudad_entrega);
            }
        }
    }

    public function scopeEstadoEntrega($query,$estado_entrega){
        if(trim($estado_entrega)!=""){
            $arr=explode("*", $estado_entrega);
            if(count($arr)>=2){
                $estado_entrega=  str_replace("*", "%", $estado_entrega);
                $query->where('estado_entrega','like',$estado_entrega);
            }  else {
                $query->where('estado_entrega',$estado_entrega);
            }
        }
    }

    public function scopePaisEntrega($query,$pais_entrega){
        if(trim($pais_entrega)!=""){
            $arr=explode("*", $pais_entrega);
            if(count($arr)>=2){
                $pais_entrega=  str_replace("*", "%", $pais_entrega);
                $query->where('pais_entrega','like',$pais_entrega);
            }  else {
                $query->where('pais_entrega',$pais_entrega);
            }
        }
    }

    public function scopeRepresentanteLegal($query,$representante_legal){
        if(trim($representante_legal)!=""){
            $arr=explode("*", $representante_legal);
            if(count($arr)>=2){
                $representante_legal=  str_replace("*", "%", $representante_legal);
                $query->where('representante_legal','like',$representante_legal);
            }  else {
                $query->where('representante_legal',$representante_legal);
            }
        }
    }

    public function scopeFechaEntrega($query,$fecha_entrega){
        if(trim($fecha_entrega)!=""){
            $arr=explode("*", $fecha_entrega);
            if(count($arr)>=2){
                $fecha_entrega=  str_replace("*", "%", $fecha_entrega);
                $query->where('fecha_entrega','like',$fecha_entrega);
            }  else {
                $query->where('fecha_entrega',$fecha_entrega);
            }
        }
    }

    public function scopeDepartamento($query,$departamento){
        if(trim($departamento)!=""){
            $arr=explode("*", $departamento);
            if(count($arr)>=2){
                $departamento=  str_replace("*", "%", $departamento);
                $query->where('departamento','like',$departamento);
            }  else {
                $query->where('departamento',$departamento);
            }
        }
    }

    public function ScopeBuscar($query,$buscar){

        if(!is_object($buscar)){
            $objeto=(object)$buscar;
        }
        //dd($buscar);
        $numero_querys='0';
        foreach ($objeto as $key => $value) {
            $dato='';
            $dato = array_search($key,$this->fillable);
            if(is_numeric($dato)){//VERIFICAR QUE EL CAMPO DE BUSQUEDA SE ENCUENTRE EN OBJETO FILLABLE
                $campo=$this->fillable[$dato];
                //echo $dato .'<br>';
                if(is_array($objeto->$campo)){
                    $comodin=false;
                }else{
                    $comodin=strpos($objeto->$campo,'*');
                }
                if(trim($objeto->$campo!='') ){//verificar q el campo de busqueda contenga caracteres
                    $numero_querys=$numero_querys+1;
                    if($comodin!==false){
                        $string=  str_replace("*", "%", $objeto->$campo);
                        $query->where($campo,'like',$string);
                    }else{
                        if(is_array($objeto->$campo) && (count($objeto->$campo)>2) ){
                            $query->whereIn($campo,$objeto->$campo);
                        }elseif(is_array($objeto->$campo) && (count($objeto->$campo)==2) ){
                            $query->whereBetween($campo,$objeto->$campo);

                        }else{
                            //echo 'No es arr-';
                            if(strpos($objeto->$campo, '!')!==false){
                              //  echo 'No es arr-'.substr($objeto->$campo,1);
                               $query->where($campo,'<>',substr($objeto->$campo,1));
                            }else{
                              if(HelperUtil::getFechaBusca($objeto->$campo)){//si es fechas
                                $objeto->$campo=HelperUtil::getFechaBusca($objeto->$campo);
                                //HelperUtil::log([$campo => $objeto->$campo]);
                                //$query->whereBetween($campo,[$objeto->$campo,$objeto->$campo]);
                                $query->whereDate($campo,'=',$objeto->$campo);
                              }else{
                                //HelperUtil::log([$campo=>$objeto->$campo]);
                                $query->where($campo,$objeto->$campo);
                              }
                            }

                        }
                    }
                }

            }

        }//fin foreach

        if($numero_querys==0){
            $query->where('id',0);
        }
        if(isset($objeto->asc)){
                $query->OrderBy($objeto->asc,'asc');
        }else if(isset($objeto->desc)){
                $query->OrderBy($objeto->desc,'desc');
        }

    }//fin public function buscar

    public function r_digitalizaciones(){
        return $this->hasMany('App\Digitalizacion','id_foraneo','id');
    }

    public function getDigitalizacionAttribute(){
        $a='';
        foreach (
            $this->r_digitalizaciones
            ->where('clase','c')
            ->where('subclase','compra')
            as $key => $value) {
            $a=$value;
        }
        return json_decode($a);
    }
    public function getOrdenesVentaCancelado(){
        return DB::table('compras_ventas')
                    ->where('id_cotizacion',$this->id)
                    ->where('org_name',$this->org_name)
                    ->where('estatus','CANCELADO')
                    ->where('tipo_archivo','v')
                    ->get();
    }

    public function getOrdenesVenta(){
        return DB::table('compras_ventas')
                    ->where('id_cotizacion',$this->id)
                    ->where('org_name',$this->org_name)
                    ->where('tipo_archivo','v')
                    ->get();
    }

    public function getCrearVentaAttribute(){
        $crear=1;
        $venta_cancelada=count($this->getOrdenesVentaCancelado());
        $venta=count($this->getOrdenesVenta());
        if($venta>$venta_cancelada){
            $crear=0;
        }
        return $crear;
    }

    public function getOrdenesAttribute(){
        $orden=null;
        $os=$this->conOrden();
        //HelperUtil::log([$this->numero_cotizacion.'$os:'.count($os)=>$os]);
        foreach ($os as $value) {
            if($value->tipo_archivo=='v'){
                $value->tipo_archivo='<a href="/ventas?buscar=1&folio='.$value->folio.'" type="button" title="'.$value->folio.'">VENTA:'.$value->estatus.'</a>';//$value->tipo_archivo='VENTA:'.$value->folio;
            }else{
                $value->tipo_archivo='<a href="/compras?buscar=1&folio='.$value->folio.'" type="button" title="'.$value->folio.'">COMPRA:'.$value->estatus.'</a>';
            }
            $orden= $orden.' '.$value->tipo_archivo.'<br>';
        }
        return $orden;
    }
    public function conOrden(){
      $rsl=[];
      $rsl=DB::table('compras_ventas')
                  ->where('id_cotizacion',$this->id)
                  ->where('org_name',$this->org_name)
                  ->where('estatus','<>','CANCELADO')
                  ->get();

      return $rsl;
    }
    public function programa(){//busca las programaciones q tenga el reporte y colocar cotizacion.id en  programacion.id_cotizacion//Buscar el programa en caso de q exista reporte
        $programas=null;
        if($this->reporte>0){
            DB::table('clases')
                ->where('clase','P')
                ->where('organizacion',$this->org_name)
                ->where('folio',$this->reporte)
                ->update(['id_cotizacion'=>$this->id]);
        }
        return $programas;
    }

    public function r_clase(){
        return $this->hasMany('App\Clase','id_cotizacion','id');
    }

    public function getClase($puesto,$arr_condiciones=''){
      //HelperUtil::log(['ENTRE A VER CLASE']);
        $clase='';
        switch ($puesto) {
            case 'ESPECIALISTA DE PRODUCTO':
                if(auth()->user()->departamento=='VENTAS CONSUMIBLES'){
                    $clase='CM';//cotizacion molecular
                }
                break;

            default:
            if($this->area=='SERVICIO TECNICO'){
              $clase= 'CST';//COTIZACION SERVICIO TECNICO
            }elseif ($this->area=='COMERCIAL') {
              $clase= 'C';
            }
                break;
        }

        return $clase;
    }
    /*public function aviso($arr,$tmp=null,$destinos=null){
            $aviso= new ManagerCorreo;
            $correo=[

              'remitente'=>auth()->user()->email,
              'alias'=>auth()->user()->name,
              'asunto'=>'Notificación de sistema.'
            ];
        if(empty($destinos)){
          foreach ($arr as  $v) {
            //HelperUtil::log(['FOREACH DE USUARIO CORREO'=>$v]);
            $correo['destino']=$v['destino'];
            $correo['contenido']=array('msj'=>$v['msj']);

          }
        }else{

          $correo['destino']=$destinos;
          $correo['contenido']=array('msj'=>$arr['msj']);
          //HelperUtil::log(['correo grupal $correo'=>$correo]);
        }

        if(is_null($tmp)){
             $aviso->enviarCorreo($correo);
        }else{
            $aviso->enviarCorreo($correo,'notificacion');//en produccion, cambiar blade a atencion
        }
    }*/

    public function viaticoPresente(){//1 NO HAY VIATICO; 0 SI HAY VIATICO
        $viatico_presente=false;
        foreach ($this->cotPaqIns as $ins) {
            if($ins->codigo_proovedor=='VIAT'){
                $viatico_presente=true;
            }
        }
        return $viatico_presente;
    }


    public function getProcesoAttribute(){
            //ESTE VERIFICA EL USUARIO Y EL DOCUMENTO, PARA COLOCAR EL FORMULARIO DE PROCESAR;
        //echo 'xxx';
            $condicionante='';
            $condicion='';
            $procesar=null;
            $estados=$this->getEstados();
            //HelperUtil::log(['$estados :'.$this->numero_cotizacion.'<>'.count($estados)=>$estados]);
            //print_r($estados);
            foreach ($estados as $value) {
                $condicionante=$value->condicionante;
                $condicion=$value->condicion;
                //HelperUtil::log(['$condicionante :'.count($condicionante)=>$condicionante]);
                //HelperUtil::log(['$condicion :'.count($condicion)=>$condicion]);
                //echo $value->id;
                //HelperUtil::log(['$auth->user()->$condicionante :'.count(auth()->user()->$condicionante)=>auth()->user()->$condicionante]);
                if(empty($condicion)){
                    //echo 'Entre por condicion vacia';
                    if(auth()->user()->$condicionante==$this->usuario){
                        $procesar=true;
                    }
                }else if(auth()->user()->$condicionante==$condicion){
                    //echo '1'. auth()->user()->$condicionante;
                    //HelperUtil::log(['SI ES IGUAL']);
                    $mas_condiciones=[];
                    $contar_condiciones_validas='';
                    $total_mas_condiciones='';
                    foreach ($value->avisos as $avisos_condiciones) {
                        # code...recupera bandera AVI
                        //echo $avisos_condiciones->id;
                        $mas_condiciones[]=array('condicionante'=>$avisos_condiciones->condicionante,'condicion'=>$avisos_condiciones->condicion);
                        foreach ($avisos_condiciones->avisos as $condiciones) {
                            //echo $condiciones->id;
                            # code...RECUPERA bandera CND
                            $mas_condiciones[]=array('condicionante'=>$condiciones->condicionante,'condicion'=>$condiciones->condicion);
                        }
                    }
                    if(count($mas_condiciones)>1){//VER SI HAY MAS CONDICIONES
                        $total_mas_condiciones=count($mas_condiciones);
                        $contar_mas_condiciones=0;
                        //print_r($mas_condiciones);
                        foreach ($mas_condiciones as $otra_condicion) {
                            $condicionante=$otra_condicion['condicionante'];
                            $condicion=$otra_condicion['condicion'];
                            if(auth()->user()->$condicionante==$condicion){
                                 $contar_condiciones_validas++;
                            }
                        }
                        if($total_mas_condiciones==$contar_condiciones_validas){
                            $procesar=true;
                        }
                    }else{
                            $procesar=true;
                    }
                }
            }
            //echo($procesar);
            return $procesar;
    }
    public function getProcesosAttribute(){
            //DEBE REGRESAR UN ARREGLO DE ESTATUS q FALTAN PARA EL DOCUMENTO ACTUAL
            //TOMA EL ESTADO ACTUAL PARA REGRESAR LOS SIGUIENTES ESTADOS
            $x=null;
            $estado_actual=null;
            $estado_actual=null;
            $par_estado_actual=null;
            $documento_condicionado=false;
            $estado_actual =$this->getEstados();//OBTIENE EL ESTATUS ACTUAL PARA COLOCAR EN EL FORM
            //print_r($estado_actual);
            //GENERAR ARREGLO CON ESTE ESTATUS OBTENIDO, ANTES DE METER EN EL ARREGLO, EVALUAR LA CONDICION DE DOCUMENTO
            foreach ($estado_actual as $eval) {//INICIO COMPROBAR CONDICIONANTE EN EL DOCUMENTO
                $documento_condicionante_eval=$eval->dcondicionante;

                if(!empty($documento_condicionante_eval)){
                    //echo $documento_condicionante_eval;
                    $documento_condicionado=true;
                }
            }//FIN COMPROBAR CONDICIONANTE EN EL DOCUMENTO
            foreach ($estado_actual as $value) {
                /*echo $value->dcondicion;
                echo $value->dcondicionante;*/
                if($documento_condicionado){//EL DOCUMENTO ESTÁ CONDICIONADO
                   $documento_condicion=$value->dcondicion;
                $documento_condicionante=$value->dcondicionante;
                //echo $this->dato;
                //echo $documento_condicionante;
                //$arr=$this->toArray();
                //print_r($arr);
                //echo $arr[$documento_condicionante];
                //dd($this->$documento_condicionante);
            //echo $value->id.'->'.$this[$documento_condicionante];

                    if($this->dato==$documento_condicion){
                        //echo 'SI es igual AL REQ DE DOCUMENTO';
                        $x[$value->aprobacion]=$value->etiqueta_aprobacion;
                        $x[$value->desaprobacion]=$value->etiqueta_desaprobacion;
                    }
                }else{
                        //echo 'NOOO es igual AL REQ DE DOCUMENTO';
                    $x[$value->aprobacion]=$value->etiqueta_aprobacion;
                    $x[$value->desaprobacion]=$value->etiqueta_desaprobacion;
                }
            }

            return $x;
        }
    private function getEstados(){

      //HelperUtil::log(['estado '=>$this->estatus,'clase'=>$this->clase,'organizacion'=>$this->org_name]);
      $estados=[];
        $estados= Estado::where('estado',$this->estatus)
            ->where('subclase','')
            ->where('clase',$this->clase)
            ->where('organizacion',$this->org_name)
            ->get();
            //HelperUtil::log(['ESTADO '=>$this->numero_cotizacion.'>'.$estados]);
      return $estados;
    }
    public function usuarioAviso($ruta_acceso){//devuelve los avisos configurados en Estado asi tambien si tiene el permiso
      $arr_usuarios_permiso=[];
      $estados=$this->getEstados();
      foreach ($estados as $estado) {
        //HelperUtil::log(['$estado'=>$estado]);
        foreach ($estado->avisos as $aviso) {
          //$arr_usuarios_permiso[]=$this->usuarioPermiso($aviso->condicionante,$aviso->condicion,$ruta_acceso);//se reciben los usuarios con el permiso
          //HelperUtil::log(['$aviso'=>$aviso]);
          //HelperUtil::log(['ruta de acceso'=>$ruta_acceso]);
            $us_per=$this->usuarioPermiso($aviso->condicionante,$aviso->condicion,$ruta_acceso);
            foreach ($us_per as $value) {
            //  HelperUtil::log(['$usuario permitido'=>$value]);
                $arr_usuarios_permiso[]=$value;
            }
        }
      }

      return $arr_usuarios_permiso;
    }
    private function usuarioPermiso($usuario_condicionante,$usuario_condicion,$permiso){
      return HelperUsuario::getUsuarioConPermiso(['condicion'=>$usuario_condicion,'condicionante'=>$usuario_condicionante,'permiso'=>$permiso]);
    }

}
