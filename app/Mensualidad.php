<?php

namespace App;
use Carbon\Carbon;
use App\Helpers\HelperUtil;
use Illuminate\Database\Eloquent\Model;

class Mensualidad extends Model
{
    //
    protected $table = 'clases';
    protected $fillable=[
    	'id_foraneo',
    	'clase',//MES
    	'vigencia',//mes
    	'dato',//año
    	'nota',//monto
    ];
    public function pagosExcel($id){

        $objetos=[];
        $meses=$this->getMeses();
        $anios=$this->getAnios();
        //HelperUtil::log([$anios]);
        foreach ($anios as $key => $anio) {
            foreach ($meses as $key => $mes) {
          //  	HelperUtil::log(['mes'=>$mes]);
        	//$objeto=null;
            	$key=$mes.'/'.$anio;
                $obj=Mensualidad::
                    where('id_foraneo',$id)
                    ->where('clase','MES')
                    ->where('dato',$anio)//dato=año
                    ->where('vigencia',$mes)//vigencia=mes
                    ->first();
                if(empty($obj)){
                	$mens=new Mensualidad;
                	$mens->nota='0';
                    $objetos[$key]=$mens->nota;
                }else{ 
                	$objetos[$key]=$obj->nota;
                }
                
            }
        }
	        return $objetos;
    }
    public function pagos($id){
        $objetos='';
        $meses=$this->getMeses();
        $anios=$this->getAnios();
        foreach ($anios as $key => $anio) {
            foreach ($meses as $key => $mes) {
            	
                $obj=Mensualidad::
                    where('id_foraneo',$id)
                    ->where('clase','MES')
                    ->where('dato',$anio)//dato=año
                    ->where('vigencia',$mes)//vigencia=mes
                    ->first();
                if(!empty($obj)){
                    $objetos[]=$obj;
                }
                
            }
        }
        return $objetos;
    }
    public function getAnios(){
        $años[]=1;
        $años[]=2;
        $años[]=3;
        $años[]=4;
        
        foreach ($años as $key => $value) {
            # code...
            $fecha=Carbon::today()->addYear($key);
            //$fecha->year
            $años[$key]=$fecha->year;
        }
        return $años;
    }public function getMeses(){
        //$meses='';
        $meses[]='ENERO';
        $meses[]='FEBRERO';
        $meses[]='MARZO';
        $meses[]='ABRIL';
        $meses[]='MAYO';
        $meses[]='JUNIO';
        $meses[]='JULIO';
        $meses[]='AGOSTO';
        $meses[]='SEPTIEMBRE';
        $meses[]='OCTUBRE';
        $meses[]='NOVIEMBRE';
        $meses[]='DICIEMBRE';
        return $meses;
    }
}
