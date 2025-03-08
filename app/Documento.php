<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='documentos';
    protected $fillable=[
    'id_foraneo',
    'clase',
    'json',
    'texto',
    'version',
    'subtotal',
    'iva',
    'total'
    ];
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
    }//fin public function buscar
    public function clase(){//relacion Uno a uno
        return $this->hasOne('App\Clase','id','id_foraneo');
    }
    public function setVersionAttribute($c){

        $ver_ultimo='';
        $ver_siguiente='';
        $foraneo=$this->attributes['id_foraneo'];
        if(empty($this->attributes['version'])){
            $ver_ac='';

        }else{
            $ver_ac=$this->attributes['version'];
            
        }
        if(!is_numeric($c)){//ES TEXTO
            $ver_ultimo=$this::select('id','version')->withTrashed()->Where('clase',$c)->
            Where('id_foraneo',$foraneo)->
            Where('version',$ver_ac)
            ->orderBy('version','desc')->limit(1)->get();
            //echo 'ULTIMO'.$c;
            //echo 'foraneo'.$foraneo;
            if(empty($ver_ultimo[0])){
                $ver_siguiente=1;
            }else{
                $ver_siguiente=$ver_ultimo[0]->folio+1;
            }
            //dd($ver_siguiente);
            $this->attributes['version']= $ver_siguiente;
        }else{
            $this->attributes['version']= $c;            
        }
    }
}
