<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InsumoOpcional;
use App\Insumo;
use App\Componente;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  InsumoOpcionalController extends Controller
{
    public function consultar(Request $request)
    {
        //dd($request->get('bandera_insumo'));
        //var_dump($prueba);
      //  if($request->get('agrupar') != ""){
        //    $id_componente=($request->get('agrupar'));}else{$id_componente="";}
        $insumos = InsumoOpcional::on('mysql')
            ->idInsumo($request->get('id_insumo'))
            ->IdComponente($request->get('id_componente'))
            ->idPertenece($request->get('id_pertenece'))
            ->agrupar($request->get('agrupar'))
            ->get();
        
        foreach ($insumos as $key => $value) {
            //dd($value->id_pertenece);
            $insumo=Insumo::find($value->id_pertenece);
            //dd($insumo);
            $value->pertenece_bandera_insumo=$insumo->bandera_insumo;
            $value->pertenece_codigo_proovedor=$insumo->codigo_proovedor;
            $value->pertenece_descripcion=$insumo->descripcion;
            $value->precio=$insumo->precio;
            $value->tipo_cambio=$insumo->tipo_cambio;
            $value->descripcion=$insumo->descripcion;
            $value->unidad_medida=$insumo->unidad_medida;
            $value->estado=$insumo->estado;
        }
        foreach ($insumos as $key => $value) {
            //dd($value->id_pertenece);
            $componente=Componente::find($value->id_componente);
            //dd($insumo);
            $value->linea=$componente->linea;
            $value->componente=$componente->componente;
        }
        foreach ($insumos as $key => $value) {
            //dd($value->id_pertenece);
            $insumo=Insumo::find($value->id_insumo);
            //dd($insumo);
            $value->insumo_bandera_insumo=$insumo->bandera_insumo;
            $value->insumo_codigo_proovedor=$insumo->codigo_proovedor;
            $value->insumo_descripcion=$insumo->descripcion;
        }
//dd($insumos->toArray());
        return response()->json(
                [
                    "msg"=>"Success",
                    "insumos_opcionales"=>$insumos->toArray()
                ],200
                );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // if($request->ajax()){
            $objetos=InsumoOpcional::idInsumo($request->get('id_insumo'))
            ->IdComponente($request->get('id_componente'))
            ->IdPertenece($request->get('id_pertenece'))
            ->get();
                return response()->json(
                [
                    "msg"=>"Success",
                    "insumos_opcionales"=>$objetos->toArray()
                ],200
                );
            
       // }  else {
         //   abort(404);
        //}
//            return view('insumos_opcionales.index',  compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort(404);
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
        $objeto=InsumoOpcional::create($request->all());
        if($objeto)
        {
            return response()->json(
                [
                    "msg"=>"Success"
                ],200);
        }else{
            abort(404);
        }
        
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
        $objeto = InsumoOpcional::find($id);
        if($objeto)
        {
                return response()->json(
                [
                    "msg"=>"Success",
                    "insumo_opcional"=>$objeto->toArray()
                ],200
                );
        }  else {
            abort(404);    
        }
            //realizar consulta Insumos_opcionales
            
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
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
//        $objeto = InsumoOpcional::find($id);
//        if($objeto){
//            $objeto->update($request->all);
//            return redirect('insumos_opcionales');
//            
//        }  else {
//            abort(404);    
//        }
        abort(404);
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
        $objeto = InsumoOpcional::find($id);
        if($objeto){
            $objeto->delete();
            
                return response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
            
        }else{abort(404);}
    }
}
