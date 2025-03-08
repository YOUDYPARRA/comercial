<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionClase extends Model
{
                    //
protected $table='configuraciones_clase';
protected $fillable=[
'id_foraneo',
'condicionante',//puesto,area etc
'condicion',//Coordinador, gerente etc
'objeto',
'subobjeto',//ademas de objeto, el subobjeto indica si debe buscar o tener parametro el documento o es un codigo muy especifico documento=> parametro de documento/otro=> codigo especifico a ejecutar para la verificar la condicxion
'clase',
'subclase',
'clasificacion',
'organizacion'
	];

        public function ScopeBuscar($query,$buscar){

        if(!is_object($buscar)){
            $objeto=(object)$buscar;
        }
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

        /*if($numero_querys==0){
            $query->where('id',0);
        }*/
        if(isset($objeto->asc)){
                $query->OrderBy($objeto->asc,'asc');
        }else if(isset($objeto->desc)){
                $query->OrderBy($objeto->desc,'desc');
        }

    }
		public function relacion(){
        return $this->hasMany('App\ConfiguracionClase','id_foraneo','id');
    }
}
