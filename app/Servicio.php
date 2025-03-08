<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Servicio extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='servicios';
    protected $fillable=[
            'id_foraneo',
            'monto_gasto',
            'monto_gasto_diverso',
            'describe_gasto_diverso',
            'validada',
            'digitalizacion',
            'mostrar_entrega',//def S
            'conclusion_trabajo',
            'descripcion_archivado'
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
        if($numero_querys==0){
            $query->where('id',0);

        }

    }//fin public function
}
