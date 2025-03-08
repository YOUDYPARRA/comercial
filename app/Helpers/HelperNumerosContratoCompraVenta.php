<?php

namespace app\Helpers;
use App\ContratoCompraVenta;
class HelperNumerosContratoCompraVenta
{
    public static function listContrato() {
    	$list=null;
    	$rsl[0]='';
        $arr=ContratoCompraVenta::select('numero_contrato_compra_venta')->where('numero_contrato_compra_venta','<>','')->get();
        foreach ($arr as $value) {
        	$rsl[$value->numero_contrato_compra_venta]=$value->numero_contrato_compra_venta;
        }
        return $rsl;
        //('numero_contrato_compra_venta','numero_contrato_compra_venta');
    }
    
}