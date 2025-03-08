<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Calculador;
use App\Http\Requests;
use DB;
//use App\Stock;
//use App\WarehouseRuleV;
use App\GestionStock;
use App\Equipo;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class GestionStockController extends Controller
{
    protected $cal;
    protected $hoy;
    protected $anterioranio;
    public function __construct(Calculador $calc){
         $this->cal= $calc;
         $this->hoy=Carbon::today();
        $this->anterioranio=$this->hoy->subYear();
        //$this->anterioranio=$this->hoy->subDays(63);
     }
    /**
     * MUESTRA EL PUNTO DE PEDIDO DE UN PRODUCTO.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //OBTENER EL PROMEDIO DE LAS VENTAS ANUALES DEL PRODUCTO
        //OBTENER EL PUNTO DE PEDIDO DEL PRODUCTO
        $gestion = new GestionStock($request->all());
        $gestion->org_name=auth()->user()->org_name;
        $total=0;
        $arr_cant=null;
        $pedir=null;
        $cantidad_compra=null;
        $punto_pedido=null;
        $stock_actual=null;
        $porcentaje_seguridad=$request->porcentaje_seguridad;
        //$fecha=Carbon::parse('28-02-2017')->format('Y-m-d');
        $productos=$gestion->getVentasAnual($this->anterioranio);
            foreach ($productos as $v) {
                $arr_cant[]=$v->cantidad;
            }
        if(count($arr_cant)>0){
            $arr_calculo=$this->cal->total_antcipado($request->tiempo_respuesta,array_sum($arr_cant),$porcentaje_seguridad);
            $punto_pedido=$arr_calculo['pp'];
            $equipo_stock=$gestion->getStockActual();
            $stock_actual=$equipo_stock->primer_qty;
            //$porcentaje_stock_actual=($stock_actual*100)/$punto_pedido;
            //if($stock_actual <= $punto_pedido){//verificar si generar pedido y de cuanto será el pedido
                //$pedir=$punto_pedido-$equipo_stock->primer_qty;
                $cantidad_compra = $gestion->cantidadUnidadCompra($arr_calculo['maximo']);
            //}
        }
        if ($request->wantsJson() && $punto_pedido>0){
            return response()->json(
                    [
                        "msg"=>"Success",
                        "demanda_anual"=>array_sum($arr_cant),
                        "punto_pedido"=>round($punto_pedido, 0),
                        "maximo"=>round($arr_calculo['maximo'],0),
                        "stock_actual"=>$stock_actual,
                        "cantidad_compra"=>round($cantidad_compra,0),
                        "unidad_compra"=>$gestion->unidad_compra,
                        "tiempo_respuesta"=>$request->tiempo_respuesta,
                        //"porcentaje_actual_stock"=>round($porcentaje_stock_actual, 0),
                    ],200
                    );
        }else{
            return response()->json(
                    [
                        "msg"=>"DEBEN REGISTRARSE VENTA PREVIAMENTE DEL PRODUCTO"
                    ],422
                    );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        dd('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        dd('destroy');
    }
}
