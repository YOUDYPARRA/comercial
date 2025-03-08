<?php

namespace app\Helpers;
use App\Tercero;
use Auth;
class HelperTercero
{
    public static function getOrgUsuario() {
        //if(array_key_exists('org_name', $param)){
            $objetos=Tercero::orgName(Auth::user()->org_name)->limit(1)->get();
        //}
        return $objetos[0]->org_id;
    }
    /**
    *buscar por nombre
    *
    */
    public static function getBName(array $param) {
        if(array_key_exists('nombre', $param)){
            $objetos=Tercero::name($param['nombre'])
            ->orgName($param['orgName'])
            ->get();
        }
        return $objetos;
    }
}