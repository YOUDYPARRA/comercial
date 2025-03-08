<?php

namespace App\Commands;

use App\Compra as Venta;
use DB;
use App\InsumoCompraVenta;
use App\Insumo;
use App\GestionStock;
use App\Services\Calculador;
use App\MarcaProveedor;
use App\AlmacenStock;
use App\Services\ManagerCorreo;
use App\User as Usuario;
use App\Equipo;
use App\OrderV;
use Carbon\Carbon;
use App\Helpers\HelperUtil;
use Illuminate\Console\Command;
class CommandPrueba extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prueba';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pruebas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    protected $codigo_proovedor='';
    protected $cal='';
    protected $org_name='';
    protected $id_warehouse='';
    protected $gestion_stock='';
    protected $aviso;
    protected $mensaje="";
    protected $correo=[
            'remitente'=>'sistema@smh.com.mx',
            'alias'=>'Sistema',
            'asunto'=>'Aviso de sistema contrato pendiente'
            ];
    protected $dias=91;


    public function __construct(Calculador $calc, GestionStock $gestion_stock)
    {
        parent::__construct();
        $this->cal= $calc;
        $this->gestion_stock=$gestion_stock;
        $this->aviso= new ManagerCorreo;
    }
    /**
     *Execute the console command
     *Correr diario en horario no habil
     *Qry Todos los insumos q son consumible
     *por cada consumible, obtener las ventas anterior a 3 MESES anteriores NO canceladas y q no sean venta especial
     *Calcular el MAximo y minimo para los 3 Meses posteriores
     *Calcular el porcentaje de existencias de almacen
     *Almacenar Aquellas q tienen un % < 60% + - un 10% acercarse al 60%
     * @return mixed
     */
    public function handle()
    {
        $ventas=$this->getVentasInsumos();
        foreach ($ventas as $venta) {
            # POR CADA VENTA CALC. EL MAXIMO Y MINIMO
            $this->codigo_proovedor=$venta->codigo_proovedor;
            $this->id_warehouse=$venta->id_warehouse;
            $producto_existe=$this->existen();
            $porcentaja_almacen=round(($producto_existe->primer_qty*100)/$venta->lasum,0);
            $insumo=Insumo::on('mypro')->find($venta->id_insumo);
            //FIN CALCULO
            if(!empty($producto_existe->primer_qty) && ($insumo->cantidad_unidad_compra>0) ){
                $u_vta=round($venta->lasum-$producto_existe->primer_qty);//comprar en unidades de venta, Calcular y convertir las unidades de venta en unidades de compra
                /*
                HelperUtil::log([' % '=>$porcentaja_almacen,
                    'Almacen: '=> $producto_existe->almacen,
                    ' Prod. '=>$venta->codigo_proovedor,
                    ' Exis. '=>$producto_existe->primer_qty,
                    ' Vta.'=>$venta->lasum,
                    ' Ped.U.Vta. '=>round($u_vta),
                    ' EN '=>$insumo->unidad_medida,
                    'Cant Comp '=>round(($u_vta/$insumo->cantidad_unidad_compra),0),
                    'Unidad Compr '=>$insumo->unidad_compra,
                    ' DE '=>$insumo->cantidad_unidad_compra
                ]);
                */
                $almacen_stock=AlmacenStock::buscar(['id_warehouse'=>$this->id_warehouse,'codigo_proovedor'=>$this->codigo_proovedor,'clase'=>'CONF'])->first();

                if(count($almacen_stock)){
                    if($porcentaja_almacen<=$almacen_stock->porcentaje_seguridad){

                        $almacen_stock = new AlmacenStock;
                        $almacen_stock->codigo_proovedor=$venta->codigo_proovedor;
                        $almacen_stock->id_insumo=$venta->id_insumo;
                        $almacen_stock->m_product_id=$producto_existe->m_producto_id;
                        $almacen_stock->almacen= $producto_existe->almacen;
                        $almacen_stock->org_name=$venta->org_name;
                        $almacen_stock->porcentaje_seguridad=60;
                        $almacen_stock->id_warehouse=$venta->id_warehouse;
                        $almacen_stock->clase='PEDIR';
                        $almacen_stock->calcular=$porcentaja_almacen;//% de pedido
                        $almacen_stock->punto_pedido=round(($venta->lasum / 3),0);//minimo
                        $almacen_stock->maximo=$venta->lasum;
                        $almacen_stock->aviso='';
                        $almacen_stock->tiempo_respuesta='';
                        $almacen_stock->on('mypro')->save();
                    }
                }else{//no hay datos del AlmacenStock configurados
                    if($porcentaja_almacen<=65){
                        
                        $arr['codigo_proovedor']=$venta->codigo_proovedor;
                        $arr['id_insumo']=$venta->id_insumo;
                        $arr['m_product_id']=$producto_existe->m_producto_id;
                        $arr['almacen']= $producto_existe->almacen;
                        $arr['org_name']=$venta->org_name;
                        $arr['porcentaje_seguridad']=60;
                        $arr['id_warehouse']=$venta->id_warehouse;
                        $arr['clase']='PEDIR';
                        $arr['calcular']=$porcentaja_almacen;
                        $arr['punto_pedido']=round(($venta->lasum /3),0);//minimo
                        $arr['maximo']=$venta->lasum;
                        $arr['aviso']='';
                        $arr['tiempo_respuesta']='';
                        $this->pedir($arr);
                        
                    }

                }//fin if % 

            }//fin existe producto en postgress
        }//fin foreach
    }
    public function getVenta($dias_anterior,$codigo_proovedor,$id_warehouse,$org_name){
        //return DB::table('compras_ventas')
        return Venta::on('mypro')
        ->join('insumos_compras_ventas', 'compras_ventas.id', '=', 'insumos_compras_ventas.id_compra_venta')
        ->select('compras_ventas.id', 'insumos_compras_ventas.id_compra_venta',
                'compras_ventas.id_warehouse',
                'compras_ventas.org_name',
                 'compras_ventas.fecha',
                 'insumos_compras_ventas.codigo_proovedor',
                 'insumos_compras_ventas.cantidad',
                 'insumos_compras_ventas.created_at',
                 'insumos_compras_ventas.id_insumo',
                 'compras_ventas.created_at',
                'compras_ventas.tipo_archivo')
            ->selectRaw('SUM(insumos_compras_ventas.cantidad) as lasum')
            ->where('compras_ventas.tipo_archivo','v')
            ->where('compras_ventas.c_order_id','<>','')
            ->where('compras_ventas.estatus','COMPLETADO')
            //->where('compras_ventas.org_name',$org_name)
            ->where('insumos_compras_ventas.codigo_proovedor',$codigo_proovedor)
            //->where('compras_ventas.id_warehouse',$id_warehouse)
            ->whereDate('compras_ventas.created_at','>=',$dias_anterior)
            //->orderBy('insumos_compras_ventas.created_at')
            ->groupBy('compras_ventas.id_warehouse')
            ->groupBy('compras_ventas.org_name')
            ->get();
    }
    public function getWarehouseId(){

        return Venta::on('mypro')
        ->select('id_warehouse')
        ->groupBy('id_warehouse')
        ->get();
        
    }
    public function getOrgName(){
        return Venta::on('mypro')
        ->select('org_name')
        ->groupBy('org_name')
        ->get();
        
    }
    public function ventas(){
        $arr=[];
        $cantidades_venta=0;
        //echo "->".Carbon::today()->subYear();
        foreach(InsumoCompraVenta::
            //on('mypro')
            buscar([
            'codigo_proovedor'=>$this->codigo_proovedor,
            'tipo_equipo'=>'CONSUMIBLES'
            ])
            ->whereDate('updated_at','>=',Carbon::today()->subYear())
            ->get() as $insumo){//fin foreach
                $venta_valida=0;
                $venta_valida=Venta::on('mypro')
                ->where('c_order_id','<>','')
                ->where('compras_ventas.estatus','COMPLETADO')
                ->where('org_name',$this->org_name)
                ->where('id_warehouse',$this->id_warehouse)
                ->where('id',$insumo->id_compra_venta)
                ->first();
                if(count($venta_valida)>0){//venta valida, sumar insumo;
                    $cantidades_venta=$cantidades_venta+$insumo->cantidad;
                }
        }
        return $cantidades_venta;
    }
    public function existen(){        
        $equips = Equipo::on('pgpro')->codigo($this->codigo_proovedor)->get();
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
            }
        return $equipo_stock=(object)$equipo;
    }
    public function pedir($array){
        $pedir=new AlmacenStock($array);
        $pedir->save();
    }
    public function getVentasInsumos(){
        $ventas_insumos=[];
        $dias=Carbon::today()->subDays($this->dias);

        $consumibles = INSUMO::on('mypro')->bandera('c')->get();
        foreach ($consumibles as $consumible) {
            //foreach ($this->getWarehouseId() as  $value) {
                //foreach ($this->getOrgName() as $o) {
                $venta=null;
                    foreach ($this->getVenta($dias,$consumible->codigo_proovedor,'','') as $venta_insumo) {
                    //foreach ($this->getVenta($dias,$consumible->codigo_proovedor,'',$o->org_name) as $venta_insumo) {
                    //foreach ($this->getVenta($dias,$consumible->codigo_proovedor,$value->id_warehouse,$o->org_name) as $venta_insumo) {
                        # code...Ventas obtenidas para la linea actual
                        if($venta_insumo->lasum>0){
                            $ventas_insumos[]=$venta_insumo;
                        }
                    }
                //}//fin for org
            //}//fin for warehouse
        }//FIN FOR VENTAS CONSUMIBLES
        return $ventas_insumos;
    }
}