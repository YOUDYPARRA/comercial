<?php
namespace app\Helpers;
use App\Helpers\Contracts\RolContract;
use App\Helpers\HelperUtil;
use App\Rol;
class HelperRol implements RolContract
{
    public function crear($x)
    {
      return $this->creaRol($x);
    }
    private function creaConfig($org,$etiq){
      $rol=new Rol;
      $rol->clase='CONFIG';//CONFIG; CND
      $rol->condicion='org_name';//CAMPO DEUSER Q SE CONDICIONA, PUESTO,AREA, ETC
      $rol->condicionante=$org;//COORDINADOR, GERENTE, ETC
      $rol->etiqueta=$etiq;
      $rol->id_foraneo='';//SE RELACIONA CON LA SIGUIENTE CONDICION
      $rol->save();
      return $rol;
    }
    private function creaCondicion($condicion,$condicionante,$id){
      $rol=new Rol;
          $rol->clase='CND';//CONFIG; CND
          $rol->id_foraneo=$id;//SE RELACIONA CON LA SIGUIENTE CONDICION
          $rol->condicion=$condicion;//CAMPO DEUSER Q SE CONDICIONA, PUESTO,AREA, ETC
          $rol->condicionante=$condicionante;//COORDINADOR, GERENTE, ETC
          $rol->etiqueta='';//COORDINADOR, GERENTE, ETC
          $rol->save();
          return $rol;
    }
    private function creaRol(Array $array){
      $id='';
      $o=$this->creaConfig(
        $array['org_name'],
        $array['etiqueta']);
      $id=$o->id;
      if(!empty($array['puesto'])){
          $this->creaCondicion('puesto',$array['puesto'],$id);
        }
      if(!empty($array['area'])){
          $this->creaCondicion('area',$array['area'],$id);
        }
      if(!empty($array['departamento'])){
          $this->creaCondicion('departamento',$array['departamento'],$id);
        }
      if(!empty($array['lugar_centro_costo'])){
          $this->creaCondicion('lugar_centro_costo',$array['lugar_centro_costo'],$id);
        }
      return $id;
    }

}
