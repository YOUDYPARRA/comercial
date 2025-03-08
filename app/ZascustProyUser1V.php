<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ZascustProyUser1V extends Model
{
    // VISTA PARA VERIFICAR NUMERO DE CONTRA E ID DE POSTGRESS
    
     protected $table = 'zascust_proy_user1_v';
     protected $connection = 'pgsql';
     protected $fillable=[
     'ad_org_id', 
     'user1_id',
     'value',//numero de contrato
     'name'//nombre del tercero
     ];

     public function ScopeBuscar($query,$buscar){

        if(!is_object($buscar)){
            $objeto=(object)$buscar;
        }
        foreach ($objeto as $key => $value) {
            //echo 'key:'.$key.' valor: '.$value;
            $dato = array_search($key,$this->fillable);
            $campo=$this->fillable[$dato];
            $comodin=strpos($objeto->$campo,'*');
            if(trim($objeto->$campo!='')){
                if($comodin!==false){
                    $string=  str_replace("*", "%", $objeto->$campo);
                    $query->where($campo,'like',$string);
                }else{
                    $query->where($campo,$objeto->$campo);
                }
                
            }
            
        }
	}

}
