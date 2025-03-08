<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AlmacenStock;
use App\GestionStock;
use Carbon\Carbon;
use App\Http\Requests\AlmaceStockStoreRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AlmacenStockController extends Controller
{
    protected $arr_obj=[];
    public function __construct(){
        $this->arr_obj['clase']='CONF';
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //return view('almacenes_stock.stock');
        
        $punto_pedido= AlmacenStock::buscar($this->arr_obj+$request->all())->get();
        if ($request->wantsJson()){
            return response()->json(
                    [
                        "msg"=>"Success",
                        "punto_pedido"=>$punto_pedido->toArray()
                    ],200
                    );
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $id=$request->all();
        return view('almacenes_stock.stock', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlmaceStockStoreRequest $request)
    {
        //
        $arr_val=null;
        $rsl=null;
        $punto_pedido_valido= new AlmacenStock;
        
        $rsl=$punto_pedido_valido->buscar(['almacen'=>$request->almacen,'id_insumo'=>$request->id_insumo,'clase'=>'CONF'])->get();        
        if(count($rsl)>0){
            $arr_val['msg']="VERIFIQUE REGISTRO REPETIDO";
            return response()->json($arr_val,422);
        }
        
        $punto_pedido_nuevo= new AlmacenStock($request->all());
        $punto_pedido_nuevo->clase='CONF';
        $punto_pedido_nuevo->save();
        $punto_pedido=$punto_pedido_nuevo->buscar(['id_insumo'=>$request->id_insumo,'clase'=>'CONF'])->get();
        //dd($punto_pedido);                                                                       
        
        return response()->json(
                    [
                        "msg"=>"Success",
                        "punto_pedido"=>$punto_pedido->toArray()
                    ],200
                    );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //        
        $objeto=AlmacenStock::find($id);
        $gs=new GestionStock;
        $gs->anterioranio=$this->hoy=Carbon::today()->subYear();
        $gs->org_name=auth()->user()->org_name;
        $gs->codigo_proovedor=$objeto->codigo_proovedor;
        $gs->id_warehouse=$objeto->id_warehouse;
        $gs->almacen=$objeto->almacen;
        $gs->porcentaje_seguridad=$objeto->porcentaje_seguridad;

        if($request->wantsJson()){
            $calculo=$gs->getPedidoAlmacenStock($objeto);
            return response()->json(
                    [
                        "msg"=>"Success",
                        "objeto"=>$calculo
                    ],200
                    );
        }
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
        $objeto = AlmacenStock::find($id);
        $objeto->delete();
        return response()->json(
                    [
                        "msg"=>"Success",
                    ],200
                    );
    }
}
