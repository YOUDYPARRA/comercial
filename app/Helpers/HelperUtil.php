<?php

namespace app\Helpers;
use Carbon\Carbon;
use URL;
use App\Rol;
use App\Estado;
use Illuminate\Support\Facades\Log;
class HelperUtil
{
    /**
    *$Campo ej: nombre_campo
    *$etq, si viene declarada, se coloca como etiqueta de href
    */
    public static function lnkOr($arr,$campo,$etq='') {
            $url='';
            if(empty($etq)){
                $cmp=explode('_', $campo);
                foreach ($cmp as $v) {
                    $etq= $etq.' '.$v;
                }
                $etq=strtoupper($etq);
            }
            if(isset($arr['asc']) && ( $campo==$arr['asc'])){

                    unset($arr['asc']);
                    $arr['desc']=$campo;
                    $str=HelperUtil::serialArrUrl($arr);
                    $url='<a href="'.$str.'" type="button" class="btn btn-success btn-sm" title="ORDENAR DESCENDENTE"><i class="material-icons">expand_more</i>'.$etq.'</a>';


            }else if((isset($arr['desc']) )&& ( $campo==$arr['desc'])){

                    unset($arr['desc']);
                    $arr['asc']=$campo;
                    $str=HelperUtil::serialArrUrl($arr);
                    $url='<a href="'.$str.'" type="button" class="btn btn-success btn-sm" title="ORDENAR ASCENDENTE"><i class="material-icons">expand_less</i>'.$etq.'</a>';


            }else{
                //echo '..';
                if(isset($arr['asc'])){
                    $arr['asc']=$campo;
                    $str=HelperUtil::serialArrUrl($arr);
                    $url='<a href="'.$str.'" type="button" class="btn btn-primary btn-sm" title="ORDENAR POR ESTE CAMPO ASCENDENTE"><i class="material-icons">expand_more</i>'.$etq.'</a>';
                }else{
                    $arr['desc']=$campo;
                    $str=HelperUtil::serialArrUrl($arr);
                    $url='<a href="'. $str.' " type="button" class="btn btn-info btn-sm" title="ORDENAR POR ESTE CAMPO DESCENDENTE"><i class="material-icons">expand_less</i>'.$etq.'</a>';

                }
                //$arr_cmp=['asc'=>$campo];
            }
            return $url;
    }

    public static function serialArrUrl(Array $arr) {

        $l=0;
        $str='';
        foreach ($arr as $key => $value) {
            # code...
            $l++;
            if(count($arr)==$l){
                $str=$str.$key.'='.$value;
            }else{
                $str=$str.$key.'='.$value.'&';
            }
        }
        return HelperUtil::getSitio().'?'.$str;
    }
    public static function getHoy() {

        return Carbon::now();
    }
    public static function getSucursales(){
        return ['MER'=>'MER','MX'=>'MX','BJ'=>'BJ','GDL'=>'GDL','MTY'=>'MTY'];
    }
    public static function getResueltoPor(){
        return ['LLAMADA'=>'LLAMADA',
                'LABORATORIO'=>'LABORATORIO',
                'VISITA'=>'VISITA',
                'CANCELADO'=>'CANCELADO'
              ];
    }

