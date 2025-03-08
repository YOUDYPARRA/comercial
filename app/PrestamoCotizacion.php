<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\HelperUtil;

class PrestamoCotizacion extends Model
{
    //
    use SoftDeletes;
    protected $table='prestamos_cotizaciones';
    protected $dates = ['deleted_at'];
    protected $fillable=[
      'id_prestamo',
      'id_cotizacion',
      'nota'];
      public function ScopeBuscar($query,$buscar){

         if(!is_object($buscar)){
             $objeto=(object)$buscar;
         }
         //HelperUtil::log($objeto);
         //dd($buscar);
         $numero_querys='0';
         foreach ($objeto as $key => $value) {
             $dato='';
             $mas=false;
             $esfecha=false;
             $dato = array_search($key,$this->fillable);
             if(is_numeric($dato)){//VERIFICAR QUE EL CAMPO DE BUSQUEDA SE ENCUENTRE EN OBJETO FILLABLE
                 $campo=$this->fillable[$dato];
                 //echo $dato .'<br>',
                 //VERIFICA SI HAY ASTERISCO
                 if(is_array($objeto->$campo)){
                     $comodin=false;
                 }else{
                     $comodin=strpos($objeto->$campo,'*');
                 }
                 //FIN VERIFICA SI HAY ASTERISCO
                 //VERIFICA SI HAY  SIGNO MAS
                 if(HelperUtil::hayMas($objeto->$campo) ){
                   $mas=true;
                   $objeto->$campo=HelperUtil::buscarMas($objeto->$campo);
                 }elseif (HelperUtil::getFechaBusca($objeto->$campo)) {//Es busqueda por fecha
                   $esfecha=true;
                   //HelperUtil::log(['Ver si fecha'=>$objeto->$campo]);
                   //HelperUtil::log(HelperUtil::getFechaBusca($objeto->$campo));
                     if(HelperUtil::getFechaBusca($objeto->$campo)==1){//Es una fecha
                       /*$ftm=Carbon::createFromFormat('d-m-Y', $objeto->$campo)->format('Y-m-d');
                       $diasig='2018-07-12';
                       $objeto->$campo=array($ftm,$diasig);*/
                       $objeto->$campo=array();
                     }elseif(HelperUtil::getFechaBusca($objeto->$campo)==6){/*Son dos fechas*/
                         $objeto->$campo=HelperUtil::dosFechas($objeto->$campo);
                     }
                 }
                 //FIN VERIFICA SI HAY MAS
                 if(trim($objeto->$campo!='') ){//verificar q el campo de busqueda contenga caracteres
                     $numero_querys=$numero_querys+1;
                     if($comodin!==false){
                         $string=  str_replace("*", "%", $objeto->$campo);
                         $query->where($campo,'like',$string);
                     }else{//no viene con comodin
                         if(is_array($objeto->$campo) && (count($objeto->$campo)==2) && ($mas) ){//SOLO CUANDO SE BUSCAN VARIOS DE UN SOLO CAMPO
                             $query->whereBetween($campo,$objeto->$campo);
                         }elseif(is_array($objeto->$campo) && (count($objeto->$campo)>2) && ($mas) ){//SOLAMENTE Y SOLO CUANDO SEA FECHA
                           $query->whereIn($campo,$objeto->$campo);
                         }elseif($esfecha ){//SOLAMENTE Y SOLO CUANDO SEA FECHA
                           //HelperUtil::log(['formateo buscar por fecha'=>$objeto->$campo]);
                             $query->whereBetween($campo,$objeto->$campo);
                         }else{
                           //echo 'No es arr-';
                             if(strpos($objeto->$campo, '!')!==false){
                               //  echo 'No es arr-'.substr($objeto->$campo,1);
                                $query->where($campo,'<>',substr($objeto->$campo,1));
                             }else{
                                $query->where($campo,$objeto->$campo);
                             }
                         }//FIN ES ARREGLO O CONJUNTO DE DATOS O FECHA
                     }//FIN IF COMODIN
                 }

             }

         }//fin foreach

         if($numero_querys==0){
             $query->where('id',0);
         }
         if(isset($objeto->asc)){
                 $query->OrderBy($objeto->asc,'asc');
         }else if(isset($objeto->desc)){
                 $query->OrderBy($objeto->desc,'desc');
         }

      }//fin public function buscar

}
