<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyUser extends Model
{
    //
    protected $fillable=[
    'ad_org_id',
    'ad_user_id',
    'c_bpartner_id',
    'name'
    ];

    protected $table = 'zascust_proy_user_v';
    protected $connection = 'pgsql';
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
