<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Documento;
use App\Clase as Convenio;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConvenioController extends Controller
{
    protected $arr_obj=null;
    protected $documentos=null;
    protected $tablauno=null;
    protected $tablados=null;
    protected $head=null;
    protected $foot=null;
    protected $fin=null;
    protected $fecha_inicio_garantia=null;
    protected $fecha_fin_garantia=null;
    protected $fecha_inicio_contrato=null;
    protected $fecha_fin_contrato=null;
    protected $fecha_contrato=null;
    
    protected $convenio=null;
    protected $contrato=null;
    protected $clase='CNV';
    public function __construct(){     
        $this->arr_obj=array('clase'=>$this->clase,'sucursal'=>auth()->user()->lugar_centro_costo,'organizacion'=>auth()->user()->org_name);
        $this->convenio=new Convenio($this->arr_obj);
        $this->head= new Documento(['clase'=>$this->clase]);
        $this->foot= new Documento(['clase'=>$this->clase]);
        $this->fin= new Documento(['clase'=>$this->clase]);
        $this->contrato= new Contrato(['clase'=>$this->clase]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('convenios.create');
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
        Log::info('CONVENIO: '.json_encode($request->all()));

            if(!empty($request->fecha_inicio_garantia)){
                $this->fecha_inicio_garantia=Carbon::createFromFormat('d-m-Y H',$request->fecha_inicio_garantia.'23');
            }
            if(!empty($request->fecha_fin_garantia)){
                $this->fecha_fin_garantia=Carbon::createFromFormat('d-m-Y H',$request->fecha_fin_garantia.'23');
            }
            if(!empty($request->fecha_inicio_contrato)){
                $this->fecha_inicio_contrato=Carbon::createFromFormat('d-m-Y H',$request->fecha_inicio_contrato.'23');
            }
            if(!empty($request->fecha_fin_contrato)){
                $this->fecha_fin_contrato=Carbon::createFromFormat('d-m-Y H',$request->fecha_fin_contrato.'23');
            }
            if(!empty($request->fecha_pago_inicial)){
                $this->fecha_pago_inicial=Carbon::createFromFormat('d-m-Y H',$request->fecha_pago_inicial.'23');
            }
            if(!empty($request->fecha_contrato)){
                $this->fecha_contrato=Carbon::createFromFormat('d-m-Y H',$request->fecha_contrato.'23');
            }


        $tablauno=json_encode($request->tabla);
        $tablados=json_encode($request->tablados);
        $this->contrato->refacciones=$request->refacciones;
        $this->contrato->refacciones_excepciones=$request->refacciones_excepciones;
        $this->contrato->fecha_inicio_contrato=$this->fecha_inicio_contrato;
        $this->contrato->fecha_fin_contrato=$this->fecha_fin_contrato;
        $this->contrato->fecha_contrato=$this->fecha_contrato;
        $this->contrato->fecha_fin_garantia=$this->fecha_fin_garantia;
        $this->contrato->monto_total_contrato=$request->monto_total_contrato;
        $this->contrato->tipo_contrato=$request->tipo_contrato;

        $this->convenio->fill($request->all());
        
        //dd($this->convenio);

        $this->tablauno=$tablauno;
        $this->tablados=$tablados;
        $this->head=$head;
        $this->foot=$foot;
        $this->fin=$fin;
        if(empty($request->id)){
            $this->convenio->save();
            $this->contrato->id_foraneo=$this->convenio->id;
            $this->tablauno=$this->convenio->id;
            $this->tablados=$this->convenio->id;
            $this->head=$this->convenio->id;
            $this->foot=$this->convenio->id;
            $this->fin=$this->convenio->id;
            $this->contrato->save();
            $this->tablauno->save();
            $this->tablados->save();
            $this->head->save();
            $this->foot->save();
            $this->fin->save();
        }else{
            $this->convenio->save();

        }

        return response()->json(
            [
                "objeto"=>$this->convenio->toArray(),
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
    }
}
