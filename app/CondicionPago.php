<?php

                namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
                use Illuminate\Database\Eloquent\Model;
                
class CondicionPago extends Model
{
                    //METODOS DE PAGO POR PROVEEDOR EN COMERCIAL    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
protected $table='condiciones_pagos';
protected $fillable=[
        'id_marca',
        'etiqueta',
        'instituto',
        'condicion',
        'c_paymentterm_id'
	];
        public function marca() {
            return $this->belongsTo('App\MarcaProveedor','id_marca','id');
        }
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
    }	   public function scopeIdMarca($query,$id_marca)
    {
        if(trim($id_marca)!="")
        {
            $arr=explode("*", $id_marca);
            if(count($arr)>=2)
            {
                $id_marca=  str_replace("*", "%", $id_marca);
                $query->where('id_marca','like',$id_marca);
            }  else 
            {
                $query->where('id_marca',$id_marca);
            }
        }
    }	   public function scopeEtiqueta($query,$etiqueta)
    {
        if(trim($etiqueta)!="")
        {
            $arr=explode("*", $etiqueta);
            if(count($arr)>=2)
            {
                $etiqueta=  str_replace("*", "%", $etiqueta);
                $query->where('etiqueta','like',$etiqueta);
            }  else 
            {
                $query->where('etiqueta',$etiqueta);
            }
        }
    }	   public function scopeInstituto($query,$instituto)
    {
        if(trim($instituto)!="")
        {
            $arr=explode("*", $instituto);
            if(count($arr)>=2)
            {
                $instituto=  str_replace("*", "%", $instituto);
                $query->where('instituto','like',$instituto);
            }  else 
            {
                $query->where('instituto',$instituto);
            }
        }
    }	   public function scopeCondicion($query,$condicion)
    {
        if(trim($condicion)!="")
        {
            $arr=explode("*", $condicion);
            if(count($arr)>=2)
            {
                $condicion=  str_replace("*", "%", $condicion);
                $query->where('condicion','like',$condicion);
            }  else 
            {
                $query->where('condicion',$condicion);
            }
        }
    }	
}
