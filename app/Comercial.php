<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Comercial extends Model
{
    protected $dates = ['deleted_at'];
    protected $table='comerciales';//representa nombres clientes para sistema comercial
    protected $fillable=[
        'calle',
        'colonia',
        'c_p',
        'ciudad',
        'estado',
        'pais',
        'numero',
        'numero_exterior',
        'fiscal',//01
        'rfc',//unico
        'c_bpartner_id',
        'c_bpartner_location',
        'instituto',
        'telefono',
        'correos',
        'fax',
        'nacional',//YN
        'local',//1,0
		    'nombre_cliente',//unico
        'celular',
		    'dato',
        'clase',//COMERCIAL
        'estatus',//Valido no Valido; Capturado
        'organizacion'//Valido no Valido; Capturado
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
