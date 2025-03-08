<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Recurso extends Model
{
    //
        use SoftDeletes;
//        protected $dateFormat = 'd-m-Y H:i:s';
    protected $dates = ['deleted_at'];
    protected $table = 'recursos';
    protected $fillable=[
                            'recurso',
                            'id_menu',
                            'etiqueta',
                            'observacion',
                            'aviso'
                        ];
    
    public function permisos() {
        return $this->hasMany('App\Permiso','recurso','recurso');
    }
    public function menu() 
    {
            return $this->belongsTo('App\Menu', 'id_menu', 'id');
    }

     public function scopeRecurso($query,$recurso)
    {
        if(trim($recurso)!="")
        {
            $arr_recurso=explode("*", $recurso);
            if(count($arr_recurso)>=2)
            {
            $recurso=  str_replace("*", "%", $recurso);
                $query->where('recurso','like',$recurso);
            }  else 
            {
                $query->where('recurso',$recurso);
            }
        }
        
    }
     public function scopeEtiqueta($query,$etiqueta)
    {
        if(trim($etiqueta)!="")
        {
            $arr=explode("*", $etiqueta);
            if(count($arr)>=2)
            {
                $etiqueta=  str_replace("*", "%", $etiqueta);
                $query->where('recurso','like',$etiqueta);
            }  else 
            {
                $query->where('etiqueta',$etiqueta);
            }
        }
    }
    public function scopeidMenu($query,$id_menu)
    {
        if(trim($id_menu)!="")
        {
            $arr=explode("*", $id_menu);
            if(count($arr)>=2)
            {
                $id_menu=  str_replace("*", "%", $id_menu);
                $query->where('id_menu','like',$id_menu);
            }  else 
            {
                $query->where('id_menu',$id_menu);
            }
        }
    }
}
