<?php

namespace App;
use Carbon\Carbon;
use App\Mensualidad;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\HelperUtil;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProyectoVenta extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'clases';
    protected $fillable=[
    	   'nota_cliente',//cantidad
            //'id_prestamo_refaccion',
            //'id_foraneo',
            //'id_cotizacion',
            //'id_cliente',
            //'id_fiscal',
            //'folio_contrato',
            //'folio_contrato_venta',
            //'folio',
            'equipo',//modalidad
            //'marca',
            'modelo',//equipo
            //'numero_serie',
            //'imagen_serie',
            //'nombre_responsable',
            //'nombre_dpto_manto',
            'organizacion',//compañia ims,smh,etc
            'modificable',//enganche
            'estatus',//estatus
            'aprobado',//estatus_credito
            //'fecha_captura',
            //'fecha_asignacion',
            //'fecha_recepcion',
            'trabajo_realizado',
            'fecha_inicio',//fecha proyecto
            'fecha_fin',//fecha entrega
            'sucursal',//mx,bj,mty
            'condicion_servicio',//termino_pago
            'complejidad_servicio', //probabilidad
            'autor',//iniciales representante
            //'tipo_servicio',
            'fecha_atencion',//mes_venta
            //'hora_atencion',
            //'resuelto_por',
            'coordinacion',
            'enviar_aviso',//pagos_mensuales
            'clase',//PRO
            'instituto',// publico, privado
            'vigencia',//contraentrega
            'dato',// mes_orden,compromiso->si/no, canal->directo,indirecto,gando/perdido
            'nombre_cliente',//cliente
            'calle',
            'colonia',
            'c_p',
            'ciudad',//poblacion
            'estado',//estado
            'pais',
            'numero',
            'numero_exterior',//precio_venta,
            'rfc',
            'telefonos',
            'celular',
            'correos',
            'fax',
            'nota',//razon
    ];


     /*public function ScopeBuscar($query,$buscar){

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
                        if(is_array($objeto->$campo)){
                            $query->whereIn($campo,$objeto->$campo);
                        }else{
                            //echo 'No es arr-';
                            if(strpos($objeto->$campo, '!')!==false){
                              //echo 'No es arr-'.substr($objeto->$campo,1);
                               $query->where($campo,'<>',substr($objeto->$campo,1));
                            }else{
                               $query->where($campo,$objeto->$campo);
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

    }*///fin public function buscar
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
                        $objeto->$campo=HelperUtil::dosFechasArr($objeto->$campo);
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
                        }elseif(is_array($objeto->$campo) && (count($objeto->$campo)>2) && ($mas) ){
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
    public function fila($objeto){
        $o='';
        $mensualidades= new Mensualidad;
        $o['ID']=$objeto->id;
        $o['Fecha']=$objeto->fecha_inicio;
        $datojson=json_decode($objeto->dato,true);

        $o['dato']=$datojson['dato'];
        $o['canal']=$datojson['canal'];
        $o['mes_orden']=$datojson['mes_orden'];
        $o['mes_venta']=$datojson['mes_venta'];
        $o['compromiso']=$datojson['compromiso'];

        $o['Publico/Privado']=$objeto->instituto;
        $o['Agente']=$objeto->autor;
        $o['Suc']=$objeto->sucursal;
        $o['Modalidad']=$objeto->equipo;
        $o['Equipo']=$objeto->modelo;
        $o['Cliente']=$objeto->nombre_cliente;
        $o['Estado']=$objeto->r_estado->nombre;
        $o['Poblacion']=$objeto->r_estado->nombre;
        $o['Estatus']=$objeto->estatus;
        $o['Cantidad']=$objeto->nota_cliente;
        $o['precio_venta_Dolares']=$objeto->numero_exterior;
        $o['Probabilidad']=$objeto->complejidad_servicio;
        $o['Terminos_pago']=$objeto->condicion_servicio;
        $o['Estatus_credito']=$objeto->aprobado;
        $o['Razon']=$objeto->nota;
        $o['Compañia']=$objeto->organizacion;
        $o['Orden/Contrato']=$objeto->folio_contrato_venta;
        $o['Enganche']=$objeto->modificable;
        $o['Contraentrega']=$objeto->vigencia;
        $o['Pagos_mensuales']=$objeto->enviar_aviso;

        $o['fecha_entrega']=$objeto->fecha_fin;
        $o['Observaciones']=$objeto->observacion;
        foreach ($mensualidades->pagosExcel($objeto->id) as $key => $value) {
            # code...
            $o[$key]=$value;
        }
        //$o=$mensualidades->pagosExcel($objeto->id);

        //$o['modalidad']=$objeto->coordinacion;
        /*
        $o['calle']=$objeto->calle;
        $o['colonia']=$objeto->colonia;
        $o['c_p']=$objeto->c_p;
        $o['pais']=$objeto->pais;
        $o['rfc']=$objeto->rfc;
        $o['telefonos']=$objeto->telefonos;
        $o['celular']=$objeto->celular;
        $o['correos']=$objeto->correos;
        $o['fax']=$objeto->fax;*/
        return $o;
    }
    public function setFoliarAttribute($c){
        $folio_ultimo='';
        $folio_siguiente='';
        $folio_ultimo=$this::select('id','folio')->withTrashed()->Where('clase',$c)->orderBy('folio','desc')->limit(1)->get();
        if(empty($folio_ultimo[0])){
            $folio_siguiente=1;
        }else{
            $folio_siguiente=$folio_ultimo[0]->folio+1;
        }
        //dd($folio_siguiente);
        $this->attributes['folio']= $folio_siguiente;
    }
    public function setFechaInicioAttribute($f){
        $this->attributes['fecha_inicio']=Carbon::parse($f)->format('Y-m-d');
    }
    public function setFechaFinAttribute($f){
        $this->attributes['fecha_fin']=Carbon::parse($f)->format('Y-m-d');
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
    public function getFechaFinAttribute($date)
    {
        if($date){
            $y=explode(' ', $date);
            $x=explode('-', $y[0]);
            return $x['2'].'-'.$x['1'].'-'.$x['0'];
            //return Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $date)->format('Y-m-d');
        }
    }

    public function getObservacionAttribute(){
        $observacion='';
        foreach ($this->rel_observaciones->where('nombre_tipo',$this->clase) as $obs) {
            $observacion=$obs->observacion.' '.$observacion;
        }
        return $observacion;

    }
    public function rel_observaciones(){
        return $this->hasMany('App\Observacion','id_producto','id');
    }
    public function rel_calificacion(){
        return $this->hasMany('App\Calificacion','id_producto','id');
    }
    public function getObservacionDetalleAttribute(){
        $observacion='';
        foreach ($this->rel_observaciones->where('nombre_tipo',$this->clase) as $obs) {
            # code...
            $t_observacion=$obs->updated_at.' , '.$obs->observacion;
            $observacion=$observacion.'//'.$t_observacion;
        }
        return $observacion;
    }
    public function getCalificacionDetalleAttribute(){
        $observacion='';
        foreach ($this->rel_calificacion->where('nombre_tipo',$this->clase) as $obs) {
            $temp_observacion=$obs->updated_at.' , '.$obs->calificacion.' , '.$obs->iniciales;
            $observacion=$observacion.'//->'.$temp_observacion;
        }
        return $observacion;
    }
    public function r_ciudad(){
        return $this->hasOne('App\Ciudad','id','ciudad');
    }
    public function r_estado(){
        return $this->hasOne('App\Ciudad','id','estado');
    }
    public function mensualidades(){
        return $this->hasMany('App\Mensualidad','id_foraneo','id');
    }
    public function editar(){
        $edita=0;
        if($this->autor==auth()->user()->iniciales || (auth()->user()->puesto=='DIRECTOR COMERCIAL') || (auth()->user()->puesto=='AUXILIAR ADMINISTRATIVO') || (auth()->user()->tipo_usuario=='ADMINISTRADOR') ){
            $edita=1;
        }
        return $edita;
    }
}
