<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
//use Cal;
use Illuminate\Database\Eloquent\Model;

class InsumoCompraVenta extends Model
{
    //
        use SoftDeletes;
        protected $dates = ['deleted_at'];
        protected $table='insumos_compras_ventas';
        protected $fillable=[
	         'id_insumo',
	         'id_compra_venta',
	         'id_pack',
	         'tipo_equipo',
	         'marca',
	         'modelo',
	         'caracteristicas',
	         'especificaciones',
	         'cantidad',
	         'codigo_proovedor',
	         'descripcion',
	         'costos',
	         'precio',
	         'costo_moneda',
	         'unidad_compra',
	         'total',
	         'tipo_cambio',
	         'bandera_insumo',
	         'descuento',
	         'tax_id',
	         'unidad_venta',
             'check',
	         'clase',
	         'm_product_category_id',
	         'id_prestamo',
	         'id_insumo_prestamo',
	         'calculo',
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
                    }else{
                        $query->where($campo,$objeto->$campo);
                    }
                }

            }

        }//fin foreach

    }
    public function scopeClase($query,$clase) {
        $query->where('clase',$clase);
    }
    public function scopeIdCompraVenta($query,$c_v) {
        $query->where('id_compra_venta',$c_v);
    }
    public function scopePromedioVenta($query,$codigo_proovedor) {
        //$query->where('codigo_proovedor',$codigo_proovedor);FALTA QUERY DE DOCE MESES ANTERIORES...
        return DB::table('insumos_compras_ventas')
        ->join('compras_ventas',function($join){
            $join->on('insumos_compras_ventas.id_compra_venta','=','compras_ventas.id')
                ->where('compras_ventas.id_warehouse','=',$this->id_warehouse)
                //->whereBetween('compras_ventas.updated_at',[$this->fecha,$this->fecha])
                ;
            })
            ->where('codigo_proovedor',$codigo_proovedor)
            //->where('insumos_compras_ventas.updated_at','<=',$this->fecha)
            ->get();
            foreach ($variable as $key => $value) {
                # code...
            }
    }

}
