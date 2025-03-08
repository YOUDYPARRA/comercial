<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamo extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='prestamos';
    protected $fillable=[
            'fecha_disponible',
            'iniciales_cerro',
            'numero_remision',
            'digitalizacion',
            'pedido',
            'vendedor',
            'id_foraneo',
            'clase',//def ''
            'id_camp_publ',
            'org_id',
            'org_name',
            'id_warehouse',
            'id_doctype_target',
            'condicion_facturacion',
            'c_bpartner_id',
            'c_bpartner_location',
            'c_order_id',
            'tipo_moneda',
            'tipo_envio',
            'metodo_pago',
            'centro_costo',
            'tipo_archivo',
            'p_delivery_location_id', //ok
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
        public function programa(){//busca las programaciones q tenga el reporte y colocar cotizacion.id en  programacion.id_cotizacion
        //Buscar el programa en caso de q exista reporte
        $programas=null;
        if($this->reporte>0){
            DB::table('clases')
                ->where('clase','P')
                ->where('organizacion',$this->org_name)
                ->where('folio',$this->reporte)
                ->update(['id_cotizacion'=>$this->id]);
        }
        return $programas;
    }
    
}
