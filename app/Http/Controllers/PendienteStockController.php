<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlmacenStock;
use App\GestionStock;
use App\Insumo;
use App\Helpers\HelperUtil;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PendienteStockController extends Controller
{
    protected $arr_obj=[];
    public function __construct(){
        $this->arr_obj['clase']='PEDIR';
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $objetos= AlmacenStock::buscar($this->arr_obj+$request->all())
        ->orderBy('calcular','asc')
        ->paginate(25);
        foreach ($objetos as $key => $objeto) {
            $gs=new GestionStock;
            $insumo=Insumo::
            //on('mypro')->
            find($objeto->id_insumo);
            $gs->org_name=$objeto->org_name;
            $gs->codigo_proovedor=$objeto->codigo_proovedor;
            $gs->id_warehouse=$objeto->id_warehouse;
            $gs->almacen=$objeto->almacen;
            $gs->porcentaje_seguridad=$objeto->porcentaje_seguridad;
            $gs->tiempo_respuesta=$objeto->tiempo_respuesta;
            $actual=$gs->getStockActual();
            $dias=Carbon::today()->subDays(91);
            $ventas_anteriores=$gs->getVenta($dias);
            //HelperUtil::log(['$ventas_anteriores :'.count($ventas_anteriores)=>$ventas_anteriores]);
            //dd($ventas_anteriores[0]['lasum']);
            $objeto->existencia=round($actual->primer_qty,0);
            //$objeto->cantidad_venta=round($objeto->maximo-$objeto->existencia,0);
            //HelperUtil::log(['$ventas_anteriores :'=>$ventas_anteriores]);
            if($objeto->existencia < $ventas_anteriores[0]['lasum']){

                $rls=round($objeto->existencia-$ventas_anteriores[0]['lasum'],0);
                $objeto->cantidad_venta=$rls*-1;

            }else{
                $objeto->cantidad_venta=round($objeto->existencia-$ventas_anteriores[0]['lasum'],0);

            }
            $objeto->cantidad_compra=round(($objeto->cantidad_venta/$insumo->cantidad_unidad_compra),0);
            $objeto->cantidad_venta=$objeto->cantidad_venta.' '.$insumo->unidad_medida;
            $objeto->cantidad_compra=$objeto->cantidad_compra.' '.$insumo->unidad_compra.' DE '.$insumo->cantidad_unidad_compra;
        }
        return view('almacenes_stock.comprar', compact('objetos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {}
        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $objeto = AlmacenStock::find($id);
        $objeto->delete();
        return back();
    }
}
