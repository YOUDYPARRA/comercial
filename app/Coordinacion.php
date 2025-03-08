<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Coordinacion extends Model
{
    use SoftDeletes;
    protected $table='coordinaciones';//representa el equipo
    protected $fillable=[
        'atributo',//campo de la tabla reporte de servicio
        'nombre',//en centro de costo, o etiqueta
        'coordinacion',//equipo,producto
        'modelo'
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
                        if(is_array($objeto->$campo)){
                            $query->whereIn($campo,$objeto->$campo);
                        }else{
                            $query->where($campo,$objeto->$campo);
                        }
                    } 
                }

            }
            
        }//fin foreach
        if($numero_querys==0){
            $query->where('id',0);

        }

    }//fin public function
        
    public function scopeNombre($query,$nombre)
    {
        if(trim($nombre)!="")
        {
            $arr=explode("*", $nombre);
            if(count($arr)>=2)
            {
                $nombre=  str_replace("*", "%", $nombre);
                $query->where('nombre','like',$nombre);
            }  else 
            {
                $query->where('nombre',$nombre);
            }
        }
    }

    	
}
