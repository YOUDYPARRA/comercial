<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagare;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  PagareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch ($request->vi) {
            case '0':
                # code...
                    $objetos=Pagare::
                            IdCotizacion($request->get('id_cotizacion'))
                            ->IdContratoCompraVenta($request->get('id_contrato_compra_venta'))
                            ->ObligacionSuscriptor($request->get('obligacion_suscriptor'))
                            ->paginate(25);
                break;
            
            default:
                    $objetos=Pagare::
                    IdCotizacion($request->get('id_cotizacion'))
                    ->IdContratoCompraVenta($request->get('id_contrato_compra_venta'))
                    ->ObligacionSuscriptor($request->get('obligacion_suscriptor'))
                    ->paginate(25);
                # code...
                break;

        }
        if ($request->wantsJson())
        {
            return response()->json(
            [
                "msg"=>"Success",
                "pagares"=>$objetos->toArray()
            ],200
            );

        }else
        {

           return view('pagares.index',  compact('objetos','request'));
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
        $id_cotizacion=$request->id_cotizacion;
        return view('pagares.create',  compact('id_cotizacion'));
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
        Pagare::create($request->all());
        return response()->json(
                [
                    "msg"=>"Success",
                ],200
                );
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
        $objeto = Pagare::find($id);
            return response()->json(
                [
                    "msg"=>"Success",
                    "pagares"=>$objeto->toArray()
                ],200
                );
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
            return view('pagares.edit',compact('id'));
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
        $objeto = Pagare::findOrFail($id);
            $objeto->update($request->all());
            return response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
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
        
        $objeto = Pagare::findOrFail($id);
		$objeto->delete();
		return response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
    }
}
