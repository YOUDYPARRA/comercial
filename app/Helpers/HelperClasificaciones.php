<?php

namespace app\Helpers;
use App\Clasificacion;
class HelperClasificaciones
{

    public static function listClasificacion($param) {
        $clasificaciones=null;
        $listar=null;
        if(!empty($param)){
            /*
            $clasificaciones=Clasificacion::buscar($param)->get();
            if(count($clasificaciones)>=1){

                $listar= $clasificaciones;
            }else{
                $listar= null;
            }
            return $listar;
            */
            
            $clasificaciones=Clasificacion::buscar($param)->get();
            $arr=null;
            if(count($clasificaciones)>0){
                foreach ($clasificaciones as $clasificacion) {
                    $listar[]=$clasificacion->id;
                }
                
            }
            if(count($listar)>=1){
                return Clasificacion::whereIn('id',$listar)->lists('nombre','nombre');
            }else{
                return null;
            }
        }

    }
    
}