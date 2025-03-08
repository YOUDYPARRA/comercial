<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clasificacion;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClasificacionController extends Controller
{
    protected $objeto;
    public function __construct(Clasificacion $clasificacion){        
         $this->objeto= new Clasificacion();
         //$this->usuario= $consulta_usuario;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $objetos=$this->objeto->buscar($request->all())
                ->orderBy('updated_at','desc')
                ->paginate(15);
            return view('clasificaciones.index',compact('objetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('clasificaciones.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->objeto->fill($request->all());
        $this->objeto->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objetos=$this->objeto->where('id_foraneo',$id);
        return view('clasificaciones.show',compact('objetos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
            $objeto=$this->objeto->FindOrFail($id);
            return view('tickets.edit',compact('objeto'));
        */
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
        $objeto=$this->objeto->FindOrFail($id);
        $objeto->save($request->all());
        return back();
    }
}
