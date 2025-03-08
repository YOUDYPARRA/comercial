<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
                    //
      protected $table='roles';
      protected $fillable=[
      'id_foraneo',//SE RELACIONA CON LA SIGUIENTE CONDICION
      'condicion',//CAMPO DEUSER Q SE CONDICIONA, PUESTO,AREA, ETC
      'clase',//CONFIG; CND
      'condicionante',//COORDINADOR, GERENTE, ETC
      'etiqueta',//SOLO PARA LA CLASE CONFIG, Y DEBE LLVAR EL NOMBRE CON EL Q SE IDENTIFICA PARA ASIGNAR ESTE ROL A USUARIO(S)
       ];
       public function ScopeBuscar($query,$buscar){

          if(!is_object($buscar)){
              $objeto=(object)$buscar;
          }
          //dd($buscar);
          $numero_querys='0';
          foreach ($objeto as $key => $value) {
              $dato='';
              $dato = array_search($key,$this->fillable);
              if(is_numeric($dato)){//VERIFICAR QUE EL CAMPO DE BUSQUEDA SE ENCUENTRE EN OBJETO FILLABLE
                  $campo=$this->fillable[$dato];
                  //dd($dato);
                  if(is_array($objeto->$campo)){
                      $comodin=false;
                  }else{
                      $comodin=strpos($objeto->$campo,'*');
                  }
                  if(trim($objeto->$campo!='') ){//verificar q el campo de busqueda contenga caracteres
                      $numero_querys=$numero_querys+1;
                      if($comodin!==false){
                          $string=  str_replace("*", "%", $objeto->$campo);
                          $query->where($campo,'like',$string);
                      }else{
                          if(is_array($objeto->$campo) && (count($objeto->$campo)>2) ){
                              $query->whereIn($campo,$objeto->$campo);
                          }elseif(is_array($objeto->$campo) && (count($objeto->$campo)==2) ){
                              $query->whereBetween($campo,$objeto->$campo);

                          }else{
                              //echo 'No es arr-';
                              if(strpos($objeto->$campo, '!')!==false){
                                //  echo 'No es arr-'.substr($objeto->$campo,1);
                                 $query->where($campo,'<>',substr($objeto->$campo,1));
                              }else{
                                 $query->where($campo,$objeto->$campo);
                              }

                          }
                      }
                  }

              }

          }//fin foreach


          if(isset($objeto->asc)){
                  $query->OrderBy($objeto->asc,'asc');
          }else if(isset($objeto->desc)){
                  $query->OrderBy($objeto->desc,'desc');
          }

      }//fin public function buscar
      public function condiciones(){
          return $this->hasMany('App\Rol','id_foraneo','id');
      }

}
