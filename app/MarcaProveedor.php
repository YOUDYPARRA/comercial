<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarcaProveedor extends Model
{
                    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='marcas_proveedores';
    protected $fillable=[
                         'nombre_proveedor',
                         'marca_representada',
                         'dias_entrega_maximo',
                        'dias_entrega_minimo',
                        'observacion',
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
    }
    public function scopeNombreProveedor($query,$nombre_proveedor)
    {
        if(trim($nombre_proveedor)!="")
        {
            $arr=explode("*", $nombre_proveedor);
            if(count($arr)>=2)
            {
                $nombre_proveedor=  str_replace("*", "%", $nombre_proveedor);
                $query->where('nombre_proveedor','like',$nombre_proveedor);
            }  else 
            {
                $query->where('nombre_proveedor',$nombre_proveedor);
            }
        }
    }	   public function scopeMarcaRepresentada($query,$marca_representada)
    {
        if(trim($marca_representada)!="")
        {
            $arr=explode("*", $marca_representada);
            if(count($arr)>=2)
            {
                $marca_representada=  str_replace("*", "%", $marca_representada);
                $query->where('marca_representada','like',$marca_representada);
            }  else 
            {
                $query->where('marca_representada',$marca_representada);
            }
        }
    }	   public function scopeDiasEntregaMaximo($query,$dias_entrega_maximo)
    {
        if(trim($dias_entrega_maximo)!="")
        {
            $arr=explode("*", $dias_entrega_maximo);
            if(count($arr)>=2)
            {
                $dias_entrega_maximo=  str_replace("*", "%", $dias_entrega_maximo);
                $query->where('dias_entrega_maximo','like',$dias_entrega_maximo);
            }  else 
            {
                $query->where('dias_entrega_maximo',$dias_entrega_maximo);
            }
        }
    }	   public function scopeDiasEntregaMinimo($query,$dias_entrega_minimo)
    {
        if(trim($dias_entrega_minimo)!="")
        {
            $arr=explode("*", $dias_entrega_minimo);
            if(count($arr)>=2)
            {
                $dias_entrega_minimo=  str_replace("*", "%", $dias_entrega_minimo);
                $query->where('dias_entrega_minimo','like',$dias_entrega_minimo);
            }  else 
            {
                $query->where('dias_entrega_minimo',$dias_entrega_minimo);
            }
        }
    }	   public function scopeObservacion($query,$observacion)
    {
        if(trim($observacion)!="")
        {
            $arr=explode("*", $observacion);
            if(count($arr)>=2)
            {
                $observacion=  str_replace("*", "%", $observacion);
                $query->where('observacion','like',$observacion);
            }  else 
            {
                $query->where('observacion',$observacion);
            }
        }
    }	
}