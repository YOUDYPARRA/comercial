<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase as ClaseCustodia;
use App\Custodia;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustodiaController extends Controller
{
    private $objeto;
    public function __construct(){
        $this->arr_bsc['clase']='E';
        $this->arr_bsc['organizacion']=auth()->user()->org_name;
        $this->objeto = new ClaseCustodia(['clase'=>'E','sucursal'=>auth()->user()->lugar_centro_costo,'organizacion'=>auth()->user()->org_name]);
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $custoadia=0;
        if($request->wantsJson()){

                $custodia=Custodia::buscar(['id_reporte'=>$request->id_reporte])->get();                
                //dd($custodia);
                if(count($custodia)>0){
                    $c=[];
                    $custodia[0]->rel_clase;
                    foreach ($custodia[0]->toArray() as $key =>  $value) {
                        //$custodia[0]=$value->rel_clase;
                        if(is_array($value)){
                            foreach ($value as $k => $v) {
                                # code...
                                $c[$k]=$v;
                            }

                        }else{
                            $c[$key]=$value;                            
                        }                        
                    }
                    return response()->json(
                            [
                                "msg"=>"success",
                                'custodia'=>$c
                            ],200
                            );

                }else{
                    $reporte=ClaseCustodia::findOrFail($request->id_reporte);
                            return response()->json(
                            [
                                "msg"=>"success",
                                'reporte'=>$reporte->toArray()
                            ],200
                            );
                    
                }

        }else{
            abort('505');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        return view('custodias.create',compact('id'));
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

        $this->objeto->foliar='E';
        $this->objeto->fecha_recepcion=Carbon::now();
        $this->objeto->autor=auth()->user()->iniciales;
        $this->objeto->fill($request->except(['clase','folio']));
        $custodia= new Custodia($request->all());
        //dd($this->objeto->folio);
        if ($request->wantsJson()){
            $this->objeto->save();
            $this->objeto->custodia()->save($custodia);
            return response()->json(
                [
                    "msg"=>"GUARDADO CORRECTAMENTE"
                ],200
                );
            }else{
                abort(404);
        }
/*
        "nombre_cliente":"",
        "calle":"",
        "colonia":"",
        "c_p":"",
        "ciudad":"",
        "estado":"",
        "pais":"",
        "numero":"",
        "numero_exterior":"",

        "telefonos":"",
        'celular',
        "correos":"",
        "fax":"",
        'nombre_responsable'
        
        "equipo":"",
        "marca":"",
        "modelo":"",
        "numero_serie":"",

        
        'nota_cliente',

        'condicion_servicio',
        */

        
        
        
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
        $objeto=ClaseCustodia::findOrFail($id);
        $objeto->update($request->all());
        $objeto->custodia->delete();
        $custodia= new Custodia($request->all());
        if ($request->wantsJson()){
            $this->objeto->custodia()->save($custodia);
            return response()->json(
                [
                    "msg"=>"GUARDADO CORRECTAMENTE"
                ],200
                );
            }else{
                abort(404);
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
    }
}
