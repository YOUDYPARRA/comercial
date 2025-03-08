<?php

namespace app\Helpers;
use App\Estado;

class HelperEstado
{

  protected $clase;
  protected $subclase;
  protected $estatus;
  protected $organizacion;
  protected $autor;
  public function getProcesoAttribute(){
          //ESTE VERIFICA EL USUARIO Y EL DOCUMENTO, PARA COLOCAR EL FORMULARIO DE PROCESAR;
      //echo 'xxx';
          $condicionante='';
          $condicion='';
          $procesar=null;
          $estados=$this->getEstados();
          //print_r($estados);
          foreach ($estados as $value) {
              $condicionante=$value->condicionante;
              $condicion=$value->condicion;
              //echo $value->id;
              if(empty($condicion)){
                  //echo 'Entre por condicion vacia';
                  if(auth()->user()->$condicionante==$this->autor){
                      $procesar=true;
                  }
              }else if(auth()->user()->$condicionante==$condicion){
                  //echo '1'. auth()->user()->$condicionante;
                  $mas_condiciones='';
                  $contar_condiciones_validas='';
                  $total_mas_condiciones='';
                  foreach ($value->avisos as $avisos_condiciones) {
                      # code...recupera bandera AVI
                      //echo $avisos_condiciones->id;
                      $mas_condiciones[]=array('condicionante'=>$avisos_condiciones->condicionante,'condicion'=>$avisos_condiciones->condicion);
                      foreach ($avisos_condiciones->avisos as $condiciones) {
                          //echo $condiciones->id;
                          # code...RECUPERA bandera CND
                          $mas_condiciones[]=array('condicionante'=>$condiciones->condicionante,'condicion'=>$condiciones->condicion);
                      }
                  }
                  if(count($mas_condiciones)>1){//VER SI HAY MAS CONDICIONES
                      $total_mas_condiciones=count($mas_condiciones);
                      $contar_mas_condiciones=0;
                      print_r($mas_condiciones);
                      foreach ($mas_condiciones as $otra_condicion) {
                          $condicionante=$otra_condicion['condicionante'];
                          $condicion=$otra_condicion['condicion'];
                          if(auth()->user()->$condicionante==$condicion){
                               $contar_condiciones_validas++;
                          }
                      }
                      if($total_mas_condiciones==$contar_condiciones_validas){
                          $procesar=true;
                      }
                  }else{
                          $procesar=true;
                  }
              }
          }
          //echo($procesar);
          return $procesar;
  }
  public function getProcesosAttribute(){
          //DEBE REGRESAR UN ARREGLO DE ESTATUS q FALTAN PARA EL DOCUMENTO ACTUAL
          //TOMA EL ESTADO ACTUAL PARA REGRESAR LOS SIGUIENTES ESTADOS
          $x=null;
          $estado_actual=null;
          $estado_actual=null;
          $par_estado_actual=null;
          $documento_condicionado=false;
          $estado_actual =$this->getEstados();//OBTIENE EL ESTATUS ACTUAL PARA COLOCAR EN EL FORM
          //print_r($estado_actual);
          //GENERAR ARREGLO CON ESTE ESTATUS OBTENIDO, ANTES DE METER EN EL ARREGLO, EVALUAR LA CONDICION DE DOCUMENTO
          foreach ($estado_actual as $eval) {//INICIO COMPROBAR CONDICIONANTE EN EL DOCUMENTO
              $documento_condicionante_eval=$eval->dcondicionante;

              if(!empty($documento_condicionante_eval)){
                  //echo $documento_condicionante_eval;
                  $documento_condicionado=true;
              }
          }//FIN COMPROBAR CONDICIONANTE EN EL DOCUMENTO
          foreach ($estado_actual as $value) {
              /*echo $value->dcondicion;
              echo $value->dcondicionante;*/
              if($documento_condicionado){//EL DOCUMENTO ESTÁ CONDICIONADO
                 $documento_condicion=$value->dcondicion;
              $documento_condicionante=$value->dcondicionante;
              //echo $this->dato;
              //echo $documento_condicionante;
              //$arr=$this->toArray();
              //print_r($arr);
              //echo $arr[$documento_condicionante];
              //dd($this->$documento_condicionante);
          //echo $value->id.'->'.$this[$documento_condicionante];

                  if($this->dato==$documento_condicion){
                      //echo 'SI es igual AL REQ DE DOCUMENTO';
                      $x[$value->aprobacion]=$value->etiqueta_aprobacion;
                      $x[$value->desaprobacion]=$value->etiqueta_desaprobacion;
                  }
              }else{
                      //echo 'NOOO es igual AL REQ DE DOCUMENTO';
                  $x[$value->aprobacion]=$value->etiqueta_aprobacion;
                  $x[$value->desaprobacion]=$value->etiqueta_desaprobacion;
              }
          }

          return $x;
      }
  private function getEstados(){
      /*
      echo $this->subclase;
      echo $this->clase;
      echo $this->estatus;
      echo $this->organizacion;
      echo auth()->user()->puesto;
      */
      return /*DB::table('estados')
          ->where('estado',$this->estatus)
          ->where('clase',$this->clase)
          ->where('organizacion',$this->organizacion)
          ->get();*/
          Estado::where('estado',$this->estatus)
          ->where('subclase',$this->subclase)
          ->where('clase',$this->clase)
          ->where('organizacion',$this->organizacion)
          ->get();
  }

}
