<?php

namespace App;
use Carbon\Carbon;
use App\Calificacion;
use Illuminate\Database\Eloquent\Model;
use App\Services\ManagerCorreo;
class TicketOperacion extends Model
{
    //
    protected $dates = ['deleted_at,compromiso'];
    protected $table='tickets';
    protected $fillable=[
    'id_foraneo',
	'nombre',
	'descripcion',
	'modulo',
	'prioridad',
	'estatus',
	'autor',//iniciales
	'departamento',
	'area',
	'compromiso',
	'dato',
	'clase',
    'organizacion',
    'subclase',
    'hora_compromiso',
    'contacto',//telefono,email
    'cliente',//nombre de cliente
    'entrega',//direccion de entrega
    'atencion',//nombre del responsable o del contacto en el cliente
	'proyecto',//nombre del proyecto
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
                        if(is_array($objeto->$campo) && (count($objeto->$campo)>2) ){
                            $query->whereIn($campo,$objeto->$campo);
                        }elseif(is_array($objeto->$campo) && (count($objeto->$campo)==2) ){
                            $query->whereBetween($campo,$objeto->$campo);

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
        
    }//fin public function buscar

    public function digitalizaciones(){//relacion Uno a varios
        return $this->hasMany('App\Digitalizacion','id_foraneo','id');
    }public function hilos(){//relacion Uno a varios
        return $this->hasMany('App\Ticket','id_foraneo','id');
    }
    public function calificaciones(){//relacion Uno a varios
        return $this->hasMany('App\Calificacion','id_producto','id');
    }
    public function diasCorrientes($fecha){
        $dias='';
        $hoy=Carbon::now();
        $hoy->setLocale('es');

        $dias=$hoy->diffForHumans($fecha,true,false);
        return $dias;
    }
    public function calificacion($id,$clase,$estatus){
        Calificacion::create([
                    'id_producto'=>$id,
                    'nombre_tipo'=>$clase,
                    'ruta_siguiente'=>'',
                    'ruta_califico'=>'',
                    'calificacion'=>$estatus,
                    'iniciales'=>auth()->user()->iniciales
                    ]);
    }
    public function aviso($arr,$tmp=null){
            $aviso= new ManagerCorreo;
        foreach ($arr as  $v) {
            $correo=[
                'remitente'=>auth()->user()->email,
                'alias'=>auth()->user()->name,
                'asunto'=>'Notificación de sistema.'
                ];
            $correo['destino']=$v['destino'];
            $correo['contenido']=array('msj'=>$v['msj']);
            if(is_null($tmp)){
                 $aviso->enviarCorreo($correo);
            }else{
                $aviso->enviarCorreo($correo,'atencion');
            }
        }
    }
    public function setCompromisoAttribute($c){
        //dd($c);
        if(!empty($c)){
            $compromiso=Carbon::createFromFormat('d-m-Y',$c);
            $this->attributes['compromiso']= $compromiso;
        }
    }
    public function procesando($fecha){
        $procesando=false;
        $inicio=false;
        if($this->creaProceso($fecha) ){
        if($this->comprometido()){
            $compromiso=$this->formatFecha($this->compromiso);
            $fecha=$this->formatFecha($fecha);
            //$fff=explode(' ', $fecha);
            //$ff=explode(' ', $this->compromiso);
            //$compromiso=Carbon::createFromFormat('Y-m-d H', $ff[0].' 0')->toDateTimeString();
            //$fecha=Carbon::createFromFormat('Y-m-d H', $fff[0].' 0')->toDateTimeString();
            if($compromiso>=$fecha){
                $procesando=true;
            }
        }
        }
            
        return $procesando;
    }
    public function formatFecha($fecha){//de aaaa-mm-dd H -Hacia=> aa-mm-dd string
        $ff=explode(' ', $fecha);
        return Carbon::createFromFormat('Y-m-d H', $ff[0].' 0')->toDateTimeString();
    }
    public function comprometido(){
        //echo 'VER fecha';
        $iniciar=false;
        //$fecha=$this->formatFecha($this->compromiso);
        $fecha=explode(' ', $this->compromiso);
        $fecha=explode('-', $fecha[0]);
        //print_r($fecha);
        if($this->esFecha("$fecha[2]-$fecha[1]-$fecha[0]") ){
            //echo 'es fecha';
            $iniciar=true;
        }
        return $iniciar;
    }public function creaProceso($fecha){
        $iniciar=false;
        $inicio=$this->formatFecha($this->created_at);
        $fecha=$this->formatFecha($fecha);
            if($inicio<=$fecha){
                $iniciar=true;
            }
        return $iniciar;
    }
    public function esFecha($validar){//dd-mm-aaaa
        $valido=false;
        $arr=explode('-', $validar);
        //print_r($arr);
        if(count($arr)==3){
            $ddn=$arr[0];
            $dd=strlen($arr[0]);
            $mmn=$arr[1];
            $mm=strlen($arr[1]);
            $aaaa=strlen($arr[2]);
            $aaaan=$arr[2];
            if($dd==2 && $ddn>1){
                if($mm==2 && $mmn>1){
                    if($aaaa==4 && $aaaan>1) {
                        $valido=true;
                    }
                }

            }
        }
        return $valido;
    }
}