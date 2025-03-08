<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsumoOpcional extends Model
{
                    //
protected $table='insumos_opcionales';
protected $fillable=[
        'id_insumo',
        'id_componente',
        'id_pertenece',
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
    }	   public function scopeIdInsumo($query,$id_insumo)
    {
        if(trim($id_insumo)!="")
        {
            $arr=explode("*", $id_insumo);
            if(count($arr)>=2)
            {
                $id_insumo=  str_replace("*", "%", $id_insumo);
                $query->where('id_insumo','like',$id_insumo);
            }  else 
            {
                $query->where('id_insumo',$id_insumo);
            }
        }
    }	   public function scopeIdComponente($query,$id_componente)
    {
        if(trim($id_componente)!="")
        {
            $arr=explode("*", $id_componente);
            if(count($arr)>=2)
            {
                $id_componente=  str_replace("*", "%", $id_componente);
                $query->where('id_componente','like',$id_componente);
            }  else 
            {
                $query->where('id_componente',$id_componente);
            }
        }
    }	   


    public function scopeIdPertenece($query,$id_pertenece)
    {
        if(trim($id_pertenece)!="")
        {
            $arr=explode("*", $id_pertenece);
            if(count($arr)>=2)
            {
                $id_pertenece=  str_replace("*", "%", $id_pertenece);
                $query->where('id_pertenece','like',$id_pertenece);
            }  else 
            {
                $query->where('id_pertenece',$id_pertenece);
            }
        }
    }	

    public function scopeAgrupar($query,$id_pertenece)
    {
        if(trim($id_pertenece)!="")
        {
                $query->groupBy($id_pertenece);
        }
    }   
}
