<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Componente;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  ComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // dd($request->get('tipo'));
        if($request->wantsJson())
        {   $linea="";
           // if($request->get('tipo') != ""){
           // $linea=($request->get('tipo'));}
            $objetos=Componente::Id($request->get('id'))
            ->Linea($request->get('linea'))
            ->Componente($request->get('componente'))
            ->agrupar($request->get('agrupar'))
            ->get();

            return response()->json(
            [
                "msg"=>"Success",
                "componentes"=>$objetos->toArray()
            ],200
            );
        }else
        {
            $objetos=Componente::Id($request->get('id'))
            ->Linea($request->get('linea'))
            ->Componente($request->get('componente'))
            ->paginate(25);
            return view('componentes.index',  compact('objetos','request'));            
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
        return view('componentes.create');
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
        Componente::create($request->all());
        return redirect('componentes');
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
        $objeto = Componente::find($id);
        if($objeto){
            return $objeto;            
        }
            //realizar consulta Componente
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
        $objeto = Componente::find($id);
//        dd($objeto);
        if($objeto)
        {
            return view('componentes.edit',compact('objeto'));
        }else{
            abort(404);
        }
            //realizar consulta Componente
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
        $objeto = Componente::find($id);
        if($objeto){
            
            $objeto->update($request->all());
            return redirect('componentes');
        }  else {
            abort(401);    
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
//        $objeto = Componente::find($id);
//		$objeto->delete();
//		return redirect('componentes');
    }
}
