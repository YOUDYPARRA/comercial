<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;
use App\Helpers\HelperUsuario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EstadoController extends Controller
{
    protected $estado;
    protected $usuario;
    public function __construct(Estado $estado,HelperUsuario $consulta_usuario){        
         $this->estado= new Estado();
         //$this->usuario= $consulta_usuario;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $objetos=$this->estado->buscar($request->all())
                ->orderBy('created_at','desc')
                ->paginate(15);
            return view('estados.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estados.create');
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
        $this->estado->fill($request->all());
        if(strlen($request->etiqueta_aprobacion)==0){
            $this->estado->etiqueta_aprobacion=$request->aprobacion;
        }
        $this->estado->save();
        $aviso=$this->estado->aviso($request->all());
        dd($this->estado);
        //return back()->withInput->();
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
        $objetos=$this->estado->FindOrFail($id);
        return view('estados.show',compact('objetos'));
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
        $objeto=$this->estado->FindOrFail($id);
        return view('estados.edit',compact('objeto'));
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
        $objeto=$this->estado->FindOrFail($id);
        $objeto->update($request->all());
        return redirect()->action('EstadoController@index');

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
        $objeto=$this->estado->FindOrFail($id);
        $objeto->avisos()->delete();
        $objeto->delete();
        return redirect()->action('EstadoController@index');
    }
}
