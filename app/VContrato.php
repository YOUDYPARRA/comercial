<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class VContrato extends Model
{
    //
    use SoftDeletes;
    //public $incrementing = false;
    //protected $primaryKey = 'contrato_id';
    protected $dates = ['deleted_at'];
    protected $table = 'view_contratos';
    protected $fillable=[
            'folio',
    		'clase_id',
            'contrato_id',
            'organizacion',
            'modificable',
            'estatus',
            'clase',
            'folio_contrato',
            'tipo_servicio',
            'condicion_servicio',
            'instituto',
            'autor',
            'nombre_fiscal',
            'calle_fiscal',
            'colonia_fiscal',
            'c_p_fiscal',
            'ciudad_fiscal',
            'estado_fiscal',
            'pais_fiscal',
            'rfc',
            'c_bpartner_id',
            'c_bpartner_location',
            'celular',
            'telefonos',
            'correos',
            'fax',
            'fecha_inicio_garantia',
            'fecha_fin_garantia',
            'fecha_inicio_contrato',
            'fecha_fin_contrato',
            'refacciones',
            'refacciones_excepciones',
            'numeros_pagos',
            'limite_atencion',
            'tipo_contrato',
            'representante_smh',
            'representante_cliente',
            'declaracion_cliente',
            'monto_total_contrato',
            'monto_pago_inicial',
            'dia_final_pago',
            'interes_moratorio_cliente',
            'descuento_incumplimiento_smh',
            'lugar_pago_cliente',
            'monto_nueva_ubicacion',
            'conclusion',
            'digitalizacion'
    ];
    /*
         public function ScopeOrd($query,$r){
            if(!is_object($r)){
                $r=(object)$r;
            }
            if(isset($r->asc)){
                $query->OrderBy($r->asc,'desc');
            }else if(isset($r->desc)){
                $query->OrderBy($r->desc,'asc');
            }
         }
         */

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
                        if(is_array($objeto->$campo)){
                            $query->whereIn($campo,$objeto->$campo);
                        }else{
                            $query->where($campo,$objeto->$campo);
                        }
                    } 
                }

            }
            
        }//fin foreach buscar
        //inicio ordenar
        if(isset($objeto->asc)){
                $query->OrderBy($objeto->asc,'asc');
        }else if(isset($objeto->desc)){
                $query->OrderBy($objeto->desc,'desc');
        }
        //fin ordenar
        /*
        if($numero_querys==0){
            $query->where('id',0);

        }
        */
        
    }//fin public function buscar
    public function getFechaInicioGarantiaAttribute($date)
    {
        if($date){
            $y=explode(' ', $date);
            $x=explode('-', $y[0]);
            return $x['2'].'-'.$x['1'].'-'.$x['0'];
        }
    }
    public function getFechaFinGarantiaAttribute($date)
    {
        if($date){
            $y=explode(' ', $date);
            $x=explode('-', $y[0]);
            return $x['2'].'-'.$x['1'].'-'.$x['0'];
        }
    }
    public function getFechaInicioContratoAttribute($date)
    {
        if($date){
            
            $y=explode(' ', $date);
            $x=explode('-', $y[0]);
            return $x['2'].'-'.$x['1'].'-'.$x['0'];
            //return Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $date)->format('Y-m-d');
        }
    }
    public function getFechaFinContratoAttribute($date)
    {
        if($date){
            
            $y=explode(' ', $date);
            $x=explode('-', $y[0]);
            return $x['2'].'-'.$x['1'].'-'.$x['0'];
            //return Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $date)->format('Y-m-d');
        }
    }
    public function equipos_contrato(){//Varios equipos en contrato
        return $this->hasMany('App\Clase','id_foraneo','clase_id');
    }
    public function rel_observaciones(){
        return $this->hasMany('App\Observacion','id_producto','id');
    }
    public function getObservacionAttribute(){
        $observacion='';
        foreach ($this->rel_observaciones->where('nombre_tipo','contratos') as $obs) {
            $observacion=$obs->observacion.' '.$observacion;
        }
        return $observacion;
    }
    public function digitalizaciones(){
        return $this->hasMany('App\Digitalizacion','id_foraneo','id');
    }
    public function hrefDigitalizaciones(){
    $href='';
    foreach ($this->digitalizaciones->where('clase',$this->clase) as $ob) {
        $href=$href.'<a href="digitalizaciones/'.$ob->id.'" type="button" class="btn btn-warning btn-xs" title="DIGITALIZACION"><i class="material-icons">cloud_download</i>'.$ob->digitalizacion.'</a>';
        //$href=$ob->observacion.' '.$observacion;
    }
    return $href;
}
}
