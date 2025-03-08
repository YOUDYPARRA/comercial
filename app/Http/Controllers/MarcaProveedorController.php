<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MarcaProveedor;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarcaProveedorController extends Controller
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
        $objetos=marcaProveedor::onlyTrashed()
            ->NombreProveedor($request->get('nombre_proveedor'))
            ->MarcaRepresentada($request->get('marca_representada'))
            ->DiasEntregaMaximo($request->get('dias_entrega_maximo'))
            ->DiasEntregaMinimo($request->get('dias_entrega_minimo'))
            ->Observacion($request->get('observacion'))
            ->paginate(2);
            return view('marcas_proveedores.restore',  compact('objetos','request'));
            /*return response()->json(
                [
                    "msg"=>"Success",
                    "marcas_proveedores"=>$objetos->toArray()
                ],200
                );*/
            break;
        
        default:
            # code...
        $objetos=marcaProveedor::id($request->get('id'))
            ->NombreProveedor($request->get('nombre_proveedor'))
            ->MarcaRepresentada($request->get('marca_representada'))
            ->DiasEntregaMaximo($request->get('dias_entrega_maximo'))
            ->DiasEntregaMinimo($request->get('dias_entrega_minimo'))
            ->Observacion($request->get('observacion'))
            ->paginate(25);
            /*dd($objetos);*/


        if ($request->wantsJson())
            {
                return response()->json(
                [
                    "msg"=>"Success",
                    "marcas_proveedores"=>$objetos->toArray()
                ],200
                );

            }else
            {
            
                return view('marcas_proveedores.index',  compact('objetos','request'));
            }
            
            
            break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('marcas_proveedores.create');
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
        marcaProveedor::create($request->all());
        return response()->json(
                [
                    "msg"=>"Success"
                ],200);
        //return redirect('marcas_proveedores');
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
        $objeto = marcaProveedor::find($id);
            //realizar consulta marcaProveedor
        //ECHO 'SALIDA'.$objeto;
            return response()->json(
                [
                    "msg"=>"Success",
                    "marca_proveedor"=>$objeto->toArray()
                ],200);
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
        return view('marcas_proveedores.edit',compact('id'));
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
        //dd($request->all());
        $objeto = marcaProveedor::find($id);
        
            $objeto->update($request->except(['created_at','updated_at']));
            return response()->json(
                [
                    "msg"=>"Success"
                ],200);
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
                $objeto = marcaProveedor::withTrashed()                
                ->find($id);
                if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico 
                        # code...
                        $objeto->delete();
                }
                return response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
    }
}