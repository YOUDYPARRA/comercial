<?php

namespace App;

                use Illuminate\Database\Eloquent\Model;
 class Pagare extends Model
{
                    //
protected $table='pagares';
protected $fillable=[
        'id_cotizacion',
        'id_contrato_compra_venta',
        'financiamiento',
        'forma_pago',
        'fecha_suscripcion',
        'lugar_suscripcion',
        'obligacion_suscriptor',
        'mensualidad',
        'fecha_pago',
        'falta_pago',
        'porcentaje',
        'controversia_suscripcion',
        'aval',
	];
   public function scopeId($query,$id)
    {
        if(trim($id)!="")
        {
            $arr=explode("*", $id);
            if(count($arr)>=2)
            {
                $id=  str_replace("*", "%", $id);
                $query->where('id','like',$id);
            }  else 
            {
                $query->where('id',$id);
            }
        }
    }	   public function scopeIdCotizacion($query,$id_cotizacion)
    {
        if(trim($id_cotizacion)!="")
        {
            $arr=explode("*", $id_cotizacion);
            if(count($arr)>=2)
            {
                $id_cotizacion=  str_replace("*", "%", $id_cotizacion);
                $query->where('id_cotizacion','like',$id_cotizacion);
            }  else 
            {
                $query->where('id_cotizacion',$id_cotizacion);
            }
        }
    }	   public function scopeIdContratoCompraVenta($query,$id_contrato_compra_venta)
    {
        if(trim($id_contrato_compra_venta)!="")
        {
            $arr=explode("*", $id_contrato_compra_venta);
            if(count($arr)>=2)
            {
                $id_contrato_compra_venta=  str_replace("*", "%", $id_contrato_compra_venta);
                $query->where('id_contrato_compra_venta','like',$id_contrato_compra_venta);
            }  else 
            {
                $query->where('id_contrato_compra_venta',$id_contrato_compra_venta);
            }
        }
    }	   public function scopeObligacionSuscriptor($query,$obligacion_suscriptor)
    {
        if(trim($obligacion_suscriptor)!="")
        {
            $arr=explode("*", $obligacion_suscriptor);
            if(count($arr)>=2)
            {
                $obligacion_suscriptor=  str_replace("*", "%", $obligacion_suscriptor);
                $query->where('obligacion_suscriptor','like',$obligacion_suscriptor);
            }  else 
            {
                $query->where('obligacion_suscriptor',$obligacion_suscriptor);
            }
        }
    }	   public function scopeMensualidad($query,$mensualidad)
    {
        if(trim($mensualidad)!="")
        {
            $arr=explode("*", $mensualidad);
            if(count($arr)>=2)
            {
                $mensualidad=  str_replace("*", "%", $mensualidad);
                $query->where('mensualidad','like',$mensualidad);
            }  else 
            {
                $query->where('mensualidad',$mensualidad);
            }
        }
    }	   public function scopeFechaPago($query,$fecha_pago)
    {
        if(trim($fecha_pago)!="")
        {
            $arr=explode("*", $fecha_pago);
            if(count($arr)>=2)
            {
                $fecha_pago=  str_replace("*", "%", $fecha_pago);
                $query->where('fecha_pago','like',$fecha_pago);
            }  else 
            {
                $query->where('fecha_pago',$fecha_pago);
            }
        }
    }	   public function scopeFaltaPago($query,$falta_pago)
    {
        if(trim($falta_pago)!="")
        {
            $arr=explode("*", $falta_pago);
            if(count($arr)>=2)
            {
                $falta_pago=  str_replace("*", "%", $falta_pago);
                $query->where('falta_pago','like',$falta_pago);
            }  else 
            {
                $query->where('falta_pago',$falta_pago);
            }
        }
    }	   public function scopePorcentaje($query,$porcentaje)
    {
        if(trim($porcentaje)!="")
        {
            $arr=explode("*", $porcentaje);
            if(count($arr)>=2)
            {
                $porcentaje=  str_replace("*", "%", $porcentaje);
                $query->where('porcentaje','like',$porcentaje);
            }  else 
            {
                $query->where('porcentaje',$porcentaje);
            }
        }
    }	   public function scopeControversiaSuscripcion($query,$controversia_suscripcion)
    {
        if(trim($controversia_suscripcion)!="")
        {
            $arr=explode("*", $controversia_suscripcion);
            if(count($arr)>=2)
            {
                $controversia_suscripcion=  str_replace("*", "%", $controversia_suscripcion);
                $query->where('controversia_suscripcion','like',$controversia_suscripcion);
            }  else 
            {
                $query->where('controversia_suscripcion',$controversia_suscripcion);
            }
        }
    }	
}