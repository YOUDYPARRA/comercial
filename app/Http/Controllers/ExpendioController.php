<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase as Expendido;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompraVentaStoreRequest;
use Carbon\Carbon;
use App\Calificacion;
use Validator;
use App\Helpers\HelperUtil;
/*EQUIPOS QUE SE HAN VENDIDO Y YA TIENEN PROPIETARIO
estatus: guardado, cerrado
*/
class ExpendioController extends Controller
{
    private $objeto= null;
    protected $arr_obj=[];
    protected $arr_valid=array(
            'fecha_inicio'=>'required|date_format:d-m-Y',
            'fecha_fin'=>'required|date_format:d-m-Y',
            'nombre_fiscal'=>'required',
            'coordinacion'=>'required',
            'equipo'=>'required',
            'marca'=>'required',
            'modelo'=>'required',
            'modelo'=>'required',
            'numero_serie'=>'required',
            'folio_contrato_venta'=>'required',
            'c_bpartner_location'=>'required|min:30|max:90',
            'c_bpartner_id'=>'required|min:30|max:90'
            );
    protected $arr_msg=array(
            'c_bpartner_location.required'=>'VERIFIQUE EL TERCERO VALIDADO',
            'c_bpartner_id.required'=>'VERIFIQUE EL TERCERO VALIDADO'
            );
    public function __construct(){
        $this->arr_obj['clase']='X';
        $this->objeto=new Expendido(['clase'=>'X','sucursal'=>auth()->user()->lugar_centro_costo]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->wantsJson()){
            $objetos =Expendido::buscar($this->arr_obj+$request->all())->get();
            return response()->json(
            [
                'objeto'=>$objetos->toArray(),
                "msg"=>"SUCCESS"
            ],200
            );
        }
        $objetos = Expendido::buscar($this->arr_obj+$request->all())->paginate(15);
        return view('expendios.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expendios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompraVentaStoreRequest $request)
    {
        $objeto=[];
        //
        if(empty($request->id)){
            //VALIDAR QUE NUMERO DE SERIE NO SEA REPETIDO

            $objeto =Expendido::buscar(['clase'=>'X','numero_serie'=>trim($request->numero_serie)])->get();
            if(count($objeto)>0 ){
                return response()->json(['msg'=>"SERIE REPETID0"],422);
            }
            //FIN VALIDAR NUMERO DE SERIE
            $this->objeto->fill($request->all());
            $this->objeto->foliar='X';

        if(!empty($request->fecha_inicio)){
            $this->objeto->fecha_inicio=Carbon::parse($request->fecha_inicio)->format('Y-m-d');
            //$this->objeto->fecha_inicio=Carbon::createFromFormat('d-m-Y H',$request->fecha_inicio.'23');
        }
        if(!empty($request->fecha_fin)){
            $this->objeto->fecha_fin=Carbon::parse($request->fecha_fin)->format('Y-m-d');
            //$this->objeto->fecha_fin=Carbon::createFromFormat('d-m-Y H',$request->fecha_fin.'23');
        }
            //$this->objeto->vigencia= Carbon::now()->addWeeks(3);
            $this->objeto->autor=auth()->user()->iniciales;
            $this->objeto->save();
            $arr_equipos_contrato=$this->equipos_contrato($request->equipos,$this->objeto->id);
            $this->objeto->r_conts_eqps()->saveMany($arr_equipos_contrato);
        }else{
            //echo 'ACTUALIZAR CON ID';
            $this->objeto=$this->objeto->findOrFail($request->id);
        //HelperUtil::log($this->objeto);
         if(!empty($request->fecha_inicio)){
            $fecha_inicio=Carbon::createFromFormat('d-m-Y H',$request->fecha_inicio.'23');
        }
        if(!empty($request->fecha_fin)){
            $fecha_fin=Carbon::createFromFormat('d-m-Y H',$request->fecha_fin.'23');
        }
            //dd($this->objeto);
            $this->objeto->fill($request->all());
            $this->objeto->fecha_inicio=$fecha_inicio;
            $this->objeto->fecha_fin=$fecha_fin;
            $this->objeto->autor=auth()->user()->iniciales;
            HelperUtil::log($this->objeto);
            $this->objeto->save();
            $arr_equipos_contrato=$this->equipos_contrato($request->equipos,$this->objeto->id);
            $this->objeto->r_conts_eqps()->saveMany($arr_equipos_contrato);
        }

        return response()->json(
                [
                "objeto"=>$this->objeto->toArray(),
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
    public function show(Request $request,$id)
    {
        //
        $objeto=$this->objeto->findOrfail($id);
        HelperUtil::log($objeto);
        if ($request->wantsJson()){
                return response()->json(
                [
                    "objeto"=>$objeto->toArray()
                ],200
                );
            }
            //dd($objeto->r_conts_eqps());
        return view('expendios.show',compact('objeto'));
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
        //$id=$this->objeto->findOrfail($id);
        return view('expendios.edit',compact('id'));
    }
    public function procesar(Request $request,$id)
    {
        //
        $this->objeto=$this->objeto->findOrfail($id);
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        $valid=Validator::make($this->objeto->toArray(),$this->arr_valid,$this->arr_msg);
        if ($valid->fails()) {
            return back()->withErrors($valid);
        }
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'contratos',
            'ruta_siguiente'=>$request->ruta_siguiente,
            'ruta_califico'=>$califico,
            'calificacion'=>$request->estatus,
            'iniciales'=>$iniciales
            ]);
        $this->objeto->update($request->all());
        return back();
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
        $objeto=null;
        $objeto =Expendido::buscar(['CLASE'=>'X','serie'=>$request->serie])->get();

            if(!empty($objeto)){
                if($id==$objeto->id){
                    return response()->json(['msg'=>"SERIE REPETIDO"],422);
                }
            }
            //FIN VALIDAR SERIE REPETIDA
        $this->objeto=$this->objeto->findOrFail($id);
        if(!empty($request->fecha_inicio)){
            $request['fecha_inicio']=Carbon::createFromFormat('d-m-Y H',$request->fecha_inicio.'23');
        }
        if(!empty($request->fecha_fin)){
            $request['fecha_fin']=Carbon::createFromFormat('d-m-Y H',$request->fecha_fin.'23');
        }
        $this->objeto->fill($request->all());

        if(empty($request->procesar)){
            //Validar Documento antes de validar
            $this->objeto->save();
        }else{
            //Actualizar documneto sin validar
            $this->objeto->autor=auth()->user()->iniciales;
            dd($this->objeto);
            $this->objeto->save();
        }
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
        $objeto = $this->objeto->withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico
                        # code...
                        $objeto->delete();
                }
               return redirect('expendios');
    }
    public function restaurar(Request $request)
    {
        //
        $objetos=$this->objeto->OnlyTrashed()
        ->buscar(['clase'=>'X'])
        ->paginate();
        //dd($objetos);
        return view('expendios.index',compact('objetos','request'));
    }
    public function completar($id){
        return view('expendios.completar',compact('id'));
    }
    public function equipos_contrato($equipos,$id_foraneo){
        $arr_equipo_contrato='';

            foreach ($equipos as $equipo) {
                $equipo=(object)$equipo;
                if(empty($equipo->numero_serie) ){
                    $equipo->numero_serie='';
                }
                 $arr_eqp = array('id_foraneo' =>$id_foraneo,
                    'equipo'=>$equipo->equipo,
                    'equipo'=>$equipo->equipo,
                    'telefonos'=>'',
                    'marca'=>$equipo->marca,
                    'modelo'=>$equipo->modelo,
                    'numero_serie'=>$equipo->numero_serie,
                    'tipo_servicio'=>$equipo->tipo_servicio,
                    'fecha_inicio'=>Carbon::createFromFormat('d-m-Y H',$equipo->fecha_inicio.'23'),
                    'fecha_fin'=>Carbon::createFromFormat('d-m-Y H',$equipo->fecha_fin.'23'),
                    'coordinacion'=>$equipo->coordinacion,
                    'calle'=>$equipo->calle,
                    'colonia'=>$equipo->colonia,
                    'c_p'=>$equipo->c_p,
                    'ciudad'=>$equipo->ciudad,
                    'estado'=>$equipo->estado,
                    'pais'=>$equipo->pais,
                    'nombre_cliente'=>$equipo->nombre_cliente,
                    'nombre_fiscal'=>$equipo->nombre_fiscal,
                    'c_bpartner_id'=>$equipo->c_bpartner_id,
                    'c_bpartner_location'=>$equipo->c_bpartner_location,
                    'hora_atencion'=>$equipo->hora_atencion,
                    'clase'=>'EC'
                    );
                 $arr_equipo_contrato[]= new Expendido($arr_eqp);
             }
             return $arr_equipo_contrato;
    }
}
