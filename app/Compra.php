<?php

namespace App;
use App\Estado;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
                    //
        use SoftDeletes;
        protected $dates = ['deleted_at'];
        protected $table='compras_ventas';
        protected $fillable=[
                'numero_cotizacion',
                'numero_contrato',
                'numero_orden',//el numero de orden del cliente
                'tipo_archivo',//c= compra, v=venta'
                'folio',
                'autor',//nombre o iniciales del autor del documento.
                'area',//coordinacion o parecido'
                'departamento',//departamento, ejem: servicio, c.s., licitaciones etc...'
                'fecha_entrega',//campo alendum'
                'fecha',
                'fecha_embarque',
                'nombre_tercero',
                'direccion_tercero',
                'colonia_tercero',
                'cp_tercero',
                'ciudad_tercero',
                'estado_tercero',
                'pais_tercero',
                'nombre_fiscal',
                'rfc',
                'direccion_fiscal',
                'colonia_fiscal',
                'codigo_postal_fiscal',
                'estado_fiscal',
                'ciudad_fiscal',
                'nombre_agente_aduanal',
                'direccion_agente',
                'telefono_agente',
                'fax_agente',
                'correo_agente',
                //'condicion_pago_tipo',
                'condicion_pago_marca',
                'condicion_pago_tiempo',
                'atribuir',//nombre o iniciales de vendedor de este proceso'
                'gerente',//responsable de logistica o area'
                'representante_tercero',// o representante legal',
                'correo_representante_tercero',// o representante legal',
                'iva',
                'total',//'
                'digitalizacion',//'
                'nota',//observacion para el cliente.'
                'tipo_cambio',
                'metodo_pago',// campo alendum'
                'tipo_envio',//campo alendum'
                'id_camp_publ',//campo alendum'
                'org_name',//campo alendum'
                'id_doctype_target',//campo alendum'
                'id_warehouse',//campo alendum'
                'tipo_moneda',//campo alendum'
                'condicion_facturacion',//   campo alendum'
                'fecha_facturacion',//
                'c_bpartner_id',//campo alendum' cliente
                'c_bpartner_id_prov',//campo alendum' provedor
                'c_bpartner_location',//campo alendum' cliente
                'c_bpartner_location_prov',//campo alendum' provedor
                'org_id',//campo alendum
                'centro_costo',//campo alendum'
                'c_tax_id',
                'c_order_id',
                'estatus',
                'version',
                'group_name',
                'send_to',
                'pais_fiscal',
                'id_cotizacion',
                'dato',
        	];
public function getObservacionAttribute(){
    $observacion='';
    if($this->tipo_archivo=='v'){
        foreach ($this->rel_observaciones->where('nombre_tipo','venta') as $obs) {
            # code...
            $observacion=$obs->observacion.' '.$observacion;
            //$obs=$obs.' '.$obs;
        }


    }else{

        foreach ($this->rel_observaciones->where('nombre_tipo','compra') as $obs) {
            # code...
            $observacion=$obs->observacion.' '.$observacion;
            //$obs=$obs.' '.$obs;
        }
    }
    return $observacion;
}

public function getDigitalizacionAttribute(){
    $a='';
     return json_decode($this->r_digitalizaciones
        ->where('clase','c')
        ->where('subclase','compra')->first());
}

public function getObservacionDetalleAttribute(){
    $observacion='';
    if($this->tipo_archivo=='v'){
        foreach ($this->rel_observaciones->where('nombre_tipo','venta') as $obs) {
            # code...
            $observacion=$obs->updated_at.' : '.$obs->observacion;
            $observacion=$observacion.'//'.$observacion;
        }


    }else{

        foreach ($this->rel_observaciones->where('nombre_tipo','compra') as $obs) {
            # code...
            $observacion=$obs->updated_at.' : '.$obs->observacion;
            $observacion=$observacion.'//'.$observacion;
        }
    }
    return $observacion;
}

    public function insumos_compras_ventas(){
        return $this->hasMany('App\InsumoCompraVenta','id_compra_venta','id');
    }
    public function calificacion(){
        return $this->hasOne('App\Calificacion','id_producto','id');
    }
    public function orderv(){//relacion a uno compra
        return $this->hasOne('App\OrderV','c_order_id','c_order_id');
    }
    public function rel_observaciones(){
        return $this->hasMany('App\Observacion','id_producto','id');
    }
    public function folioOrden(){
        $folio='';
        if(!empty($this->c_order_id)){

            $x= $this->orderV()->first();
            //dd($x->documentno);
            if(!empty($x)){
                //$folio=$x;
                $folio='/'.$x->documentno;
            }
        }
        return $folio;
    }
    public function ScopeBuscar($query,$buscar){

        if(!is_object($buscar)){
            $objeto=(object)$buscar;
        }
        $numero_querys='0';
        foreach ($objeto as $key => $value) {
            $dato='';
            $dato = array_search($key,$this->fillable);
            if(is_numeric($dato)){//VERIFICAR QUE EL CAMPO DE BUSQUEDA SE ENCUENTRE EN OBJETO FILLABLE
                $campo=$this->fillable[$dato];
                $comodin=strpos($objeto->$campo,'*');
                if(trim($objeto->$campo!='') ){//verificar q el campo de busqueda contenga caracteres
                    $numero_querys=$numero_querys+1;
                    if($comodin!==false){
                        $string=  str_replace("*", "%", $objeto->$campo);
                        $query->where($campo,'like',$string);
                    }else{
                        $query->where($campo,$objeto->$campo);
                    }
                }

            }

        }
        if(isset($objeto->asc)){
                $query->OrderBy($objeto->asc,'asc');
        }else if(isset($objeto->desc)){
                $query->OrderBy($objeto->desc,'desc');
        }
        //fin foreach
       /* if($numero_querys==0){
            $query->where('id',0);

        }*/

    }//fin public function
    public function r_digitalizaciones(){
        return $this->hasMany('App\Digitalizacion','id_foraneo','id');
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
            ->where('clase','compra')
            ->where('organizacion',$this->org_name)
            ->get();
            //HelperUtil::log(['ESTADO '=>$this->numero_cotizacion.'>'.$estados]);
      return $estados;
    }



}
