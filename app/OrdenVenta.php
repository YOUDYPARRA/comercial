<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrdenVenta extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='ordenes_ventas';
    protected $fillable=[
             'nombre_fiscal',
             'auto',
             'calle_fiscal',
             'colonia_fiscal',
             'codigo_postal_fiscal',
             'ciudad_fiscal',
             'estado_fiscal',
             'pais_fiscal',             
             'rfc',
             'numero_cotizacion',
             'fecha',
             'subtotal',
             'iva',
             'total',             
             'nombre_empleado',
             'contacto',
             'correo',
             'telefono',
             'celular',
             'tipo_moneda',
             'tipo_cliente',
             'c_bpartner_id',
             'c_location_id',
             'ad_user_id',
             'nombre_cliente',
             'calle_entrega',
             'colonia_entrega',
             'codigo_postal_entrega',
             'ciudad_entrega',
             'estado_entrega',
             'pais_entrega',
             'representante_legal',
             'fecha_entrega',
             'departamento',
             'nota',
             'precio',
             'condicion_pago',
             'org_name',
             'no_contrato',
             'archivo_digital',
             'letras',
             'tipo_cambio',
             'no_pedido',
             'iniciales_asignado'
    		];
    		public function cotizaciones(){
    			return $this->belongsTo('App\Cotizacion','numero_cotizacion','numero_cotizacion');
    		}
    		public function calificaciones(){//al buscar, ir por el ultimo insertado
		        return $this->hasMany('App\Calificacion','id_producto','id');
		    }
    		public function re_obs(){
     		   return $this->hasMany('App\Observacion','id_producto','id');
    		}
    		public function insumos_venta(){
     		   return $this->hasMany('App\InsumoVenta','id_orden_venta','id');
    		}
    		public function getObservacionesAttribute(){
		    $observacion='';
		    foreach ($this->re_obs->where('nombre_tipo','orden_venta') as $obs) {
		        # code...
		        $observacion=$obs->observacion.' '.$observacion;
		        //$obs=$obs.' '.$obs;
			    }
			    return $observacion;
			}            
			public function getObservacionesDetalleAttribute(){
			    $observacion='';
			    foreach ($this->re_obs->where('nombre_tipo','orden_venta') as $obs) {
			        # code...
			        $observacion=$obs->updated_at.' : '.$obs->observacion;
			        $observacion=$observacion.'//'.$observacion;
			    }
			    return $observacion;
			} 
            public function getEstatusAttribute(){
                $cal='';
                //$calificaciones=$this->calificaciones()->where('nombre_tipo','orden_venta')->orderBy('updated_at','desc')->limit(1);
                //$calificaciones=$this->calificaciones->where('nombre_tipo','orden_venta')->orderBy('updated_at','desc');
                //dd($this->calificaciones()->where('nombre_tipo','orden_venta'));
                //foreach ($calificaciones as $item) {
                foreach ($this->calificaciones->where('nombre_tipo','orden_venta') as $item) {
                    $cal=$item->calificacion;
                }
                return $cal;
                //return $calificacion;
            }
    public function getAutoSigAttribute(){
                //$orden_consec=OrdenVenta::select('auto')->orderBy('auto','desc')->limit(1)->get();
                $orden_consec=$this::select('auto')->orderBy('auto','desc')->limit(1)->get();
                if(empty($orden_consec[0])){
                    $consec=1;
                }else{
                    $consec=$orden_consec[0]->auto+1;
                }
                return $consec;
    }
	public function ScopeBuscar($query,$buscar){

        if(!is_object($buscar)){
            $objeto=(object)$buscar;
        }
        foreach ($objeto as $key => $value) {
            //echo 'key:'.$key.' valor: '.$value;
            $dato = array_search($key,$this->fillable);
            $campo=$this->fillable[$dato];
            //echo 'En este Campo ->'.$campo. ' buscar: '.$objeto->$campo;
            $comodin=strpos($objeto->$campo,'*');
            if(trim($objeto->$campo!='')){//validar que campos han sido llenados o usados.
                if($comodin!==false){
                    $string=  str_replace("*", "%", $objeto->$campo);
                    $query->where($campo,'like',$string);
                }else{
                    $query->where($campo,$objeto->$campo);
                }
                
            }
            
        }
    

    		}

}
