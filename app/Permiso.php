<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    //
    protected $table='permisos';
    
    protected $fillable=[
                        'id_usuario',
                        'id_grupo',
                        'id_menu',
                        'recurso',
                        'nombre',
                        'observacion'
                        ];
    public function menu() 
    {
            return $this->belongsTo('App\Menu', 'id_menu', 'id');
    }
    public function relacion_recurso() 
    {
            return $this->belongsTo('App\Recurso', 'recurso', 'recurso');
    }
    public function usuarios() {
        return $this->hasMany('App\User', 'id', 'id_usuario');
    }
    public function scopeNombre($query,$nombre)
    {
        if(trim($nombre)!="")
        {
            $arr=explode("%", $nombre);
            if(count($arr)>=2)
            {
                $id=  str_replace("*", "%", $nombre);
                $query->where('nombre','like',$nombre);
            }  else 
            {
                $query->where('nombre',$nombre);
            }
        }
    }
    public function scopeIdUsuario($query,$id_usuario)
    {
        if(trim($id_usuario)!="")
        {   
            $query->where('id_usuario',$id_usuario);
            
        }
    }
    public function scopeIdMenu($query,$id_menu)
    {
        if(trim($id_menu)!="")
        {   
            $query->where('id_menu',$id_menu);
            
        }
    }
    public function scopeRecurso($query,$recurso)
    {
        if(trim($recurso)!="")
        {   
            $query->where('recurso',$recurso);
            
        }
    }
}
