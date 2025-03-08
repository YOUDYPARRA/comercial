<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch ($request->vi) {
            case '0'://Envia los elementos

                $objetos=Producto::onlyTrashed()
                    ->Menu($request->get('nombre'))
                    ->paginate(25);
                $sub=$objetos->render();
                $objetos->paginar=  str_replace('?', '?vi=0&', $sub);
                break;
            case '1'://Envia los elementos

                $objetos=Producto::all();
                
                break;
            default:

                $objetos=Producto::nombre($request->get('nombre'))
                    ->paginate(15);
//                $objetos=Producto::all();
                break;
        }
        //dd($objetos);
        if($request->wantsJson())
        {
            return response()->json(
            [
                "msg"=>"Success",
                "productos"=>$objetos->toArray()
            ],200
            );
        }else if($request->vi=='0')
        {
            return view('productos.restaurar',  compact('objetos','request'));
        }  else             
        {
            return view('productos.index',  compact('objetos','request'));
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
        return view('productos.create');
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

        //dd($request);
        Producto::create($request->all());
        return redirect('productos');
        
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
        try {
            $objeto = Producto::findOrFail($id);
            return response()->json(
            [
                "msg"=>"Success",
                "productos"=>$objeto->toArray()
            ],200
            );
        } catch (Exception $exc) {
            return response()->json(
                [
                    "msg"=>"Error"
                ],500
                );
        }

            //realizar consulta Menus
            
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
        try {
            $objeto = Producto::findOrFail($id);
            return view('productos.edit',  compact('objeto'));
        } catch (Exception $ex) {
            abort('404');
        }
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
        try {
            $objeto = Producto::findOrFail($id);
                $objeto->update($request->all());
                return redirect('productos');
            
        } catch (Exception $exc) {
        abort('404');
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
        //AL ELIMINAR EL MENU, SE DEBE ELIMINAR TAMBIEN DE RECURSOS Y DE PERMISOS...
        try {            
            $objeto = Producto::withTrashed()->findOrFail($id);
            if($objeto->trashed())
                    {
                           $objeto->restore();
                    }else
                    {//Borrado logico 
                            # code...
                        //borrar menu
                        //buscar recursos :menu.id==recursos.id_menu
                        //buscar permisos: menu.id==permisos.id_menu
                        //borrar recursos
                        //borrar permisos
                        $objeto->permisos()->delete();
                        $objeto->recursos()->delete();
                        $objeto->delete();
                    }
            return redirect('productos');
        } catch (Exception $exc) {
            abort('400');
            }
    }
}
