<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TiempoServicio extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='tiempos_servicio';
    protected $fillable=[
            'fecha',
            'id_foraneo',
            'manana_entrada',
            'manana_salida',
            'tarde_entrada',
            'tarde_salida',
            'trabajo_horas',
            'viaje_horas',
            'espera'//Define el tiempo en espera, distinto al tiempo de trabajo expresado en minutos

    ];
   public function ScopeBuscar($query,$buscar){

        if(!is_object($buscar)){
            $objeto=(object)$buscar;
        }
        $numero_querys='0';
        foreach ($objeto as $key => $value) {
            $dato = array_search($key,$this->fillable);
            if($dato>='0'){//VERIFICAR QUE EL CAMPO DE BUSQUEDA SE ENCUENTRE EN OBJETO FILLABLE
                $campo=$this->fillable[$dato];
                $comodin=strpos($objeto->$campo,'*');
                if(trim($objeto->$campo!='') ){//verificar q el campo de busqueda contenga caracteres
                    $numero_querys=$numero_querys+1;
                    if($comodin!==false){
                        $string=  str_replace("*", "%", $objeto->$campo);
                        $query->where($campo,'like',$string);
                    }else{
                        $query->where($campo,$objeto->$campo);
                    } 
                }

            }
            
        }//fin foreach
        
    }
}
