<?php
namespace app\Helpers;
use App\Helpers\Contracts\ConfiguracionClaseContract;
use App\Helpers\HelperUtil;
use App\ConfiguracionClase;
class ConfiguraClase implements ConfiguracionClaseContract
{
  /**
  **@objeto es el proceso a evaluar, cotizacion, compra, venta, prestamo, requisicion, reporte etc
  **@documento pertenece al documento de el proceso a verificar
  **
  **/
    public function configuracion($objeto,$documento)
    {
      $clase='';
      //HelperUtil::log(['$objeto :'.count($objeto)=>$objeto]);
      //consultar los procesos generados en la alta
      $conf=$this->getConfiguraciones($objeto);
      //HelperUtil::log(['$conf :'.count($conf)=>$conf]);
      $clases=$this->clases($conf);
//      HelperUtil::log(['$clases :'.count($clases)=>$clases]);
      //comparativa de documento con lo obtenido de la consulta
      $clase=$this->setClase($clases,$documento);
  //    HelperUtil::log(['$clase:'=>$clase]);
      return $clase;
    }
    private function setClase(Array $clase,$documento){//encontrar la clase
      $clasificacion='';
      $tot=count($clase);
      $recorrido=0;
        foreach ($clase as $arr) {
        $recorrido++;

      //    HelperUtil::log(['$arr :'.count($arr)=>$arr]);
          $arr_val=[];
          foreach ($arr as $cond) {
              //evaluar cada condicion
    //        HelperUtil::log(['$cond :'.count($cond)=>$cond]);
              $arr_val[]=$this->documentoOtro($cond,$documento);//se obtiene el array de calificaciones para el elemento
          }//fin arreglo de objetos condicion
          //HelperUtil::log(['$arr_val :'.count($arr_val)=>$arr_val]);
          //HelperUtil::log(['$recorrido :'.count($recorrido)=>$recorrido]);
              if(in_array('false',$arr_val) || (count($arr_val)==0) ){
                //si hay un falso, indicar que esta clasificacion no va
                if($tot==$recorrido){
                  return $clasificacion=false;
                }
              }else{
                //todo el arreglo es verdadero, indicar la clase y retonar esta funcion
                  return $cond->clasificacion;
              }

        }//fin arreglo principal
        //return $clasificacion;
    }
    private function documentoOtro($c,$documento){/*GENERA ARREGLO DE TRUE FALSE, SEGUN SEAN LAS CONDICIONES CONFIGURADAS*/
      $condicion=$c->condicion;//Coordinador, gerente, ingeniero, administrativo etc
      $condicionante=$c->condicionante;//puesto,area,auth()->user()->org_name, campo, atributo etc,
      $valido='';
      if($c->subobjeto=='documento'){
        if($documento->$condicionante==$condicion){
          $valido='true';
        }else{
          $valido='false';
        }
      }elseif($c->subobjeto=='otro'){//codigo a ejecutar
        //HelperUtil::log(['ejecutar Codigo :'.count('ejecutar Codigo')=>'ejecutar Codigo']);
        //HelperUtil::log(['$condicionante :'.count($condicionante)=>$condicionante,'condicion'=>$condicion]);
        /*ANTES DE EVALUAR LA CONDICION, DEBE VERIFICAR SI REQUERE
        OBTENER LA CONDICIONANTE UN VALOR MAS PRECISO*/
        $rsl_condicionante=$this->rslCondicionante($condicionante);
        if($rsl_condicionante==$condicion){
          //HelperUtil::log(['codigo verdadero :'.count('codigo verdadero')=>'codigo verdadero']);
          $valido='true';
        }else{
          //HelperUtil::log(['codigo false :'.count('codigo false')=>'codigo false']);
          $valido='false';
        }

      }
      return $valido;
    }
    private function rslCondicionante($condicionante){/* OBTIENE LA MANERA DE VALIDAR O TRATAR LA CONDICIONANTE, DEBE DEVOLVER EL PARAMETRO YA EJECUTADO EN LUGAR DE LA CONDICIONANTE. SOLO CUANDO LA CONDICIONANTE TRAE CODIDO PARA EJECUTAR*/
      $resultado='';
      $arr_condicionante=explode('->', $condicionante);
      //HelperUtil::log(['$arr_condicionante :'.count($arr_condicionante)=>$arr_condicionante]);
      if(count($arr_condicionante)>1){
        switch ($arr_condicionante[0]) {
          case 'auth()':
          $cnd=$arr_condicionante[2];
            return auth()->user()->$cnd;
            break;
          default:
            # code...
            break;
        }

      }elseif(count($arr_condicionante)==1){}

    }
    private function getConfiguraciones($objeto){//obtiene los procesos segun el documento y la consulta
      $configuracion='';
      $configuracion=ConfiguracionClase::buscar(['objeto'=>$objeto,'clase'=>'configuracion'])->get();
      return $configuracion;
    }
    private function clases($configuraciones){//obtiene los procesos segun el documento y la consulta
      $validaciones=[];
      if(!empty($configuraciones) ){
        foreach ($configuraciones as $value) {
          //por cada clase debe verificar sus relaciones y agruparlas para retornar
          $rel=$this->relacionado($value);
          $validaciones[]=$this->atributos($rel,$value);
        }
      }
      return $validaciones;
    }
    private function relacionado($obj){//Busca si existen relaciones de esta configuracion
      return $obj->relacion()->get();
    }
    private function atributos($rel,$obj){//regresa un solo arreglo con las reglas de validacion de clases
      $rsl=[];
          //HelperUtil::log(['$value :'.count($value)=>$value]);
        
        $rsl[]=(object)
        //$rsl[]=
         [
          'id'=>$obj->id,
          'clasificacion'=>$obj->clasificacion,
          'condicion'=>$obj->condicion,
          'condicionante'=>$obj->condicionante,
          'subobjeto'=>$obj->subobjeto
        ];
      foreach ($rel as $v) {
        if(count($rel)>0){
          //$rsl[]=
          $rsl[]=(object)
           [
            'id'=>$v->id,
            'clasificacion'=>$v->clasificacion,
            'condicion'=>$v->condicion,
            'condicionante'=>$v->condicionante,
            'subobjeto'=>$v->subobjeto
          ];
        }
      }
      //HelperUtil::log(['$rsl :'.count($rsl)=>$rsl]);
      return $rsl;
    }

}
