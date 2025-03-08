<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoUsuario extends Model
{
    //
    protected $table='grupos_usuarios';
    protected $fillable=[
        'id_usuario',
        'id_grupo'
    ];
    
//    public function grupo() {
//        return $this->belongsTo('App\Grupo','id_grupo','id');
//    }
    public function scopeIdUsuario($query,$id_usuario)
    {
        if(trim($id_usuario)!="")
        {
            $arr_id_usuario=explode("*", $id_usuario);
            if(count($arr_id_usuario)>=2)
            {
            $id_usuario=  str_replace("*", "%", $id_usuario);
                $query->where('id_usuario','like',$id_usuario);
            }  else 
            {
                $query->where('id_usuario',$id_usuario);
            }
        }
        
    }
    public function scopeIdGrupo($query,$id_grupo)
    {
        if(trim($id_grupo)!="")
        {
            $arr_id_grupo=explode("*", $id_grupo);
            if(count($arr_id_grupo)>=2)
            {
            $id_grupo=  str_replace("*", "%", $id_grupo);
                $query->where('id_grupo','like',$id_grupo);
            }  else 
            {
                $query->where('id_grupo',$id_grupo);
            }
        }
        
    }
}
