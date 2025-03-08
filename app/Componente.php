<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Componente extends Model
{
                    //
    protected $table='componentes';
    protected $fillable=[
                'linea',
                'componente',
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
    }	   public function scopeLinea($query,$linea)
    {
        if(trim($linea)!="")
        {
            $arr=explode("*", $linea);
            if(count($arr)>=2)
            {
                $linea=  str_replace("*", "%", $linea);
                $query->where('linea','like',$linea);
            }  else 
            {
                $query->where('linea',$linea);
            }
        }
    }	   

    public function scopeComponente($query,$componente)
    {
        if(trim($componente)!="")
        {
            $arr=explode("*", $componente);
            if(count($arr)>=2)
            {
                $componente=  str_replace("*", "%", $componente);
                $query->where('componente','like',$componente);
            }  else 
            {
                $query->where('componente',$componente);
            }
        }
    }	

    public function scopeDistinct($query,$componente)
    {
        if(trim($componente)!="")
        {
                $query->groupBy($componente);
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
