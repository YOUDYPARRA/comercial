<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CondicionCotizacion;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  CondicionCotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        //$objetos=CondicionCotizacion::precio()
        $objetos=CondicionCotizacion::condiciones();
        return response()->json(
                [
                    "msg"=>"Success",
                    "condiciones"=>$objetos
                ],200
                );
        //$objetos=CONDICIONES_COTIZACION::precio($request->get('precio'))
/*->TiempoEntrega($request->get('tiempo_entrega'))
->CondicionPago($request->get('condicion_pago'))
->GuiaMecanicaSalvaguardaInstalacion($request->get('guia_mecanica_salvaguarda_instalacion'))
->Garantia($request->get('garantia'))
->Capacitacion($request->get('capacitacion'))
->Validez($request->get('validez'))
->Reporte($request->get('reporte'))
->Anticipo($request->get('anticipo'))
->Contacto($request->get('contacto'))
->paginate(25);*/
            
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