<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plantilla;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PlantillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->wantsJson()){
        $objetos =Plantilla::buscar($request->all())->get();
            return response()->json(
            [
                'objeto'=>$objetos->toArray(),
                "msg"=>"SUCCESS"
            ],200
            );
        }
        $objetos =Plantilla::buscar($request->all())->paginate(15);
        return view('plantillas.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plantillas.create');
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
        if(empty($request->id)){
            $objeto= new Plantilla($request->all());
            $objeto->fill($request->all());
            $objeto->autor=auth()->user()->id;
            $objeto->save();
        }else{
            $objeto= Plantilla::findOrFail($request->id);
            $objeto->fill($request->all());
            $objeto->autor=auth()->user()->id;
            $objeto->save();
            
        }
        return response()->json(
                [
                "objeto"=>$objeto->toArray(),
                    "msg"=>"GUARDADO CORRECTAMENTE"
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
        $objeto=Plantilla::findOrFail($id);
        return response()->json(
                [
                    "objeto"=>$objeto->toArray(),
                    "msg"=>"SUCCES"
                ],200
                );
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
        return view('plantillas.edit',compact('id'));
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
        $objeto=Plantilla::findOrFail($id);
        $objeto->fill($request->all());
        $objeto->save();
        return response()->json(
                [
                    "msg"=>"GUARDADO CORRECTAMENTE"
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
        $objeto = Plantilla::withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico 
                        # code...
                        $objeto->delete();
                } 
       return redirect('plantillas');
    
    }
}
