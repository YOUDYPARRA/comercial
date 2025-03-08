<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    //
    protected $table='orden_servicio';
    protected $primaryKey  = 'pk_orden_servicio';
    public $timestamps = false;
    protected $fillable=[
    'pk_orden_servicio',
    'noordenservicio',
    'cliente_nombre',
    'direccion',
    'colonia',
    'codigo_postal',
    'estado',
    'ciudad',
    'equipo',
    'marca',
    'modelo',
    'serie',
    'condicionprestamoservicio',
    ];
    public function getMaestroAttribute(){
        $rtn='';
        foreach ( $this->maestros->where('clase','X') as $value) {
            $rtn=$rtn.$value->numero_serie.' ';
            
        }
        return $rtn;
    }
    public function getContratoAttribute(){
         $rtn='';
        foreach ( $this->contratoServicio as $value) {
            $rtn=$rtn.$value->nocontratointerno.' ';
            
        }
        return $rtn;
    }

    public function maestros(){
        return $this->hasMany('App\Clase','numero_serie','serie');
    }
    public function contratoServicio(){
        return $this->hasMany('App\ContratoServicio','pk_contrato_mto','pk_contrato_mto');
    }

    public function ScopeBuscar($query,$buscar){
        

        if(!is_object($buscar)){
            $objeto=(object)$buscar;
        }
        //dd($buscar);
        $numero_querys='0';
        foreach ($objeto as $key => $value) {
            $dato='';
            $dato = array_search($key,$this->fillable);
            if(is_numeric($dato)){//VERIFICAR QUE EL CAMPO DE BUSQUEDA SE ENCUENTRE EN OBJETO FILLABLE
                $campo=$this->fillable[$dato];
                //echo $dato .'<br>';
                if(is_array($objeto->$campo)){
                    $comodin=false;
                }else{
                    $comodin=strpos($objeto->$campo,'*');
                }
                if(trim($objeto->$campo!='') ){//verificar q el campo de busqueda contenga caracteres
                    $numero_querys=$numero_querys+1;
                    if($comodin!==false){
                        $string=  str_replace("*", "%", $objeto->$campo);
                        $query->where($campo,'like',$string);
                    }else{
                        if(is_array($objeto->$campo)){
                            $query->whereIn($campo,$objeto->$campo);
                        }else{
                            //echo 'No es arr-';
                            if(strpos($objeto->$campo, '!')!==false){
                              //  echo 'No es arr-'.substr($objeto->$campo,1);
                               $query->where($campo,'<>',substr($objeto->$campo,1));
                            }else{
                               $query->where($campo,$objeto->$campo);                                
                            }
                        }
                    } 
                }

            }
            
        }//fin foreach
        /*
        if($numero_querys==0){
            $query->where('id',0);
        }*/
        if(isset($objeto->asc)){
                $query->OrderBy($objeto->asc,'asc');
        }else if(isset($objeto->desc)){
                $query->OrderBy($objeto->desc,'desc');
        }
        
    
    }
}
