<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $fillable=[
            'id_foraneo',
			'clase',//AVI DA AVISO, ES CON CLAVE FORANEO
			'subclase',
			'organizacion',
			'estado',
			'aprobacion',
			'etiqueta_aprobacion',
			'desaprobacion',
			'etiqueta_desaprobacion',
            'condicionante',
			'condicion',
            'dcondicionante',
            'dcondicion'
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
        /*
        if($numero_querys==0){
            $query->where('id',0);
        }
        */
        if(isset($objeto->asc)){
                $query->OrderBy($objeto->asc,'asc');
        }else if(isset($objeto->desc)){
                $query->OrderBy($objeto->desc,'desc');
        }
        
        
    }//fin public function buscar

    public function avisos(){//relacion Uno a varios para usuarios a los que envia aviso
        return $this->hasMany('App\Estado','id_foraneo','id');
    }
    public function aviso($req){
    	$arr=null;
    	if($req['tipo_busqueda_aviso']!='-'){
	    	foreach ($req as $key => $value) {
	    		$arr[$key]=$value;
	    	}
	    	$arr['clase']='AVI';
	    	if(!empty($req['tipo_busqueda_aviso']) ){
	    		$arr['tipo_busqueda']=$req['tipo_busqueda_aviso'];
	    	}
	    	if(!empty($req['condicion_aviso']) ){
	    		$arr['condicion']=$req['condicion_aviso'];
	    	}
	    	$aviso= new Estado($arr);
	    	$aviso->id_foraneo=$this->id;    		
    		return $aviso->save();
    	}
    }
}
