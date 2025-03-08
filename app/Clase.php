<?php
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Estado;
use App\Cotizacion;
use Carbon\Carbon;
use App\User;
use App\Helpers\HelperUtil;
use App\TiempoServicio;
use DB;
use App\Services\ManagerCorreo;

class Clase extends Model
{
    //
    use SoftDeletes;
    public $limite =3;//limite de prestamos
    protected $dates = ['deleted_at'];
    protected $fillable=[
            'nota_cliente',
            'id_prestamo_refaccion',
            'id_foraneo',
            'id_cotizacion',
            'id_cliente',
            'id_fiscal',
            'folio_contrato',
            'folio_contrato_venta',
            'folio',
            'equipo',
            'marca',
            'modelo',
            'numero_serie',
            'imagen_serie',
            'nombre_responsable',
            'nombre_dpto_manto',
            'organizacion',
            'modificable',
            'estatus',
            'aprobado',
            'fecha_captura',
            'fecha_asignacion',
            'fecha_recepcion',
            'trabajo_realizado',
            'fecha_inicio',
            'fecha_fin',
            'complejidad_servicio',
            'sucursal',
            'tipo_servicio',
            'condicion_servicio',
            'autor',
            'fecha_atencion',
            'hora_atencion',
            'resuelto_por',
            'coordinacion',
            'enviar_aviso',
            'clase',
            'instituto',
            'vigencia',
            'nota',
            'solicitar_reporte_tecnico',
            'dato',
            'nombre_cliente',
            'calle',
            'colonia',
            'c_p',
            'ciudad',
            'estado',
            'pais',
            'numero',
            'numero_exterior',
            'nombre_fiscal',
            'calle_fiscal',
            'colonia_fiscal',
            'c_p_fiscal',
            'ciudad_fiscal',
            'estado_fiscal',
            'pais_fiscal',
            'numero_fiscal',
            'rfc',
            'c_bpartner_id',
            'c_bpartner_location',
            'telefonos',
            'celular',
            'correos',
            'fax',
            'id_cliente',
            'created_at',
            'id_fiscal'
    ];


