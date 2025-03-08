<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClasificacionOperacion;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClasificacionOperacionController extends Controller
{
    protected $objeto;
    protected $buscar;
    public function __construct(ClasificacionOperacion $clasificacion){        
         $this->objeto= new ClasificacionOperacion();
         $this->buscar=['clase'=>'PROYECTO'];
         //$this->usuario= $consulta_usuario;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()){
            $objeto=$this->objeto->buscar($request->all())->get();
            return response()->json(
                [
                    "msg"=>"Success",
                    "objeto"=>$objeto->toArray()
                ],200
                );
        }
        $objetos=$this->objeto->buscar($this->buscar+$request->all())
                ->orderBy('updated_at','desc')
                ->paginate(15);
            return view('clasificaciones_operaciones.index',compact('objetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clasificaciones_operaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->objeto->fill($request->all());
        $this->objeto->nombre=$this->nombreProyecto($request);
        //dd($this->objeto);
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
        return view('clasificaciones_operaciones.show',compact('objetos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objeto=$this->objeto->FindOrFail($id);
        return view('clasificaciones_operaciones.edit',compact('objeto'));
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
        $this->objeto->nombre=$this->nombreProyecto($request);
        $objeto->save($request->all());
        return back();
    }
    private function nombreProyecto($request){
        $nombre='';
        if(!empty($request->numero_contrato_compra_venta) && (!empty($request->nombre) ) ){

            $nombre=$request->nombre.$request->numero_contrato_compra_venta;
        }else if(!empty($request->numero_contrato_compra_venta) && (empty($nombre)) ){
            $nombre=$request->numero_contrato_compra_venta;
        }else{
            $nombre=$request->nombre;
        }
        return $nombre;
    }
}
