<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable,CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'numero_empleado',
        'name',
        'iniciales',
        'email',
        'password',
        'puesto',
        'area',
        'departamento',
        'centro_costo',
        'lugar_centro_costo',
        'tipo_usuario',
        'org_name',
        'c_bpartner_id',
        'numero_empleado'
        ];

    /**
    *    20160211
    *    ADD CENTRO DE COSTOS LUGAR BAJIO BJ, MX, MTY, GDL,
    *    ADD REPRESENTANTE LEGAL ABIERTO
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    public function scopeIdUser($query,$id)
    {
        if(trim($id)!="")
        {
            $arr_id=explode("*", $id);
            if(count($arr_id)>=2)
            {
            $id=  str_replace("*", "%", $id);
                $query->where('id','like',$id);
            }  else
            {
                $query->where('id',$id);
            }
        }

    }
    public function scopeNombre($query,$nombre) {
        if(trim($nombre)!="")
        {
            $arr_id=explode("*", $nombre);
            if(count($arr_id)>=2)
            {
            $id=  str_replace("*", "%", $nombre);
                $query->where('name','like',$nombre);
            }  else
            {
                $query->where('name',$nombre);
            }
        }
    }

    public function scopeIniciales($query,$iniciales) {
        if(trim($iniciales)!="")
        {
            $arr_id=explode("*", $iniciales);
            if(count($arr_id)>=2)
            {
            $id=  str_replace("*", "%", $iniciales);
                $query->where('iniciales','like',$iniciales);
            }  else
            {
                $query->where('iniciales',$iniciales);
            }
        }
    }
    public function scopeArea($query,$nombre) {
        if(trim($nombre)!="")
        {
            $arr_id=explode("*", $nombre);
            if(count($arr_id)>=2)
            {
            $nombre=  str_replace("*", "%", $nombre);
                $query->where('area','like',$nombre);
            }  else
            {
                $query->where('area',$nombre);
            }
        }
    }
    public function scopePuesto($query,$nombre) {
        if(trim($nombre)!="")
        {
            $arr_id=explode("*", $nombre);
            if(count($arr_id)>=2)
            {
            $nombre=  str_replace("*", "%", $nombre);
                $query->where('puesto','like',$nombre);
            }  else
            {
                $query->where('puesto',$nombre);
            }
        }
    }
    public function permisos() {
        return $this->hasMany('App\Permiso', 'id_usuario','id');
    }
    public function rol() {
        return $this->belongsToMany('App\Rol', 'roles_usuarios','id_usuario','id_rol');
    }

    public function ScopeBuscar($query,$buscar){

        if(!is_object($buscar)){
            $objeto=(object)$buscar;
        }//dd($buscar);
        $numero_querys='0';
        foreach ($objeto as $key => $value) {
            $dato='';
            $dato = array_search($key,$this->fillable);
            if(is_numeric($dato)){//VERIFICAR QUE EL CAMPO DE BUSQUEDA SE ENCUENTRE EN OBJETO FILLABLE
                $campo=$this->fillable[$dato];
                //echo $dato .'<br>';
                if(is_array($objeto->$campo)){
                    $comodin=false;
                }else{
                    $comodin=strpos($objeto->$campo,'*');
                }
                if(trim($objeto->$campo!='') ){//verificar q el campo de busqueda contenga caracteres
                    $numero_querys=$numero_querys+1;
                    if($comodin!==false){
                        $string=  str_replace("*", "%", $objeto->$campo);
                        $query->where($campo,'like',$string);
                    }else{
                        if(is_array($objeto->$campo) && (count($objeto->$campo)>2) ){
                            $query->whereIn($campo,$objeto->$campo);
                        }elseif(is_array($objeto->$campo) && (count($objeto->$campo)==2) ){
                            $query->whereBetween($campo,$objeto->$campo);

                        }else{
                            //echo 'No es arr-';
                            if(strpos($objeto->$campo, '!')!==false){
                              //  echo 'No es arr-'.substr($objeto->$campo,1);
                               $query->where($campo,'<>',substr($objeto->$campo,1));
                            }else{
                               $query->where($campo,$objeto->$campo);
                            }

                        }
                    }
                }

            }

        }//fin foreach

        if($numero_querys==0){
            $query->where('id',0);
        }
        if(isset($objeto->asc)){
                $query->OrderBy($objeto->asc,'asc');
        }else if(isset($objeto->desc)){
                $query->OrderBy($objeto->desc,'desc');
        }

    }//fin public function buscar

}
