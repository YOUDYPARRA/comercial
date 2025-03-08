<?php

namespace app\Helpers;
use App\Producto;
class HelperEquipos
{
    /**
     * Regresa un Array
     * 
     * **/
    public static function getEquipos()
    {   //return auth()->user()->id;
        return Producto::lists('nombre','nombre');
        /*if(!auth()->guest())
        {
            return [''=>'.',
                        'ULTRASONIDO'=>'ULTRASONIDO',
                        'MASTOGRAFIA'=>'MASTOGRAFÍA',
                        'RAYOS X'=>'RAYOS X',
                        'DENSITOMETRIA'=>'DENSITOMETRÍA',
                        'TOMOGRAFIA'=>'TOMOGRAFÍA',
                        'RESONANCIA MAGNETICA'=>'RESONANCIA MAGNÉTICA',
                        'FLUOROSCOPIA'=>'FLUOROSCOPÍA',
                        'HIT'=>'HIT',
                        'THINPREP'=>'THINPREP',
                        'ACCESORIOS'=>'ACCESORIOS',
                        'SERVICIOS'=>'SERVICIOS'];
         
        }else
        {
            return [];
        }
        */
        
    }//fin funcion
}