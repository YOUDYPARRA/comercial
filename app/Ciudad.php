<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    //
    protected $table='ciudades';
    protected $fillable=[
    	'nombre',
    	'id_estado',
    	'id_ciudad',
    	'clase'
    ];
    public function scopeNombre($query,$nombre)
    {
        if(trim($nombre)!="")
        {
            $arr=explode("*", $nombre);
            if(count($arr)>=2)
            {
                $nombre=  str_replace("*", "%", $nombre);
                $query->where('nombre','like',$nombre);
            }  else 
            {
                //echo $nombre;
                $query->where('nombre',$nombre);
            }
        }
    }
    public function scopeIdEstado($query,$id_estado)
    {
        if(trim($id_estado)!="")
        {
            $arr=explode("*", $id_estado);
            if(count($arr)>=2)
            {
                $id_estado=  str_replace("*", "%", $id_estado);
                $query->where('id_estado','like',$id_estado);
            }  else 
            {
               // echo $id_estado;
                $query->where('id_estado',$id_estado);
            }
        }
    }
     public function scopeClase($query,$clase)
    {
        if(trim($clase)!="")
        {
            $arr=explode("*", $clase);
            if(count($arr)>=2)
            {
                $id_estado=  str_replace("*", "%", $clase);
                $query->where('clase','like',$clase);
            }  else 
            {
               // echo $id_estado;
                $query->where('clase',$clase);
            }
        }
    }
    public function scopeIdCiudad($query,$id_ciudad)
    {
        if(trim($id_ciudad)!="")
        {
            $arr=explode("*", $id_ciudad);
            if(count($arr)>=2)
            {
                $id_ciudad=  str_replace("*", "%", $id_ciudad);
                $query->where('id_ciudad','like',$id_ciudad);
            }  else 
            {
                //echo $id_ciudad;
                $query->where('id_ciudad',$id_ciudad);
            }
        }
    }
}
