<?php

namespace app\Helpers;
use App\User;
use App\Permiso;
use App\Helpers\HelperUtil;
class HelperUsuario
{
    public static function getServicio() {
        return User::lists('name','id');
    }
    public static function usuarios() {
        return User::lists('name','id');
    }
    public static function getUsuarioConPermiso(array $param) {
      //dd($param);
      $condicionante=$param['condicionante'];
      $condicion=$param['condicion'];
      $permiso=$param['permiso'];
      $usuarios_permiso=[];
      $usuarios=[];
      if(!empty($condicion)){
        $usuarios=HelperUsuario::getUsuario([$condicionante=>$condicion]);
      }
      foreach ($usuarios as $usuario) {
        $usuario_permiso=$usuario->permisos->where('recurso',$permiso)->first();
          if(count($usuario_permiso)>=1 ){
            $usuarios_permiso[]=$usuario;
          }
      }
      return $usuarios_permiso;
    }
    public static function getUsuario(array $param) {
        //buscar usuarios por recurso.
        //consultar permisos por url.
        //consultar usuarios desde los permiso obtenidos.
        //regresar los usuarios
        if(isset($param['recurso'])){
            //dd($param['recurso']);
            $permisos=Permiso::recurso($param['recurso'])->get();
            //dd($permisos);
            $arr_usuario='';
            //dd($permisos);
            foreach ($permisos as $key => $permiso) {
              //dd($permiso->usuarios[0]);
              //HelperUtil::log(['$permiso :'.count($permiso)=>$permiso]);
              //HelperUtil::log(['$permiso->usuarios->first() :'.count($permiso->usuarios->first())=>$permiso->usuarios->first()]);
                $arr_usuario[]=(object) $permiso->usuarios->first();
            }
            //dd($arr_usuario);
            return $arr_usuario;
        }elseif(isset($param['nombre'])){
            $arr_usuario=User::nombre($param['nombre'])->get();
            return $arr_usuario;
        }elseif(isset($param['iniciales'])){
            return $arr_usuario=User::iniciales($param['iniciales'])->get();
        }else{
            return $arr_usuario=User::buscar($param)->get();
        }
    }
    public static function listUsuario($param) {
        if(isset($param)){
            $permisos=Permiso::recurso($param)->get();
            $arr_id_usuario='';
            $arr='';
            foreach ($permisos as $key => $permiso) {
                $arr[]=$permiso->id_usuario;
            }
            //echo '->'.print_r($arr);
            if(count($arr)>=1){
                return User::whereIn('id',$arr)->lists('iniciales','email');
            }else{
                //echo '-->'.print_r($arr);
                return null;
            }
        }

    }
    public static function listCoordinador() {
        return User::puesto('COORDINADOR DE SERVICIOS')->lists('iniciales','email');
    }

}
