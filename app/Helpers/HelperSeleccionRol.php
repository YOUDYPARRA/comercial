<?php
namespace app\Helpers;
use app\User;
class HelperSeleccionRol
{
    /**
     * Consulta y genera el menu para cambiar los roles asignados, segun el usuario actual
     *
     * **/
    public static function opciones()
    {   //return auth()->user()->id;
      $opciones=[];
        if(!auth()->guest())
        {
          $id_usuario= auth()->user()->id;
          $roles=HelperSeleccionRol::getRoles();
            if(count($roles)>0)
            {
              $opciones=$roles;
            }
        }
        return $opciones;
    }//fin funcion
    public static function getRoles() {
      $arr=[];
      $roles='';
      $roles= auth()->user()->rol()->get();
      foreach ($roles as $key => $value) {
        $arr[$value->id]=$value->etiqueta;
      }
      return $arr;
    }

}
