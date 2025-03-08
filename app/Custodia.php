<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Custodia extends Model
{
    //
	use SoftDeletes;
	protected $table='custodias';
	protected $dates = ['deleted_at'];
    protected $fillable=[
        'accesorios',
        'id_reporte',
	    'reporte',
        'transductores',
        'cables',
        'empaques',
	    'digitalizacion',
	    'otros'
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

    }//fin public function
    public function rel_clase(){//relacion claseCustodia->custodia
        return $this->hasOne('App\Clase','id','id_clase');
    }
    
}
