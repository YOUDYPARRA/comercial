<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ProductV extends Model{
    protected $fillable=[
    'value',
    'product_name',
    'description',
    'category_name',
    'brand_name',
    'uom_name',
    'c_uom_id',
    'm_product_id',
    'ad_org_id',
    'upc',
    ];

    protected $table = 'zascust_proy_product_v';
    protected $connection = 'pgsql';
    //    protected $connection = 'pgpro';

    public function ScopeBuscar($query,$buscar){
        if(!is_object($buscar)){
            $objeto=(object)$buscar;
        }
        foreach ($objeto as $key => $value) {//echo 'key:'.$key.' valor: '.$value;
            $dato = array_search($key,$this->fillable);
            $campo=$this->fillable[$dato];
                    $query->where($campo,$objeto->$campo);
            }
    }
}
