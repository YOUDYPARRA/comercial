<?php

namespace app\Helpers;
use App\Coordinacion;
class HelperCoordinaciones
{
    /**
     * Regresa un Array
     * 
     * **/
    public static function getCoordinaciones()
    {   
    	$cor=Coordinacion::where('nombre','!=','')->groupBy('nombre')->get();
    	$arr_cor['']='COORDINACION';
    	foreach ($cor as $cord) {    	
    		$arr_cor[$cord->nombre]=$cord->nombre;
    	}
    	return $arr_cor;
    }//fin funcion
}