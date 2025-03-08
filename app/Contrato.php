<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Carbon\Carbon;
use App\Clase as CContrato;
use Illuminate\Database\Eloquent\Model;
class Contrato extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'contratos';
    protected $fillable=[
    		'id_foraneo',
            'fecha_inicio_garantia',
            'fecha_inicio_contrato',
            'fecha_fin_garantia',
            'fecha_fin_contrato',
            'refacciones',
            'refacciones_excepciones',
            'numeros_pagos',
            'limite_atencion',
            'tipo_contrato',
            'representante_smh',
            'representante_cliente',
            'declaracion_cliente',
            'declaracion_smh',
            'definiciones',
            'clausula_primera',
            'monto_total_contrato',
            'monto_pago_inicial',
            'fecha_pago_inicial',
            'dia_final_pago',
            'interes_moratorio_cliente',
            'descuento_incumplimiento_smh',
            'lugar_pago_cliente',
            'monto_nueva_ubicacion',
            'rescicion_smh',
            'rescicion_cliente',
            'conclusion',
            'fecha_contrato',
            'tiempo_contrato',
            'modalidad_pagos',
            'moneda',
            'clase',
            'digitalizacion'
    ];
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
    public function getAlerta(){
        return CContrato::on('mypro')
        ->where('clase','C')
        ->where('estatus','CERRADO')
        ->where('enviar_aviso','=','')
        ->orderBy('folio', 'asc')
        ->get();
    }
    public function ScopeForaneo($query,$id_foraneo){
        $query->where('id_foraneo',$id_foraneo);
    }
    /*
    public function setFechaInicioContratoAttribute($f){
        if(!empty($f)){
            $this->attributes['fecha_inicio_contrato']=Carbon::createFromFormat('d-m-Y H',$f.'23');
        }
    }
    public function setFechaFinContratoAttribute($f){
        if(!empty($f)){
            $this->attributes['fecha_fin_contrato']=Carbon::createFromFormat('d-m-Y H',$f.'23');
        }
    }  
    public function setFechaContratoAttribute($f){
        if(!empty($f)){
            $this->attributes['fecha_contrato']=Carbon::createFromFormat('d-m-Y H',$f.'23');
        }
    }
    public function setFechaFinGarantiaAttribute($f){
        if(!empty($f)){
            $this->attributes['fecha_fin_garantia']=Carbon::createFromFormat('d-m-Y H',$f.'23');
        }
    }
    */
    
}
