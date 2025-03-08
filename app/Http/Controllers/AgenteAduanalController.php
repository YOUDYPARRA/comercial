<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgenteAduanal;
use App\Http\Requests;
use App\Http\Requests\AgenteAduanalStoreRequest;
use App\Http\Controllers\Controller;

class  AgenteAduanalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->wantsJson()){
            $objetos=AgenteAduanal::AgenteAduanal($request->get('agente_aduanal'))->get();
            return response()->json(
                [
                    "msg"=>"Success",
                    "agentes"=>$objetos->toArray()
                ],200
                );


        }else{
            $objetos=AgenteAduanal::AgenteAduanal($request->get('agente_aduanal'))
            ->Telefono($request->get('telefono'))
            ->Fax($request->get('fax'))
            ->Email($request->get('email'))
            ->OrderBy('updated_at')
            ->paginate(25);
            return view('agentes_aduanales.index',  compact('objetos','request'));
        }
    
        
    }
    public function indexRestaurar(Request $request)
    {
        
            $objetos=AgenteAduanal::onlyTrashed()
            ->AgenteAduanal($request->get('agente_aduanal'))
            ->Telefono($request->get('telefono'))
            ->Fax($request->get('fax'))
            ->Email($request->get('email'))
            ->OrderBy('updated_at')
            ->paginate(25);
            return view('agentes_aduanales.indexRestaurar',  compact('objetos','request'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agentes_aduanales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgenteAduanalStoreRequest $request)
    {
        //
        AgenteAduanal::create($request->all());
        return redirect('agentes_aduanales');
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
        $objeto = AgenteAduanal::find($id);
            //realizar consulta Agentes_aduanales
            return view('agentes_aduanales.show',compact('objeto'));
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
        $objeto = AgenteAduanal::findorFail($id);
            //realizar consulta Agentes_aduanales
            return view('agentes_aduanales.edit',compact('objeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgenteAduanalStoreRequest $request, $id)
    {
        //
        $objeto = AgenteAduanal::findorFail($id);
            $objeto->update($request->all());
            return redirect('agentes_aduanales');
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
        
        $objeto = AgenteAduanal::withTrashed()
        ->find($id);
		 if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico 
                        # code...
                        $objeto->delete();
                } 
		return redirect('agentes_aduanales');
    }
}
