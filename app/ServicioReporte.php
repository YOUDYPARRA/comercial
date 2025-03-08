<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioReporte extends Model
{
    //
    protected $table='servicios_reportes';
    protected $fillable=[
			'dato',
            'id_reporte',
			'id_horario',
			'id_ingeniero_atencion',
			'id_servicio',
			'clase',
			'subclase',
			'organizacion',
			'sucursal',
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
