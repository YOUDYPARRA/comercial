<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UomConvertion extends Model
{
    // ATRIBUTOS  DE PRODUCTO
      protected $fillable=[
 		'm_product_id',
 		'product_name',
		'value',
  		'primaria',
   		'name',
		'secundaria',
      	'secundaria_name',
       	'multiplyrate'
    ];
    protected $table = 'zascust_proy_uom_conversion';
    protected $connection = 'pgsql';
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
                            $query->where($campo,$objeto->$campo);
                        }
                    } 
                }

            }
            
        }//fin foreach buscar
        //inicio ordenar
        if(isset($objeto->asc)){
                $query->OrderBy($objeto->asc,'asc');
        }else if(isset($objeto->desc)){
                $query->OrderBy($objeto->desc,'desc');
        }
        //fin ordenar
        /*
        if($numero_querys==0){
            $query->where('id',0);

        }
        */
        
    }//fin public function buscar
}
