<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModoEnvio;
use App\Http\Requests;
use App\Http\Requests\ModoEnvioStoreRequest;
use App\Http\Controllers\Controller;

class  ModoEnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->wantsJson()){
            $objetos=ModoEnvio::all();
            return response()->json(
                [
                    "msg"=>"Success",
                    "ultimo"=>$objetos->toArray()
                ],200
                );


        }else{
            $objetos=ModoEnvio::TipoEnvio($request->get('tipo_envio'))
            ->orderBy('updated_at')
            ->paginate(25);
            return view('modos_envios.index',  compact('objetos','request'));

        }
    
        
    }

    public function indexRestaurar(Request $request)
    {
        
            $objetos=ModoEnvio::OnlyTrashed()
            ->TipoEnvio($request->get('tipo_envio'))
            ->orderBy('updated_at')
            ->paginate(25);
            return view('modos_envios.indexRestaurar',  compact('objetos','request'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('modos_envios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModoEnvioStoreRequest $request)
    {
        //
        ModoEnvio::create($request->all());
        return redirect('modos_envios');
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
        $objeto = ModoEnvio::findOrFail($id);
            //realizar consulta modos_envios
            return view('modos_envios.show',compact('objeto'));
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
        $objeto = ModoEnvio::findOrFail($id);
            //realizar consulta modos_envios
            return view('modos_envios.edit',compact('objeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModoEnvioStoreRequest $request, $id)
    {
        //
        $objeto = ModoEnvio::find($id);
            $objeto->update($request->all());
            return redirect('modos_envios');
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
        
        $objeto = ModoEnvio::withTrashed()
        ->findOrFail($id);
		 if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico 
                        # code...
                        $objeto->delete();
                } 
		return redirect('modos_envios');
    }
}
