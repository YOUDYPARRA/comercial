<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AvisoSistema extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='avisos_sistema';
    protected $fillable=[
      'id_foraneo',//id de documento, proceso, u observacion.
      'id_usuario',
      'clase',//clase de proceso o documento o config
      'recurso',//url a visualizar
      'acceso',//revisado, eliminado,mostrado,pendiente en la clase AVISO; en la clase CONFIG es estatus que se busca avisar
      'dato',//aviso,observacion,ticket,seguir,documento,proceso,etc.
      'estado'
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
                    //echo $dato .'<br>';
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
                            if(is_array($objeto->$campo) ){
                                if(count($objeto->$campo)>2){
                                $query->whereIn($campo,$objeto->$campo);
                                }
                            }elseif(is_array($objeto->$campo) ){
                                if(count($objeto->$campo)==2){
                                    $query->whereBetween($campo,$objeto->$campo);
                                }
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

            if($numero_querys==0){
                $query->where('id',0);
            }
            if(isset($objeto->asc)){
                    $query->OrderBy($objeto->asc,'asc');
            }else if(isset($objeto->desc)){
                    $query->OrderBy($objeto->desc,'desc');
            }

        }//fin public function buscar
}
