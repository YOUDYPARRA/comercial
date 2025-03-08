<?php
namespace app\Helpers;
use App\Helpers\Contracts\AvisosSistemaContract;
use App\Helpers\HelperUtil;
use App\User;
use App\Permiso;
use App\AvisoSistema;
class AvisosSistema implements AvisosSistemaContract
{
    public function avisa($x)
    {
   /* ALTA DE AVISO
   'clase'=>'AVISO',
   id_usuario'=>$objeto->id_usuario,
   'recurso'=>'avisos_sistema.store',
   'acceso'=>'<a href=/home>ir</a>',
   'id_foraneo'=>$objeto->id], Generar href para el campo recurso
   $x['clase']='AVISO';
   */
    	//verificar q usuario tiene configurado aviso
        $avisos_configurados=AvisoSistema::buscar([
        	'recurso'=>$x['recurso'],
        	'clase'=>'CONFIG',
        	'estado'=>$x['estado']
        ])->get();
        //HelperUtil::log(['$avisos_configurados :'.count($avisos_configurados)=>$avisos_configurados]);
    		foreach ($avisos_configurados as $key => $value) {
          if($this->permiso($value->id_usuario,$x['recurso'])){//Verificar que tiene permiso
            /*$x['recurso']=$x['acceso'];
            $x['acceso']=$x['descripcion'];
            $x['id_usuario']=$value->id_usuario;*/
            $us=$value->id_usuario;
            $arrayAvisoSistema = array(
              'recurso' =>$x['acceso'] ,
              'acceso' =>$x['descripcion'] ,
              'id_usuario' =>$us,
              'id_foraneo' =>$value->id,
              'clase' =>'AVISO',
              'dato' =>$x['dato']
            );

            HelperUtil::log(['$avisos Para USER :'.count($arrayAvisoSistema)=>$arrayAvisoSistema]);
    			     $objeto=  AvisoSistema::create($arrayAvisoSistema);
          }
          /*else
          {//generar aviso, sin acceso al recurso
            if($this->usuario($value->id_usuario) ){
              $x['recurso']='';
              $objeto=AvisoSistema::create($x);
            }
          }
          */
    		}
    }
    private function permiso($id_usuario,$recurso){
      $permitir=false;
      $user='';
      $user=$this->usuario($id_usuario);
      if($user){
        $permiso='';
        $permiso=Permiso::
          idUsuario($id_usuario)
          ->recurso($recurso)
          ->first();
     //     HelperUtil::log([$id_usuario=>$recurso,count($permiso)]);
        if(!empty($permiso)){
            $permitir=true;
          }
      }
        return $permitir;
    }
    private function setAviso($arr){
      foreach ($set as $key => $value) {
        // code...
      }
    }
    private function usuario($id_usuario){
      $es=false;
      $user='';
      $user=User::find($id_usuario);
      if(!empty($user)){
        $es=true;
      }
      return $es;
    }
}
