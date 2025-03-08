<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Grupo extends Model
{
    //
        use SoftDeletes;
        protected $table = 'grupos';
    protected $dates = ['deleted_at'];
    protected $fillable=['id', 'grupo','observacion'];
    public function grupo_usuario() {
        return $this->hasMany('App\GrupoUsuario','id_grupo','id');
    }
    public function scopeGrupo($query,$grupo) {
        if(trim($grupo)!="")
        {
            $arr=explode("*", $grupo);
            if(count($arr)>=2)
            {
                $grupo=  str_replace("*", "%", $grupo);
                $query->where('recurso','like',$grupo);
            }  else 
            {
                $query->where('grupo',$grupo);
            }
        }
    }
    public function scopeIdGrupo($query,$grupo) {
        if(trim($grupo)!="")
        {
            $arr=explode("*", $grupo);
            if(count($arr)>=2)
            {
                $grupo=  str_replace("*", "%", $grupo);
                $query->where('recurso','like',$grupo);
            }  else 
            {
                $query->where('grupo',$grupo);
            }
        }
    }
    
}
