<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlmacenStock extends Model
{
    //
    protected $table='almacenes_stock';
    //protected $connection = 'mypro';
    public $timestamps = false;
    protected $fillable=[
	'punto_pedido',
    'codigo_proovedor',
    'id_insumo',
    'm_product_id',
    'calcular',
    'org_name',
    'aviso',
    'tiempo_respuesta',
    'porcentaje_seguridad',
    'almacen',
    'id_warehouse',
    'clase',
    'maximo'
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