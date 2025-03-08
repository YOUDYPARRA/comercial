<?php
namespace app\Helpers;
use app\Permiso;
class HelperPermiso
{
    /**
     * Consulta y genera el menu asignado al usuario en el sistema
     * Consulta los distintos id_menus a los que tiene permiso el usuario en la tabla permisos
     * Consulta los recursos (url) condicionados por usuario y por id_menu en la tabla 
     * 
     * **/
    public static function opciones()
    {   //return auth()->user()->id;
        if(!auth()->guest())
        {
            $permisos= auth()->user()->permisos()->get();
            if(count($permisos)>0)
            {
                $permisos=$permisos->sortBy('id_menu');//se ordeno el arreglo obtenido segun por menu.
                $bandera_cambio ='';
                $str_inicia_menu ='<li class="dropdown">';
                foreach ($permisos as $key => $permiso) {//recorre el arreglo obtenido para genera HTML de menu
                    if(empty($bandera_cambio)){// si viene la bandera de cambio de menu en blanco, asignar por primera vez
                        $bandera_cambio=$permiso->id_menu;
                        //Llenar nuevo menu con las url q pertenecen a este menu mientras q no cambie el menu
                        $str_menu=  $str_inicia_menu.HelperPermiso::getMenu($permiso->menu->menu).'<ul class="dropdown-menu">';
                        $str_menu=$str_menu.HelperPermiso::getOpcMenu($permiso->relacion_recurso->etiqueta, $permiso->relacion_recurso->recurso);
                    }  else if($bandera_cambio === $permiso->id_menu){// EL MENU NO HA CAMBIADO
                        //Llenar con las url q pertenecen a este menu mientras q no cambie el menu
                        $str_menu=$str_menu.HelperPermiso::getOpcMenu($permiso->relacion_recurso->etiqueta, $permiso->relacion_recurso->recurso);
                    }else if($bandera_cambio != $permiso->id_menu){//EL MENU HA CAMBIADO
                        $bandera_cambio=$permiso->id_menu;
                        //Llenar nuevo menu con las url q pertenecen a este menu mientras q no cambie el menu
                        $str_menu=$str_menu.'</ul></li>'.$str_inicia_menu.HelperPermiso::getMenu($permiso->menu->menu).'<ul class="dropdown-menu">'.
                        HelperPermiso::getOpcMenu($permiso->relacion_recurso->etiqueta, $permiso->relacion_recurso->recurso);
                    }
                }
                return $str_menu.'</ul></li>';
            }else
            {
                
                return '<hr><h4>VERIFIQUE PERMISOS</h4>';
            }
        }else
        {
//            dd('di algo');
            return '<hr><h4>Bienvenido, Inicie Sesion</h4>';
        }
    }//fin funcion
    public static function getMenu($nombre_menu) {
        return '<a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$nombre_menu.' <span class="caret"></span></a>';
    }
    public static function getOpcMenu($nombre,$url) {
//        $url=  str_replace('.', '/', $url);
        if(!empty($nombre)){
         $arr_url=explode('?', $url);
            if(count($arr_url)>1){
                //la url contiene parametros
                $url=route($arr_url[0]);
                $url=$url.'?'.$arr_url[1];
            }else{
                //la url no tiene parametros
                    
                $url=route($url);
                
            }
            return '<li><a href="'.$url.'" >'.$nombre.'</a></li>';
        }
    }
}