<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatalogoCalculo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  CatalogoCalculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    switch ($request->vi) {
            case '0'://devuelve los eliminados
                # code...
                $objetos=CatalogoCalculo::onlyTrashed()
                ->modelo($request->get('modelo'))
                ->Usuario($request->get('usuario'))
                ->actualizadoel($request->get('actualizado'))
                ->paginate(25);
                $subject=$objetos->render();
                    $objetos->paginado=str_replace("?", "?vi=0&", $subject);
                break;
            
            default:
                # code...
            $objetos=CatalogoCalculo::
                modelo($request->get('modelo'))
                ->Usuario($request->get('usuario'))
                ->actualizadoel($request->get('actualizado'))
                ->paginate(25);
                break;
        }    

        if ($request->wantsJson())
        {
            return response()->json(
            [
                "msg"=>"Success",
                "pagares"=>$objetos->toArray()  //catalogo
            ],200
            );

        }else
        {
            
            if($request->vi=='0')
            {
                return view('catalogos_calculo.restaurar',  compact('objetos','request'));
            }else
            {
                return view('catalogos_calculo.index',  compact('objetos','request'));
            }

           
       }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $modelo=$request->modelo;
        return view('catalogos_calculo.create',compact('modelo'));
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
        CatalogoCalculo::create($request->all());
        return response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
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
                    
            $objeto = CatalogoCalculo::findOrFail($id);
                $return = response()->json(               //ERROR DE SINTAXIS FALTA=
                    [
                        "msg"=>"Success",
                        'catalogo_precalculo'=>$objeto
                    ],200
                    );
                } catch (Exception $e) {
                    $return = response()->json(               //ERROR DE SINTAXIS FALTA=
                    [
                        "msg"=>"Fail"
                    ],500
                    );
                }
        return $return;
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
            
            $objeto = CatalogoCalculo::findOrFail($id);
                //realizar consulta Catalogos_precalculo
                return view('catalogos_calculo.edit',compact('id'));      //ERROR DE SINTAXIS FALTA ;
        } catch (Exception $e) {
                       return view('404');          //ERROR DE SINTAXIS FALTA ;
        }
    }
     /*                                                 //ERROR DE SINTAXIS FALTA /
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $objeto = CatalogoCalculo::findOrFail($id);
                $objeto->update($request->all());
            $rtn=response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
        } catch (Exception $e) {
            $rtn=response()->json(
                [
                    "msg"=>"Fail"
                ],500
                );
        }
            return $rtn; 
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
        try {
            
            $objeto = CatalogoCalculo::withTrashed()->findOrFail($id);
            if($objeto->trashed())
                    {
                           $objeto->restore();
                    }else
                    {//Borrado logico 
                            # code...
                            $objeto->delete();
                    }
            $return = response()->json(                 //ERROR DE SINTAXIS FALTA=
                    [
                        "msg"=>"Success"
                    ],200
                    );
        } catch (Exception $e) {
            $return = response()->json(                 //ERROR DE SINTAXIS FALTA=
                    [
                        "msg"=>"Fail"
                    ],404
                    );
        }
        return $return;
    }
}
