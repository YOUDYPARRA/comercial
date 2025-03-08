<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    //
    protected $dates = ['deleted_at'];
    protected $table='plantillas';
    protected $fillable=[
    'autor',//id autor
    'clase',
    'nombre',
    'plantilla',
    'observacion'
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
                        if(is_array($objeto->$campo)){
                            $query->whereIn($campo,$objeto->$campo);
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
    }//fin public function buscar
    

}