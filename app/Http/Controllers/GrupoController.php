<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Grupo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
//        dd($request->path());
        switch ($request->path()) {
            case 'grupos/eliminados'://query eliminados paginados
                $objetos=    Grupo::onlyTrashed()->grupo($request->grupo)->paginate(25);
                //$sub=$objetos->render();
                //$objetos->paginar=  str_replace('?', '?vi=0&', $sub);
                break;//query todos los grupo sin pàginar
            default:                
                $objetos =Grupo::grupo($request->grupo)->get();
                break;
        }
        if($request->wantsJson())
        {
            return response()->json(
            [
                "msg"=>"Success",
                "grupos"=>$objetos->toArray()
            ],200
            );
        }elseif($request->path()=='grupos/eliminados'){
            return view('grupos.eliminados',  compact('objetos','request'));
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
        Grupo::create($request->all());
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
        $objetos =Grupo::find([$id]);
        if($objetos)
        {
                return response()->json(
            [
                "msg"=>"Success",
                "grupos"=>$objetos->toArray()
            ],200
            );
            
        }  else {
            abort(404);
        }
        
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
        try {
            $objeto=Grupo::findOrFail($id);
            $objeto->update($request->all());
        } catch (Exception $exc) {
            abort(400);
            return response()->json(
            [
                "msg"=>"Error"
            ],400
            );
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
        try {
            $objeto = Grupo::withTrashed()->findOrFail($id);
            if($objeto->trashed())
                    {
                           $objeto->restore();
                    }else
                    {//Borrado logico 
                            # code...
                            $objeto->grupo_usuario()->delete();//BORRA LOS USUARIOS RELACIONADOS AL GRUPO
                            $objeto->delete();
                    }
                return response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
        } catch (Exception $exc) {
            abort('400');
            }
    
        
    }
}
