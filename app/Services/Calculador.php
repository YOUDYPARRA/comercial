<?php
namespace App\Services;
class Calculador
{
 /**
  * 
  * @param type Array
  * @return num
  */
 /*
    public function promedio(Array $array) {
      //echo 'XXXD';
      $s=array_sum($array);
      return round($s/count($array),0);
    }*/
    public function total_tiempo_respuesta($tiempo_respuesta,$promedio_anual) {
      $arr[]=$promedio_anual/365;
      $arr[]=$tiempo_respuesta;
      //print_r($arr);
      return array_product($arr);//Retorna el total en tiempo de respuesta
    }
    public function total_seguridad($tiempo_respuesta,$promedio,$porc_seguridad) {
     $monto_tiempo_respuesta=$this->total_tiempo_respuesta($tiempo_respuesta,$promedio);
          return $monto_tiempo_respuesta+($porc_seguridad/100);//Retorna PP
    }
    public function total_antcipado($tiempo_respuesta,$promedio,$porc_seguridad) {
      $stock_seguridad= $this->total_seguridad($tiempo_respuesta,$promedio,$porc_seguridad);
      $stock_tiempo_respuesta= $this->total_tiempo_respuesta($tiempo_respuesta,$promedio);
      //print_r($stock_tiempo_respuesta);
      //echo '<br>';
      return [
      'pp'=>$stock_seguridad,
      'cantidad_respuesta'=>$stock_tiempo_respuesta,
      'maximo'=>$stock_seguridad+$stock_tiempo_respuesta
      ];
      //return $stock_seguridad+$stock_tiempo_respuesta;
    } 
}