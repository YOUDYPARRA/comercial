<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recurso;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//         $this->middleware('auth');
//    }
    public function index(Request $request)
    {
        //
        switch ($request->vi) {
            case '0'://MUESTRA ELIMINADOS
                # code...
                $objetos=Recurso::onlyTrashed()
                    ->paginate(15);                    
                    $subject=$objetos->render();
                    $objetos->paginado=str_replace("?", "?vista=0&", $subject);
                    return view('recursos.restaura',  compact('objetos','request'));
                break;
            case '1'://MUESTRA TODOS REGRESA ARRAY JSON
                # code...
                $objetos=Recurso::get();
                return response()->json(
                [
                    "msg"=>"Success",
                    "recursos"=>$objetos->toArray()
                ],200
                );
                break;
            case '2'://MUESTRA TODOS REGRESA ARRAY JSON
                # code...
                $objetos=Recurso::where('aviso','1')->get();
                return response()->json(
                [
                    "msg"=>"Success",
                    "recursos"=>$objetos->toArray()
                ],200
                );
                break;
            
            default:
                # code...
                $objetos= Recurso::recurso($request->recurso)
                    ->idmenu($request->get('id_menu'))
                ->etiqueta($request->etiqueta)
                ->orderBy('updated_at','desc')
                ->paginate(50);
                
                if($request->wantsJson())
                {
                    $return=  response()->json(
                    [
                        "msg"=>"Success",
                        "recursos"=>$objetos->toArray()
                    ],200
                );
                }else
                {   
                    $return =view('recursos.index',compact('objetos','request'));    
                }
                return $return;
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
        return view('recursos.create');

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
        switch ($request->i) {
            case '0':
                    $objeto = Recurso::find($request->id);
                    $objeto->update(['aviso'=>$request->aviso]);
                break;
            
            default:
                $arr_url=explode('?', $request->get('recurso'));
                if(count($arr_url)>1)
                {//la url viene con parametros; comprobar url para ver si valida
                    route($arr_url[0]);
                }else
                {
                    route($request->get('recurso'));
                }
                    Recurso::create($request->all());
                break;
        }
        
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
    public function show(Request $request,$id)
    {
        //
        if($request->wantsJson()){
        $objeto=Recurso::find($id);
        return response()->json(
                [
                    "msg"=>"Success",
                    "objeto"=>$objeto->toArray()
                ],200
                );
            
        }else
        {
        return view('recursos.aviso',compact('objeto','id'));
            
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
        return view('recursos.edit',compact('id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $arr_url=explode('?', $request->get('recurso'));
                if(count($arr_url)>1)
                {//la url viene con parametros; comprobar url para ver si valida
                    route($arr_url[0]);
                }else
                {
                    route($request->get('recurso'));
                }
                $objeto = Recurso::find($id);
                if(route($request->get('recurso'))){
                    $objeto->permisos()
                    ->update([
                        'recurso'=>$request->recurso,
                        'id_menu'=>$request->id_menu
                        ]);
                    $objeto->update($request->all());
                }
        return response()->json(
                        [
                            "msg"=>"Success"
                        ],200
                        );
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
        $objeto = Recurso::withTrashed()                
        ->find($id);
        if($objeto->trashed())
        {//Si esta eliminado va a restaurar.
               $objeto->restore();
        }else
        {//Borrado logico 
                # code.../BORRAR RECURSO
            //BUSCAR EN PERMISOS EL RECURSO, 
            //BORRAR TODOS LOS PERMISOS DEL OBJETO PEMISOS.RECURSO
                $objeto->permisos()->delete();
                $objeto->delete();
        }
        return response()->json(
        [
            "msg"=>"Success"
        ],200
        );
    }
}