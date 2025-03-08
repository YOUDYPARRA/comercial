<?php

namespace App\Http\Controllers;
use App\Cotizacion;
use App\Calificacion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
      if(isset($request->clase)){

      switch ($request->clase) {
        case 'cotizacion':
          $cotizacion = Cotizacion::findOrFail($id);
          $calificacion=Calificacion::where('id_producto',$id)
          ->where('nombre_tipo',$request->clase)->get();
          return view('calificaciones.cotizacion',compact('cotizacion','calificacion'));
          break;
        default:
        $calificacion=Calificacion::where('id_producto',$id)
        ->where('nombre_tipo',$request->clase)->get();
        return view('calificaciones.calificacion',compact('calificacion'));
          break;
      }
    }//fin existe

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
