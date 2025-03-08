<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coordinacion;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  CoordinacionController extends Controller
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

                $objetos=Coordinacion::onlyTrashed()
                    ->Menu($request->get('nombre'))
                    ->paginate(25);
                $sub=$objetos->render();
                $objetos->paginar=  str_replace('?', '?vi=0&', $sub);
                break;
            case '1'://Envia los elementos

                $objetos=Coordinacion::groupBy('nombre')->get();
                
                break;
            default:

                $objetos=Coordinacion::nombre($request->get('nombre'))
                    ->paginate(15);
//                $objetos=Coordinacion::all();
                break;
        }
        //dd($objetos);
        if($request->wantsJson())
        {
            return response()->json(
            [
                "msg"=>"Success",
                "objetos"=>$objetos->toArray()
            ],200
            );
        }else if($request->vi=='0')
        {
            return view('coordinaciones.restaurar',  compact('objetos','request'));
        }  else             
        {
            return view('coordinaciones.index',  compact('objetos','request'));
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
        return view('coordinaciones.create');
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
        //dd($request->all());
        Coordinacion::create($request->all());
        return redirect('coordinaciones');
        
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
            $objeto = Coordinacion::findOrFail($id);
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
        
        $objeto = Coordinacion::findOrFail($id);
        return view('coordinaciones.edit',  compact('objeto'));
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
            $objeto = Coordinacion::findOrFail($id);
                $objeto->update($request->all());
                return redirect('coordinaciones');
            
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
            $objeto = Coordinacion::withTrashed()->findOrFail($id);
            if($objeto->trashed())
                    {
                           $objeto->restore();
                    }else
                    {//Borrado logico 
                            # code...
                        $objeto->delete();
                    }
            return redirect('coordinaciones');
        } catch (Exception $exc) {
            abort('400');
            }
    }
}
