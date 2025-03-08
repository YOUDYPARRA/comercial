<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConfiguracionClase;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  ConfiguracionClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $objetos=ConfiguracionClase::buscar($request->all())->paginate(25);
        return view('configuraciones_clases.index',  compact('objetos','request'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('configuraciones_clases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ConfiguracionClase::create($request->all());
        return redirect('configuracion_clase');
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
        $objeto = ConfiguracionClase::find($id);
            //realizar consulta Configuraciones_clase
            return view('configuraciones_clases.partials.FormDelete',compact('objeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { //dd("ok");
        $objeto = ConfiguracionClase::find($id);
        //dd($objeto);
            //realizar consulta Configuraciones_clase
            return view('configuraciones_clases.edit',  compact('objeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    $objeto = ConfiguracionClase::find($id);
            $objeto->update($request->all());
            return redirect('configuracion_clase')->withSuccess('EL REGISTRO SE HA ACTUALIZADO CORRECTAMENTE ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objeto = ConfiguracionClase::find($id);
    		$objeto->delete();
           // $objeto->permisos()->delete();
    		return redirect('configuracion_clase')->withSuccess('EL REGISTRO SE HA ELIMINADO CORRECTAMENTE ');
    }
}
