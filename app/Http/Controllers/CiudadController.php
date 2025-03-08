<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->wantsJson()){
            $objetos=Ciudad::nombre($request->nombre)
            ->idEstado($request->id_estado)
            ->idCiudad($request->id_ciudad)
            ->clase($request->clase)
            ->orderBy('nombre')
            ->get();
            return response()->json(
                [
                    "msg"=>"Success",
                    "objetos"=>$objetos->toArray()
                ],200
                );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Regresa las ciudades, recibe el id del estado
        $arr=[];
        //if ($request->wantsJson()){
            $estado_ciudad=Ciudad::idEstado($id)->get();
            foreach ($estado_ciudad as $value) {
                $arr[]=Ciudad::find($value->id_ciudad);
            }
            asort($arr);
            return response()->json(
                [
                    "msg"=>"Success",
                    "objetos"=>$arr
                ],200
                );
        //}
        
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