<?php

namespace App;
use DB;
use App\Services\Calculador;
use App\Equipo;
use App\Compra as CompraVenta;
use App\Insumo;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\HelperUtil;

class GestionStock extends Model
{
    //
    protected $fillable=[
    'org_name',
    'codigo_proovedor',
    'id_warehouse',
    'almacen',
    'aviso',
    'calcular',
    'id_insumo',
    'm_product_id',
    'porcentaje_seguridad',
    'punto_pedido',
    'tiempo_respuesta',
    'anterioranio'
    ];
    protected $cal;
    public function getPedidoAlmacenStock(){
        $this->cal= new Calculador;
        $this->org_name=auth()->user()->org_name;
        $total=0;
        $arr_cant=null;
        $pedir=null;
        $punto_pedido=null;
        $stock_actual=null;
        $cantidad_compra=null;
        $porcentaje_seguridad=$this->porcentaje_seguridad;
        //$fecha=Carbon::parse('28-02-2017')->format('Y-m-d');
        $productos=$this->getVentasAnual($this->anterioranio);
            foreach ($productos as $v) {
                $arr_cant[]=$v->cantidad;
            }
        if(count($arr_cant)>0){
            $arr_calculo=$this->cal->total_antcipado($this->tiempo_respuesta,array_sum($arr_cant),$porcentaje_seguridad);
            $punto_pedido=$arr_calculo['pp'];
            $equipo_stock=$this->getStockActual();
            $stock_actual=$equipo_stock->primer_qty;
            //echo $stock_actual.'<> pp:'.round($punto_pedido, 0);
            //$porcentaje_stock_actual=($stock_actual*100)/$punto_pedido;
            //echo $porcentaje_stock_actual.'<br>';
            //if($stock_actual <= $punto_pedido){//verificar si generar pedido y de cuanto será el pedido
                //$pedir=$punto_pedido-$equipo_stock->primer_qty;
                $cantidad_compra=$this->cantidadUnidadCompra($arr_calculo['maximo']);
            //}
        }
        if ($punto_pedido>0){
            //echo '*'.round($punto_pedido, 0).'*';
                    return array(
                        "msg"=>"Success",
                        "punto_pedido"=>round($punto_pedido, 0),
                        "maximo"=>round($arr_calculo['maximo'], 0),
                        "stock_actual"=>$stock_actual,
                        "cantidad_compra"=>round($cantidad_compra,0),
                        "unidad_compra"=>$this->unidad_compra,
                        "cantidad_venta"=>array_sum($arr_cant),
                        "fecha_venta"=>$this->anterioranio,
                        //"porcentaje_actual_stock"=>round($porcentaje_stock_actual, 0),
                    );
        }else{
                    return array(
                        "msg"=>"DEBEN REGISTRARSE VENTA PREVIAMENTE DEL PRODUCTO"
                    );
        }
    }
    public function getVentasAnual($anterioranio){
    	return DB::table('compras_ventas')
        //->on('mypro')
        ->join('insumos_compras_ventas', 'compras_ventas.id', '=', 'insumos_compras_ventas.id_compra_venta')
        ->select('compras_ventas.id', 'insumos_compras_ventas.id_compra_venta',
                 'compras_ventas.fecha',
                 'insumos_compras_ventas.codigo_proovedor',
                 'insumos_compras_ventas.cantidad',
                 'insumos_compras_ventas.created_at',
                 'compras_ventas.created_at',
                'compras_ventas.tipo_archivo')
            ->where('compras_ventas.tipo_archivo','v')
            ->where('compras_ventas.c_order_id','<>','')
            ->where('compras_ventas.estatus','COMPLETADO')
            ->where('org_name',$this->org_name)
            ->where('insumos_compras_ventas.codigo_proovedor',$this->codigo_proovedor)
            ->where('compras_ventas.id_warehouse',$this->id_warehouse)
            ->whereDate('compras_ventas.created_at','>=',$anterioranio)
            ->orderBy('insumos_compras_ventas.created_at')
            ->get();
    }
    public function getStockActual(){
        $equips = Equipo::codigo($this->codigo_proovedor)->get();
        $equipo_stock=null;
        $sp=0;
        $ss=0;
        $equipo['m_producto_id']='';
        $equipo['codigo_proovedor']='';
        $equipo['descripcion']='';
        $equipo['primer_qty']=$sp;
        $equipo['segundo_qty']=$ss;
        $equipo['primer_nombre_uom']=0;
        $equipo['segundo_nombre_uom']=0;
        $equipo['almacen']='';
        $equipo['nombre_org']='';
        foreach ($equips as $equip) {
            $equipo['m_producto_id']=$equip->m_product_id;
            $equipo['codigo_proovedor']=$equip->value;
            $equipo['descripcion']=$equip->description;
                foreach ($equip->re_stock->where('m_warehouse_id',$this->id_warehouse) as $st) {
                //foreach ($equip->re_stock->where('warehouse_name',$this->almacen) as $st) {
                    $sp=$sp+$st->primary_qty;// cantidad en venta
                    $ss=$ss+$st->secondary_qty;//cantidad en compra
                    $equipo['primer_qty']=$sp;
                    $equipo['segundo_qty']=$ss;
                    $equipo['primer_nombre_uom']=$st->primary_uom_name;
                    $equipo['segundo_nombre_uom']=$st->secondary_uom_name;
                    $equipo['almacen']=$st->warehouse_name;
                    $equipo['nombre_org']=$this->org_name;
                }
            //HelperUtil::log(['$equipo :'.$this->codigo_proovedor=>$equipo]);
            }
        return $equipo_stock=(object)$equipo;
    }
    public function cantidadUnidadCompra($cantidad_unidad_venta){
        $insumo=null;
        $insumo=Insumo::codigo($this->codigo_proovedor)->first();
        if(count($insumo)){
            $this->unidad_compra=$insumo->unidad_compra;
            return $cantidad_unidad_venta/$insumo->cantidad_unidad_compra;
            //return $rsl.' '.$insumo->unidad_compra;
        }
    }
    public function setIdWareHouseAttribute($id_warehouse){
    	$this->id_warehouse=$id_warehouse;
    }
    public function setCodigoProovedorAttribute($codigo_proovedor){
    	$this->codigo_proovedor=$codigo_proovedor;
    }
    public function setHoyAttribute($fecha){
    	$fecha=Carbon::parse($fecha)->format('Y-m-d');
    	$this->fecha=$fecha;
        //$this->attributes['hoy']= $fecha;
    }
    public function getVenta($dias_anterior){
        //return DB::table('compras_ventas')
        return CompraVenta::
        join('insumos_compras_ventas', 'compras_ventas.id', '=', 'insumos_compras_ventas.id_compra_venta')
        ->select('compras_ventas.id', 'insumos_compras_ventas.id_compra_venta',
                'compras_ventas.id_warehouse',
                'compras_ventas.org_name',
                'compras_ventas.dato',
                'compras_ventas.folio',
                 'compras_ventas.fecha',
                 'insumos_compras_ventas.codigo_proovedor',
                 'insumos_compras_ventas.cantidad',
                 'insumos_compras_ventas.created_at',
                 'insumos_compras_ventas.id_insumo',
                 'compras_ventas.created_at',
                'compras_ventas.tipo_archivo')
            ->selectRaw('SUM(insumos_compras_ventas.cantidad) as lasum')
            ->where('compras_ventas.dato','like','%stock":"SI"%')
            ->where('compras_ventas.tipo_archivo','v')
            ->where('compras_ventas.c_order_id','<>','')
            ->where('compras_ventas.estatus','COMPLETADO')
            ->where('compras_ventas.org_name',$this->org_name)
            ->where('insumos_compras_ventas.codigo_proovedor',$this->codigo_proovedor)
            ->where('compras_ventas.id_warehouse',$this->id_warehouse)
            ->whereDate('compras_ventas.created_at','>=',$dias_anterior)
            //->orderBy('insumos_compras_ventas.created_at')
            ->groupBy('compras_ventas.id_warehouse')
            ->groupBy('compras_ventas.org_name')
            ->get();
    }

}
