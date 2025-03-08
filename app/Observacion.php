<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='observaciones';
    protected $fillable=[
    'tipo_documento',
    'id_producto',
    'comentario'
   ];
   
   public function scopeBuscar($query,$array_buscar)
    {
        if(!is_object($array_buscar)){
            $objeto=(object)$array_buscar;
        }
        foreach ($objeto as $key => $value) {
            //echo 'key:'.$key.' valor: '.$value;
            $dato = array_search($key,$this->fillable);
            $campo=$this->fillable[$dato];
            //echo 'En este Campo ->'.$campo. ' buscar: '.$objeto->$campo;
            $comodin=strpos($objeto->$campo,'*');
            if(trim($objeto->$campo!='')){//validar que campos han sido llenados o usados.
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
