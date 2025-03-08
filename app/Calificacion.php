<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='calificaciones';
    protected $fillable=[
    'id_producto',
    'nombre_tipo',
    'ruta_siguiente',
    'ruta_califico',
    'calificacion',
    'iniciales'
   ];

    public function compra()
    {
        return $this->hasOne('App\Compra','id','id_producto');
    }

   public function scopeIndexBuscar($query,$array_buscar)
    {
        foreach ($array_buscar as $key => $value) {
            $dato = array_search($key,$this->fillable);
            $campo=$this->fillable[$dato];
            $comodin=strpos($value,'*');
            if(trim($value!='')){//validar que campos han sido llenados o usados.
                if($comodin!==false){
                    $string=  str_replace("*", "%", $request->$campo);
                    $query->where($campo,'like',$string);
                }else{
                    $query->where($campo,$value);
                }
                
            }
            
        }
    }
}