     public function ScopeBuscar($query,$buscar){

        if(!is_object($buscar)){
            $objeto=(object)$buscar;
        }
        //HelperUtil::log($objeto);
        //dd($buscar);
        $numero_querys='0';
        foreach ($objeto as $key => $value) {
            $dato='';
            $mas=false;
            $esfecha=false;
            $dato = array_search($key,$this->fillable);
            if(is_numeric($dato)){//VERIFICAR QUE EL CAMPO DE BUSQUEDA SE ENCUENTRE EN OBJETO FILLABLE
                $campo=$this->fillable[$dato];
                //echo $dato .'<br>',
                //VERIFICA SI HAY ASTERISCO
                if(is_array($objeto->$campo)){
                    $comodin=false;
                }else{
                    $comodin=strpos($objeto->$campo,'*');
                }
                //FIN VERIFICA SI HAY ASTERISCO
                //VERIFICA SI HAY  SIGNO MAS
                if(HelperUtil::hayMas($objeto->$campo) ){
                  $mas=true;
                  $objeto->$campo=HelperUtil::buscarMas($objeto->$campo);
                }elseif (HelperUtil::getFechaBusca($objeto->$campo)) {//Es busqueda por fecha
                  $esfecha=true;
                  //HelperUtil::log(['Ver si fecha'=>$objeto->$campo]);
                  //HelperUtil::log(HelperUtil::getFechaBusca($objeto->$campo));
                    if(HelperUtil::getFechaBusca($objeto->$campo)==1){//Es una fecha
                      /*$ftm=Carbon::createFromFormat('d-m-Y', $objeto->$campo)->format('Y-m-d');
                      $diasig='2018-07-12';
                      $objeto->$campo=array($ftm,$diasig);*/
                      $objeto->$campo=array();
                    }elseif(HelperUtil::getFechaBusca($objeto->$campo)==6){/*Son dos fechas*/
                        $objeto->$campo=HelperUtil::dosFechas($objeto->$campo);
                    }
                }
                //FIN VERIFICA SI HAY MAS
                if(trim($objeto->$campo!='') ){//verificar q el campo de busqueda contenga caracteres
                    $numero_querys=$numero_querys+1;
                    if($comodin!==false){
                        $string=  str_replace("*", "%", $objeto->$campo);
                        $query->where($campo,'like',$string);
                    }else{//no viene con comodin
                        if(is_array($objeto->$campo) && (count($objeto->$campo)==2) && ($mas) ){//SOLO CUANDO SE BUSCAN VARIOS DE UN SOLO CAMPO
                            $query->whereBetween($campo,$objeto->$campo);
                        }elseif(is_array($objeto->$campo) && (count($objeto->$campo)>2) && ($mas) ){//SOLAMENTE Y SOLO CUANDO SEA FECHA
                          $query->whereIn($campo,$objeto->$campo);
                        }elseif($esfecha ){//SOLAMENTE Y SOLO CUANDO SEA FECHA
                          //HelperUtil::log(['formateo buscar por fecha'=>$objeto->$campo]);
                            $query->whereBetween($campo,$objeto->$campo);
                        }else{
                          //echo 'No es arr-';
                            if(strpos($objeto->$campo, '!')!==false){
                              //  echo 'No es arr-'.substr($objeto->$campo,1);
                               $query->where($campo,'<>',substr($objeto->$campo,1));
                            }else{
                               $query->where($campo,$objeto->$campo);
                            }
                        }//FIN ES ARREGLO O CONJUNTO DE DATOS O FECHA
                    }//FIN IF COMODIN
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

    /**
    *devuelve el siguiente folio recibe la clase que hace referencia para foliar
    **/
    public function setFoliarAttribute($c){
        $folio_ultimo='';
        $folio_siguiente='';
        $folio_ultimo=$this::select('id','folio')->withTrashed()->Where('clase',$c)->Where('organizacion',$this->organizacion)->orderBy('folio','desc')->limit(1)->get();
        if(empty($folio_ultimo[0])){
            $folio_siguiente=1;
        }else{
            $folio_siguiente=$folio_ultimo[0]->folio+1;
        }
        //dd($folio_siguiente);
        $this->attributes['folio']= $folio_siguiente;
    }

    public function getObservacionAttribute(){
        $observacion='';
        //echo '=-->'.$this->clase;
        switch ($this->clase) {
            case 'R':
                # code...
                foreach ($this->rel_observaciones->where('nombre_tipo','reporte') as $obs) {
                    # code...
                    $observacion=$obs->observacion.' '.$observacion;
                    //$obs=$obs.' '.$obs;
                }
                return $observacion;
                break;
            case 'F':
            foreach ($this->rel_observaciones->where('nombre_tipo','F') as $obs) {
                    # code...
                    $observacion=$obs->observacion.' '.$observacion;
                    //$obs=$obs.' '.$obs;
                }
                return $observacion;
                break;

            default:
                # code...
                foreach ($this->rel_observaciones->where('nombre_tipo',$this->clase) as $obs) {
                    $observacion=$obs->observacion.' '.$observacion;
                }
                return $observacion;
                break;
        }
    }
    public function rel_observaciones(){
        return $this->hasMany('App\Observacion','id_producto','id');
    }
    public function getObservacionDetalleAttribute(){
        $observacion='';
        switch ($this->clase) {
            case 'R':
                # code...
                foreach ($this->rel_observaciones->where('nombre_tipo','reporte') as $obs) {
                    # code...
                    $observacion=$obs->updated_at.' : '.$obs->observacion;
                    $observacion=$observacion.'//'.$observacion;
                }
                return $observacion;
                break;
            case 'F':
                # code...
                foreach ($this->rel_observaciones->where('nombre_tipo','F') as $obs) {
                    # code...
                    $observacion=$obs->updated_at.' : '.$obs->observacion;
                    $observacion=$observacion.'//'.$observacion;
                }
                return $observacion;
                break;

            default:
                # code...
                break;
        }
    }

    public function rep_cus(){//relacion reporte->custodia
        return $this->hasOne('App\Clase','id','id');
    }
    public function custodia(){//relacion claseCustodia->custodia
        return $this->hasOne('App\Custodia','id_clase','id');
    }
    public function personas_servicio(){//relacion Uno a varios...
        return $this->hasMany('App\PersonaServicio','id_clase','id');
    }
    public function rel_servicio(){//relacion Uno a uno
        return $this->hasOne('App\Servicio','id_foraneo','id');
    }

    public function rel_cotizacion(){//relacion Uno a uno
        return $this->hasOne('App\Cotizacion','id','id_cotizacion');
    }
    /*
    public function prestamo(){//relacion Uno a uno
        return $this->hasOne('App\Prestamo','id_foraneo','id');
    }
    */
    public function rel_horario(){//relacion Uno a varios
        return $this->hasMany('App\TiempoServicio','id_foraneo','id');
    }
    public function rel_reporte(){//objeto obtiene reporte Uno a uno
        return $this->hasOne('App\Clase','id','id_foraneo');
    }

    public function prestamo(){//relacion
        return $this->hasOne('App\Prestamo','id_foraneo','id');
    }
    public function rel_prestamo(){//relacion
        return $this->hasOne('App\Clase','id_foraneo','id');
    }
    public function programas(){//Varios programas
        return $this->hasMany('App\Clase','id_foraneo','id');
    }
    public function insumos_compras_ventas(){
        return $this->hasMany('App\InsumoCompraVenta','id_compra_venta','id');
    }

    public function r_conts_eqps(){//Varios equipos en contrato
        return $this->hasMany('App\Clase','id_foraneo','id');
    }

    public function equipos_contrato(){//INVERSA DE EQUIPOS HACIA CONTRATO
        return $this->hasMany('App\Clase','id','id_foraneo');
    }
    public function contrato(){//un contrato
        return $this->hasOne('App\Contrato','id_foraneo','id');
    }
    public function r_cotizacion(){//una cotizacion
        return $this->hasOne('App\Cotizacion','id','id_cotizacion');
    }
    public function r_cotizaciones(){//VARIAS COTIZACIONES
        return $this->hasMany('App\Cotizacion','reporte','folio');
    }
    public function documentos(){//INVERSA DE EQUIPOS HACIA CONTRATO
        return $this->hasMany('App\Documento','id_foraneo','id');
    }


    public function getRePrestamoAttribute(){
        if(is_object($this->rel_prestamo)){
            $x=$this->rel_prestamo->where('clase','F')
            ->where('id_foraneo',$this->id)
            ->get();
            return $x;
        }
        //dd($x);
    }

    public function getFechaInicioAttribute($date)
    {
        if($date){
            $y=explode(' ', $date);
            $x=explode('-', $y[0]);
            return $x['2'].'-'.$x['1'].'-'.$x['0'];
            //return Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $date)->format('Y-m-d');
        }
    }
    public function getFechaCapturaAttribute($date)
    {
        if($date){
            $y=explode(' ', $date);
            $x=explode('-', $y[0]);
            return $x['2'].'-'.$x['1'].'-'.$x['0'];
        }
    }
    public function getFechaFinAttribute($date)
    {
        if($date){

            $y=explode(' ', $date);
            $x=explode('-', $y[0]);
            return $x['2'].'-'.$x['1'].'-'.$x['0'];
            //return Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $date)->format('Y-m-d');
        }
    }
    public function aviso($arr,$tmp=null){
            $aviso= new ManagerCorreo;
            $correo=[
                'remitente'=>auth()->user()->email,
                'alias'=>auth()->user()->name,
                'asunto'=>'Notificación de sistema.'
                ];
            $destino_arr=$arr[0]['destino'];
        if(is_array($destino_arr)){
          $i=count($arr)-1;
          $destino_arr=$arr[$i]['destino'];
          $correo['destino']=$destino_arr;
          $correo['contenido']=array('msj'=>$arr[0]['msj']);
          if(is_null($tmp)){
            $aviso->enviarCorreo($correo);
          }else{
            $aviso->enviarCorreo($correo,'atencion');
          }//fin if else
        }else{
        foreach ($arr as  $v) {
            $correo['destino']=$v['destino'];
            $correo['contenido']=array('msj'=>$v['msj']);
            if(is_null($tmp)){
              $aviso->enviarCorreo($correo);
            }else{
              $aviso->enviarCorreo($correo,'atencion');
            }//fin if else
        }//fin foreach
      }//fin ifelse
    }
public function digitalizaciones(){
        return $this->hasMany('App\Digitalizacion','id_foraneo','id');
    }

    public function estados(){
        return $this->hasMany('App\Estado','clase','clase');
    }
 public function programa($reporte){//Coloca en la programacion programacion.id en clase.id_prestamo_refaccion
        //Buscar el programa en caso de q exista reporte
            return DB::table('clases')
                ->where('clase','P')
                ->where('organizacion',$this->organizacion)
                ->where('folio',$reporte->folio)
                ->update(['id_prestamo_refaccion'=>$this->id]);


    }
public function getProcesoAttribute(){
        //ESTE VERIFICA EL USUARIO Y EL DOCUMENTO, PARA COLOCAR EL FORMULARIO DE PROCESAR;
    //echo 'xxx';
        $condicionante='';
        $condicion='';
        $procesar=null;
        $estados=$this->getEstados();
        //print_r($estados);
        foreach ($estados as $value) {
            $condicionante=$value->condicionante;
            $condicion=$value->condicion;
            //echo $value->id;
            if(empty($condicion)){
                //echo 'Entre por condicion vacia';
                if(auth()->user()->$condicionante==$this->autor){
                    $procesar=true;
                }
            }else if(auth()->user()->$condicionante==$condicion){
                //echo '1'. auth()->user()->$condicionante;
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
                    print_r($mas_condiciones);
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
/*
            echo $value->dcondicion;
            echo $value->id;
            echo $value->dcondicionante;
            echo $documento_condicionado;
*/
            if($documento_condicionado){//EL DOCUMENTO ESTÁ CONDICIONADO
               $documento_condicion=$value->dcondicion;
            $documento_condicionante=$value->dcondicionante;
            //echo $value->dcondicion;
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
public function getEstados(){
    /*
    echo $this->subclase;
    echo $this->clase;
    echo $this->estatus;
    echo $this->organizacion;
    echo auth()->user()->puesto;
    */
    return /*DB::table('estados')
        ->where('estado',$this->estatus)
        ->where('clase',$this->clase)
        ->where('organizacion',$this->organizacion)
        ->get();*/
        Estado::where('estado',$this->estatus)
        ->where('subclase',$this->subclase)
        ->where('clase',$this->clase)
        ->where('organizacion',$this->organizacion)
        ->get();
}

   public function getLimitePrestamo(){//VERIFICAR LOS PRESTAMOS, Q NO TENGAN MAS DE 15 DIAS Y NO TENGA 3
    $dias=Carbon::today()->subDays(17);
    //HelperUtil::log(['GET LIMITE'=>$dias]);
        return DB::table('clases')
            ->where('clase','F')
            //->where('organizacion',$this->organizacion)
            ->where('autor',auth()->user()->iniciales)
            ->whereIn('dato',['EQUIPO','stock'])
            ->whereDate('created_at','<=',$dias)
            ->whereIn('estatus',['REMISION','PRESTADO'])
            ->get();
}
public function getServiciosReporte(){
//REGISTRO DE HORAS D ING DE SERV SIN O.S.
  return DB::table('servicios_reportes')
        ->where('id_reporte',$this->id_foraneo)
        ->where('clase','SR')
        ->where('organizacion',$this->organizacion)
        ->get();
}

public function cotPaqIns(){//LINEAS DE PRESTAMO Q TIENEN COTIZACION
    return $this->hasMany('App\CotizacionPaqueteInsumo', 'id_prestamo', 'id');
}
public function getCotizacionFolioAttribute(){
  $ref='';
  //echo 'ctpqin';
  $r=[];
  $cot=[];
  $arr=[];
  $r=$this->cotPaqIns()->get();
  //HelperUtil::log(['$r'=>$r]);
  foreach ($r as $key=>$ins_pre) {
    if(!in_array($ins_pre->id_cotizacion,$arr) ){
      //HelperUtil::log(['$ins_pre->id_cotizacion'=>$ins_pre->id_cotizacion]);
      $arr[]=$ins_pre->id_cotizacion;
    }
    //HelperUtil::log(['$arr'=>$arr]);
  }
    foreach ($arr as $id_cot) {
      //HelperUtil::log(['$id_cot'=>$id_cot]);
      $cot=Cotizacion::withTrashed()->findOrFail($id_cot);
      //HelperUtil::log(['$cot'=>$cot]);
      if(auth()->user()->can('acceso', 'cotizaciones.servicio') ){
        $ref=$ref.'<a href="/cotizaciones/servicio?buscar=1&numero_cotizacion='.$cot->numero_cotizacion.'" type="button" title="'.$cot->estatus.'">'.$cot->numero_cotizacion.'</a><br>';
      }elseif(auth()->user()->can('acceso', 'cotizaciones.index')){
        $ref=$ref.'<a href="/cotizaciones?&buscar=1&numero_cotizacion='.$cot->numero_cotizacion.'" type="button" title="'.$cot->estatus.'">'.$cot->numero_cotizacion.'</a><br>';
      }
    }
  return $ref;
}

}
