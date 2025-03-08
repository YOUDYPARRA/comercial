<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UnidadMedida;
use App\Http\Requests;
use App\Http\Requests\UnidadMedidaStoreRequest;
use App\Http\Controllers\Controller;
use App\Services\PgManager;


class  UnidadMedidaController extends Controller{
    protected $pg_query;
    public function __construct(PgManager $sql){
        $this->pg_query=$sql;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){       //
        if ($request->wantsJson()){
            $objetos=UnidadMedida::buscar($request->all())->get();
            return response()->json([
                    "msg"=>"Success",
                    "objetos"=>$objetos->toArray()
                ],200);
        }
        $objetos=UnidadMedida::all();
            return view('unidades_medidas.index',  compact('objetos'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restaura(Request $request){
        $objetos=UnidadMedida::onlyTrashed()->paginate(25);
            return view('unidades_medidas.restaurar',  compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function create()
    //{
        //
        //return view('unidades_medidas.create');
    //}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnidadMedidaStoreRequest $request){
        foreach ($request->all() as $key => $value) {            # code...
            $obj[$key]=$value;
        }
        UnidadMedida::create($obj);
        if ($request->wantsJson()){
                return response()->json([
                    "msg"=>"Success",
                ],200);
        }
        return redirect('unidades_medidas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){//
        $objeto = UnidadMedida::find($id);
        if ($request->wantsJson()){
            return response()->json([
                    "msg"=>"Success",
                    "objetos"=>$objeto->toArray()
                ],200);       
        }//realizar consulta Unidades_medidas
            return view('unidades_medidas.show',compact('objeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){//
        $objeto = UnidadMedida::find($id);//realizar consulta Unidades_medidas
            return view('unidades_medidas.edit',  compact('objeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $objeto = UnidadMedida::find($id);
        $objeto->update($request->all());
        return redirect('unidades_medidas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){//
        $objeto = UnidadMedida::withTrashed()->findOrFail($id);
        if($objeto->trashed()){//Si esta eliminado va a restaurar.
                       $objeto->restore();
        }else{//Borrado logico            # code...
            $objeto->delete();
        } 
		return redirect('unidades_medidas');
    }
}
