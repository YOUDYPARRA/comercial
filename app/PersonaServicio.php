<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PersonaServicio extends Model
{
    //
    protected $table='personas_servicios';
    protected $fillable=[
            'id_user',
            'iniciales',
            'email',
            'name',
            'vigente',//1 pendiente o activo, 0 ya no esta en uso o a expirado
            'asistencia',
            'clase',//P:porgrado,S:servicio
            'id_clase'//id orden servicio o id_reporte
    ];
    public function servicio(){
        return $this->hasOne('App\Clase','id','id_clase');
    }
    public function programa(){
        return $this->hasOne('App\Clase','id','id_clase');
    }
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