    public static function getSitio(){
        return last(explode('/', URL::current()));
        //return URL::current();
    }
    /**
     * Regresa un Array
     *
     * **/
    public static function getPuestos()
    {   //return auth()->user()->id;
        if(!auth()->guest())
        {
            return ['ALMACENISTA'=>'ALMACENISTA',
                    'ASESOR'=>'ASESOR',
                    'ASISTENTE ASUNTOS REGULATORIOS'=>'ASISTENTE ASUNTOS REGULATORIOS',
                    'ASISTENTE DE LICITACIONES'=>'ASISTENTE DE LICITACIONES',
                    'AUXILIAR ADMINISTRATIVO'=>'AUXILIAR ADMINISTRATIVO',
                    'AUXILIAR CRED Y COBRANZA'=>'AUXILIAR CRED Y COBRANZA',
                    'COORDINADOR DE CONTRATOS'=>'COORDINADOR DE CONTRATOS',
                    'COORDINADOR DE SERVICIOS'=>'COORDINADOR DE SERVICIOS',
                    'DIRECTOR ADMON Y FINANZAS'=>'DIRECTOR ADMON Y FINANZAS',
                    'DIRECTOR COMERCIAL'=>'DIRECTOR COMERCIAL',
                    'DIRECTOR GENERAL'=>'DIRECTOR GENERAL',
                    'DIRECTOR MERCADOTECNIA'=>'DIRECTOR MERCADOTECNIA',
                    'EJECUTIVO DE VENTAS'=>'EJECUTIVO DE VENTAS',
                    'ESPECIALISTA DE LICITACIONES'=>'ESPECIALISTA DE LICITACIONES',
                    'ESPECIALISTA DE PRODUCTO'=>'ESPECIALISTA DE PRODUCTO',
                    'GERENTE DE OPERACIONES'=>'GERENTE DE OPERACIONES',
                    'GERENTE CADENA DE SUMINISTRO'=>'GERENTE CADENA DE SUMINISTRO',
                    'GERENTE DE VENTAS'=>'GERENTE DE VENTAS',
                    'GERENTE DE VENTAS GDL'=>'GERENTE DE VENTAS GDL',
                    'GERENTE DE VENTAS GOBIERNO'=>'GERENTE DE VENTAS GOBIERNO',
                    'GERENTE TÉCNICO ADMINISTRATIVO'=>'GERENTE TÉCNICO ADMINISTRATIVO',
                    'INGENIERO DE SERVICIOS'=>'INGENIERO DE SERVICIOS',
                    'JEFE DE ASUNTOS REGULATORIOS'=>'JEFE DE ASUNTOS REGULATORIOS',
                    'JEFE DE ALMACEN'=>'JEFE DE ALMACEN',
                    'JEFE DE COMPRAS'=>'JEFE DE COMPRAS',
                    'MENSAJERO'=>'MENSAJERO',
                    'SECRETARIA'=>'SECRETARIA'];

        }else
        {
            return [];
        }


    }//fin funcion
    public static function getAreas()
    {   //return auth()->user()->id;
        if(!auth()->guest())
        {
            return ['CADENA DE SUMINISTRO'=>'CADENA DE SUMINISTRO',
                    'ADMINISTRACION Y FINANZAS'=>'ADMINISTRACION Y FINANZAS',
                    'DIRECCION GENERAL'=>'DIRECCION GENERAL',
                    'JURIDICO'=>'JURIDICO',
                    'APLICACIONES'=>'APLICACIONES',
                    'MERCADOTECNIA'=>'MERCADOTECNIA',
                    'RECURSOS HUMANOS'=>'RECURSOS HUMANOS',
                    'COMERCIAL'=>'COMERCIAL',
                    'PROYECTOS'=>'PROYECTOS',
                    'SERVICIO TECNICO'=>'SERVICIO TECNICO'];

        }else
        {
            return [];
        }


    }//fin funcion
    public static function getDepartamentos()
    {   //return auth()->user()->id;
        if(!auth()->guest())
        {
            return [
                    'ADMINISTRACION VENTAS'=>'ADMINISTRACION VENTAS',
                    'ALMACEN'=>'ALMACEN',
                    'APLICACIONES'=>'APLICACIONES',
                    'COMPRAS/IMPORTACIONES'=>'COMPRAS/IMPORTACIONES',
                    'CREDITO Y COBRANZA'=>'CREDITO Y COBRANZA',
                    'DIRECCION DE ADMIN Y FINANZAS'=>'DIRECCION DE ADMIN Y FINANZAS',
                    'DIRECCION GENERAL'=>'DIRECCION GENERAL',
                    'JURIDICO'=>'JURIDICO',
                    'MERCADOTECNIA'=>'MERCADOTECNIA',
                    'OPERACIONES MEDICINA MOLECULAR'=>'OPERACIONES MEDICINA MOLECULAR',
                    'OPERACIONES'=>' OPERACIONES',
                    'OPERACIONES CODONICS'=>' OPERACIONES CODONICS',
                    'OPERACIONES RESONANCIA MAG'=>' OPERACIONES RESONANCIA MAG',
                    'OPERACIONES (US/Thinprep)'=>'OPERACIONES (US/Thinprep)',
                    'OPERACIONES GDL'=>'OPERACIONES GDL',
                    'OPERACIONES MASTOGRAFIA/DENSITOMETRIA'=>'OPERACIONES MASTOGRAFIA/DENSITOMETRIA',
                    'OPERACIONES MTY'=>'OPERACIONES MTY',
                    'OPERACIONES MRD'=>'OPERACIONES MRD',
                    'OPERACIONES RAYOS X'=>'OPERACIONES RAYOS X',
                    'OPERACIONES TOMOGRAFIA'=>'OPERACIONES TOMOGRAFIA',
                    'REGULATORIO'=>'REGULATORIO',
                    'TÉCNICO ADMINISTRATIVO'=>'TÉCNICO ADMINISTRATIVO',
                    'VENTAS BAJIO'=>'VENTAS BAJIO',
                    'VENTAS GDL'=>'VENTAS GDL',
                    'VENTAS GOBIERNO'=>'VENTAS GOBIERNO',
                    'VENTAS CONSUMIBLES'=>'VENTAS CONSUMIBLES',
                    'VENTAS MTY'=>'VENTAS MTY',
                    'VENTAS PRIVADO'=>'VENTAS PRIVADO'
                  ];

        }else
        {
            return [];
        }


    }//fin funcion
    public static function getCentrosCostos()
    {   //return auth()->user()->id;
        if(!auth()->guest())
        {
            return [
            'CADENA DE SUMINISTRO,011',
            'ALMACEN'=>'111',
            'REGULATORIO'=>'112',
            'COMPRAS/IMPORTACIONES'=>'113',
            'ADMINISTRACIONS Y FINANZAS'=>'003',
            'DIRECCION DE ADMIN Y FINANZAS'=>'030',
            'CONTABILIDAD'=>'031',
            'CREDITO Y COBRANZA'=>'032',
            'SISTEMAS Y TELEFONIA'=>'033',
            'DIRECCION GENERAL'=>'002',
            'JURIDICO'=>'009',
            'APLICACIONES'=>'008',
            'MERCADOTECNIA'=>'005',
            'MERCADOTECNIA'=>'050',
            'MERCADOTECNIA'=>'051',
            'MERCADOTECNIA'=>'052',
            'MERCADOTECNIA'=>'053',
            'RECURSOS HUMANOS'=>'010',
            'RECURSOS HUMANOS'=>'101',
            'RECURSOS HUMANOS'=>'102',
            'MENSAJERIA'=>'103',
            'INTENDENCIA'=>'104',
            'COMERCIAL'=>'004',
            'VENTAS PRIVADO'=>'040',
            'ADMINISTRACION VENTAS'=>'041',
            'VENTAS PRIVADO'=>'042',
            'VENTAS CONSUMIBLES'=>'046',
            'VENTAS GDL'=>'043',
            'VENTAS GOBIERNO'=>'044',
            'VENTAS MTY'=>'045',
            'VENTAS PRIVADO'=>'046',
            'VENTAS BAJIO'=>'047',
            'PROYECTOS'=>'006',
            'SERVICIO TÉCNICO'=>'007',
            'SERVICIO TECNICO'=>'007',
            'OPERACIONES'=>'070',
            'TÉCNICO ADMINISTRATIVO'=>'070',
            'OPERACIONES CODONICS'=>'071',
            'OPERACIONES RESONANCIA MAG'=>'072',
            'OPERACIONES TOMOGRAFIA'=>'073',
            'OPERACIONES (US/Thinprep)'=>'074',
            'OPERACIONES GDL'=>'043',
            'OPERACIONES MASTOGRAFIA/DENSITOMETRIA'=>'075',
            'OPERACIONES RAYOS X'=>'076',
            'OPERACIONES MRD'=>'077',
            'OPERACIONES MTY'=>'077',
            'OPERACIONES MEDICINA MOLECULAR'=>'071'
];

        }else
        {
            return [];
        }


    }//fin funcion
    public static function log($log){
        Log::info(json_encode($log).PHP_EOL );
    }
    public static function getFechaBusca($fechas){
      $fecha=false;
      $arrFecha=explode('-',$fechas);
      if(count($arrFecha)==6){//dos fechas
        if(HelperUtil::soloNumeros($arrFecha)){
          $fecha=6;
        }
      }else if(count($arrFecha)==3){//Si y solo si es una fecha
        if(HelperUtil::soloNumeros($arrFecha)){
          $fecha=1;
        }
      }
      return $fecha;
    }
    public static function dosFechas($fechas){
      $fecha=false;
      $arrFecha=explode('-',$fechas);
      if(count($arrFecha)==6){//dos fechas
        $fecha=array(
        $arrFecha[2].'-'.
        $arrFecha[1].'-'.
        $arrFecha[0],
        $arrFecha[5].'-'.
        $arrFecha[4].'-'.
        $arrFecha[3]);
      }
      return $fecha;
    }
    public static function dosFechasArr($fechas){
      $fecha=false;
      $arrFecha=explode('-',$fechas);
      if(count($arrFecha)==6){//dos fechas
        $fecha=array(
        $arrFecha[0].'-'.
        $arrFecha[1].'-'.
        $arrFecha[2],
        $arrFecha[3].'-'.
        $arrFecha[4].'-'.
        $arrFecha[5]);
      }
      return $fecha;
    }
    private static function soloNumeros(Array $arr){
      $numerico=true;
      foreach ($arr as $v) {
        if(!is_numeric($v)){
          $numerico=false;
        }
      }
      return $numerico;
    }
  /*  public static function getTipoBuscar($condicionante){
    $arrbsc_coma='';
    $arrbsc_entre='';
    $arrbsc_coma=explode(',',$condicionante);
    $arrbsc_entre=explode('-',$condicionante);
    $rsl='';
   if(count($arrbsc_coma)>=2 ){
        $rsl=$arrbsc_coma;
    }elseif(count($arrbsc_entre)==2){
        $rsl=$arrbsc_entre;
        //$rsl=$this->getCampo($condicion,$arrbsc_entre,$clase,$get);
    }else{
        $rsl=$condicionante;
        //$rsl=$this->getCampo($condicion,$condicionante,$clase,$get);
    }
    return $rsl;
}*/
    public static function buscarMas($condicionante){
        //$arrbsc_coma='';
        //$arrbsc_entre='';
        $arrbsc_coma=explode('+',$condicionante);
        //$arrbsc_entre=explode('-',$condicionante);
        $rsl='';
        //LARAVEHelperUtil::log(['$arrbsc_coma'=>$arrbsc_coma]);
       if(count($arrbsc_coma)>=2 ){
            $rsl=$arrbsc_coma;
        }elseif(count($arrbsc_coma)==1 && (!empty($condicionante)) ){
          $rsl=$condicionante;
        }
        /*elseif(count($arrbsc_entre)==2){
            $rsl=$arrbsc_entre;
            //$rsl=$this->getCampo($condicion,$arrbsc_entre,$clase,$get);
        }else{
            $rsl=$condicionante;
            //$rsl=$this->getCampo($condicion,$condicionante,$clase,$get);
        }*/
        return $rsl;
    }
    public static function hayMas($condicionante){
        $hay=false;
        $pos = strpos($condicionante, '+');
          if ($pos === false) {
              $hay=false;
          } else {
              $hay=true;
          }
          return $pos;
    }
    public static function estados() {
      $objeto=[];

      //$objeto=Estado::select('estado')->where('estado','!=','')->orderBy('estado','asc')->get();
      $objeto=Estado::lists('estado','estado');
      return $objeto;

    }
    public static function roles() {
      $arr=[];
        //return Rol::lists('etiqueta','id');
        $r=Rol::buscar(['clase'=>'CONFIG'])->get();
        foreach ($r as $value) {
          /*$rol['etiqueta']=$value->etiqueta;
          $rol['id']=$value->id;*/
          $arr[$value->id]=$value->etiqueta;
        }
        //dd($arr);
        return $arr;

    }
}
