<?php

namespace app\Helpers;
use App\UnidadMedida;
class HelperUnidadesMedidas
{
    /**
     * Consulta y genera el menu asignado al usuario en el sistema
     * Consulta los distintos id_menus a los que tiene permiso el usuario en la tabla permisos
     * Consulta los recursos (url) condicionados por usuario y por id_menu en la tabla 
     * 
     * **/
   public static function getListUnidadesMedidas() {
       return UnidadMedida::lists('p_name','p_name');
   }
}