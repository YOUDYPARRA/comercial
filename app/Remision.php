<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Remision extends Model
                {
                    //
use SoftDeletes;
protected $dates = ['deleted_at'];

                    protected $table='remisiones';
    protected $fillable=[
                'reporte',
                'numero_contrato',
                'numero_cotizacion',
                'numero_orden_servicio',
                'numero_orden_compra',
                'numero_orden_venta',
                'archivo_digital'
	];
    public function scopeReporte($query,$reporte)
    {
        if(trim($reporte)!="")
        {
            $arr=explode("*", $reporte);
            if(count($arr)>=2)
            {
                $reporte=  str_replace("*", "%", $reporte);
                $query->where('reporte','like',$reporte);
            }  else 
            {
                $query->where('reporte',$reporte);
            }
        }
    }	   public function scopeNumeroContrato($query,$numero_contrato)
    {
        if(trim($numero_contrato)!="")
        {
            $arr=explode("*", $numero_contrato);
            if(count($arr)>=2)
            {
                $numero_contrato=  str_replace("*", "%", $numero_contrato);
                $query->where('numero_contrato','like',$numero_contrato);
            }  else 
            {
                $query->where('numero_contrato',$numero_contrato);
            }
        }
    }	   public function scopeNumeroCotizacion($query,$numero_cotizacion)
    {
        if(trim($numero_cotizacion)!="")
        {
            $arr=explode("*", $numero_cotizacion);
            if(count($arr)>=2)
            {
                $numero_cotizacion=  str_replace("*", "%", $numero_cotizacion);
                $query->where('numero_cotizacion','like',$numero_cotizacion);
            }  else 
            {
                $query->where('numero_cotizacion',$numero_cotizacion);
            }
        }
    }	   public function scopeNumeroOrdenServicio($query,$numero_orden_servicio)
    {
        if(trim($numero_orden_servicio)!="")
        {
            $arr=explode("*", $numero_orden_servicio);
            if(count($arr)>=2)
            {
                $numero_orden_servicio=  str_replace("*", "%", $numero_orden_servicio);
                $query->where('numero_orden_servicio','like',$numero_orden_servicio);
            }  else 
            {
                $query->where('numero_orden_servicio',$numero_orden_servicio);
            }
        }
    }	   public function scopeNumeroOrdenCompra($query,$numero_orden_compra)
    {
        if(trim($numero_orden_compra)!="")
        {
            $arr=explode("*", $numero_orden_compra);
            if(count($arr)>=2)
            {
                $numero_orden_compra=  str_replace("*", "%", $numero_orden_compra);
                $query->where('numero_orden_compra','like',$numero_orden_compra);
            }  else 
            {
                $query->where('numero_orden_compra',$numero_orden_compra);
            }
        }
    }	   public function scopeNumeroOrdenVenta($query,$numero_orden_venta)
    {
        if(trim($numero_orden_venta)!="")
        {
            $arr=explode("*", $numero_orden_venta);
            if(count($arr)>=2)
            {
                $numero_orden_venta=  str_replace("*", "%", $numero_orden_venta);
                $query->where('numero_orden_venta','like',$numero_orden_venta);
            }  else 
            {
                $query->where('numero_orden_venta',$numero_orden_venta);
            }
        }
    }	   public function scopeArchivoDigital($query,$archivo_digital)
    {
        if(trim($archivo_digital)!="")
        {
            $arr=explode("*", $archivo_digital);
            if(count($arr)>=2)
            {
                $archivo_digital=  str_replace("*", "%", $archivo_digital);
                $query->where('archivo_digital','like',$archivo_digital);
            }  else 
            {
                $query->where('archivo_digital',$archivo_digital);
            }
        }
    }	
}
