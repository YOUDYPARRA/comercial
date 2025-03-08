<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    public function index(Request $request) 
    {
        dd($request);

        $data = [
                 'numero_cotizacion'=> $request->get('numero_cotizacion'),
                 'version'          => $request->get('version'),
                 'fecha'            => $request->get('fecha'),
                 'nombre_empleado'  => $request->get('nombre_empleado'),
                 'tipo_cliente'     => $request->get('tipo_cliente'),
                 'nombre_fiscal'    => $request->get('nombre_fiscal'),
                 'direccion_fiscal' => $request->get('direccion_fiscal'),
                 'rfc'              => $request->get('rfc'),
                 'fecha_entrega'    => $request->get('fecha_entrega'),
                 'nombre_cliente'   => $request->get('nombre_cliente'),
                 'calle_entrega'    => $request->get('calle_entrega'),
                 'telefono'         => $request->get('telefono'),
                 'celular'          => $request->get('celular'),
                 'contacto'         => $request->get('contacto'),
                 'correo'           => $request->get('correo'),
                 'apoderado'        => $request->get('apoderado'),

                 // 'Cantidad'    => '1',
                 // 'Descripcion' => 'Descripcion',
                 // 'Precio'      => '$ 000,000.00',
                 // 'Total'       => '$ 000,000.00'
                 ];
        //$data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "COTIZACION";
        $view =  \View::make('cotizaciones.pdf.invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }
 
    public function getData(Request $request) 
    {
        $data =  [
            'fecha'=>'fecha',
            'tipo_cliente'=>'tipo_cliente',
            'Cantidad'      =>  $request->get('ok'),
            'Descripcion'   => 'texto',
            'Precio'   => '500',
            'Total'     => '500'
        ];
        return $data;
    }
    /**
     * Display a listing of the resource.
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
