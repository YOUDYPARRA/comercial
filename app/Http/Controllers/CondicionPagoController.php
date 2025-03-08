<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CondicionPago;
use App\Http\Requests\CondicionPagoStoreRequest;
use App\Http\Requests;

use App\Http\Controllers\Controller;

class  CondicionPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->wantsJson()){
        //dd($request->wantsJson());
            $objetos=CondicionPago::IdMarca($request->get('id_marca'))
            ->Etiqueta($request->get('etiqueta'))
            ->Instituto($request->get('instituto'))
            ->Condicion($request->get('condicion'))
            ->get();
                return response()->json(
                    [
                        "msg"=>"Successx",
                        "condicion_pago"=>$objetos->toArray()
                    ],200
                    );
        }else{
            $objetos=CondicionPago::IdMarca($request->get('id_marca'))
            ->Etiqueta($request->get('etiqueta'))
            ->Instituto($request->get('instituto'))
            ->Condicion($request->get('condicion'))
            ->paginate(25);
    //        dd($objetos);
            return view('condiciones_pagos.index',  compact('objetos','request'));
        }
    }
    public function indexRestaurar(Request $request)
    {
        if($request->wantsJson()){
            $objetos=CondicionPago::all();
            return response()->json(
                [
                    "msg"=>"Success",
                    "ultimo"=>$objetos->toArray()
                ],200
                );
        }else{
            
        }
        $objetos=CondicionPago::onlyTrashed()
        ->IdMarca($request->get('id_marca'))
        ->Etiqueta($request->get('etiqueta'))
        ->Instituto($request->get('instituto'))
        ->Condicion($request->get('condicion'))
        ->paginate(25);
        return view('condiciones_pagos.indexRestaurar',  compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('condiciones_pagos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CondicionPagoStoreRequest $request)
    {
        //
        CondicionPago::create($request->all());
        return response()->json(
                [
                    "msg"=>"Guardado Correcto"
                ],200);
        //return redirect('condiciones_pagos');
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
        $objeto = CondicionPago::find($id);
        if($request->wantsJson()){
            //$objetos=CondicionPago::all();
            return response()->json(
                    $objeto->toArray(),
                    200
                );
        }else{
            return view('condiciones_pagos.show',compact('objeto'));
        }
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
        $objeto = CondicionPago::findOrFail($id);
            //realizar consulta condiciones_pagos
            return view('condiciones_pagos.edit',compact('objeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CondicionPagoStoreRequest $request, $id)
    {
        //
        $objeto = CondicionPago::find($id);
            $objeto->update($request->all());
            return response()->json(
                [
                    "msg"=>"Actualizacion correcta"
                ],200);

            //return redirect('condiciones_pagos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $objeto = CondicionPago::withTrashed()                
                ->find($id);
                if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico 
                        # code...
                        $objeto->delete();
                } 
                return redirect('condiciones_pagos');
    }
}
