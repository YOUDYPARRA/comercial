<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProyectoVenta;
use App\VProyectoVenta;
use App\Observacion;
use App\Helpers\HelperUtil;
use App\ExportList;
use App\Calificacion;
use App\Http\Requests\ProyectoVentaStoreRequest;
use App\Http\Requests\ObservacionStoreRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProyectoVentaController extends Controller
{
    private $arr_json=[];
    private $arr_objeto=[];
    private $export='';
    private $objeto='';
    public function __construct(ExportList $export,ProyectoVenta $proyecto_venta){
        $this->arr_objeto['clase']='PRO';
        $this->export=$export;
        $this->objeto=$proyecto_venta;
        $this->proyectoUsuario();
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function descarga(Request $request){
        //dd($request->all());
        $proyecto_venta= new VProyectoVenta;
        $filas=$proyecto_venta->buscar($request->all())->get();
        //$filas=$proyecto_venta->all();
        return $this->export->sheet('Hoja',function($hoja) use ($filas){
            $hoja->fromArray($filas);
        })->export('xls');
    }
    public function index(Request $request)
    {
      if(empty($request->id) ){

        $this->buscarJson($request);
        //$request['fecha_atencion']='XXX';
        $request['fecha_atencion']=$this->buscarMesVenta($request);
        $objetos=$this->objeto->buscar($this->arr_objeto+$request->all())
                ->orderBy('updated_at','desc')
                ->orderBy('id','desc')
                ->paginate(15);
      }else{
        $objetos[]=$this->buscarId($request->id);
      }
        return view('proyecto_venta.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyecto_venta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyectoVentaStoreRequest $request)
    {
        //
        //dd($request->all());
        //HelperUtil::log(['GENERAR PROYECTO VENTA'=>$request->all()]);
        $objeto = new ProyectoVenta;
        foreach ($request->all() as $key => $value) {
                if(! $this->aJson($key,$value)){
                    $objeto->$key=$value;
                }
        }
        $objeto->dato=json_encode($this->arr_json);
        $objeto->clase='PRO';
        //$objeto->fecha_inicio='08-01-2017';
        //dd($objeto->fecha_inicio);
        $objeto->save();
        return response()->json(
                [
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
    public function show(Request $request, $id)
    {
        //
        $objeto = new ProyectoVenta();
        $objeto=$objeto->findOrFail($id);
        if ($request->wantsJson()){
            return response()->json(
                [
                    "msg"=>"SUCCESS",
                    "objeto"=>$objeto->toArray()
                ],200
                );
        }else{
            return view('proyecto_venta.show',compact('objeto'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('proyecto_venta.edit',compact('id'));
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
        $objeto=ProyectoVenta::findOrFail($id);
        if(!$objeto->editar()){
            return response()->json(
                [
                    "msg"=>"No puede editar",
                ],422);
        }
        foreach ($request->all() as $key => $value) {
                if(! $this->aJson($key,$value)){

                    //$this->arr_objeto[$key]=$value;
                    $objeto->$key=$value;

                }

        }
        $objeto->dato=json_encode($this->arr_json);
        $objeto->clase='PRO';
        $objeto->save();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'PRO',
            'ruta_siguiente'=>'',
            'ruta_califico'=>\Route::current()->getName(),
            'calificacion'=>'',
            'iniciales'=>auth()->user()->iniciales
            ]);
        return response()->json(
                [
                    "msg"=>"SUCCESS",
                    //"objeto"=>$objeto->toArray()
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
                return back();
    }
    public function observar(ObservacionStoreRequest $request, $id)
    {
        $objeto= new Observacion();
        $objeto->observacion='<:'.$request->user()->iniciales.':>'.$request->observacion.'. . .';
        $objeto->nombre_tipo=$request->nombre_tipo;
        $objeto->id_producto=$request->id_producto;
        $objeto->save();
        return back();
    }
     public function estatus(Request $request, $id)
    {
        $objeto=ProyectoVenta::findOrFail($id);
        $objeto->update(['estatus'=>$request->calificacion]);
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'PRO',
            'ruta_siguiente'=>'',
            'ruta_califico'=>\Route::current()->getName(),
            'calificacion'=>$request->calificacion,
            'iniciales'=>auth()->user()->iniciales
            ]);
        return back();
    }
    public function probabilidad(Request $request, $id)
    {
        $objeto=ProyectoVenta::findOrFail($id);
        $objeto->update(['complejidad_servicio'=>$request->calificacion]);
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'PRO',
            'ruta_siguiente'=>'',
            'ruta_califico'=>\Route::current()->getName(),
            'calificacion'=>$request->calificacion,
            'iniciales'=>auth()->user()->iniciales
            ]);
        return back();
    }

    public function aJson($key,$value){
        $esjn=false;
        switch ($key) {
            case 'mes_venta':
                /*
                $this->arr_json['mes_venta'] = $value;
                */
                $esjn=true;
            break;
            case 'mes_orden':
                $this->arr_json['mes_orden'] = $value;
                $esjn=true;
            break;
            case 'compromiso':
                $this->arr_json['compromiso'] = $value;
                $esjn=true;
            break;
            case 'canal':
                $this->arr_json['canal'] = $value;
                $esjn=true;
            break;
            case 'canal':
                $this->arr_json['canal'] = $value;
                $esjn=true;
            break;
            case 'dato':
                $this->arr_json['dato'] = $value;
                $esjn=true;
            break;
        }
        return $esjn;
    }
    private function proyectoUsuario(){
        $usuario=false;
        $rsl=null;
        //HelperUtil::log(['auth()->user()->puesto :'.count(auth()->user()->puesto)=>auth()->user()->puesto]);
        if(auth()->user()->puesto=='EJECUTIVO DE VENTAS'){
            $this->arr_objeto['autor']=auth()->user()->iniciales;
            $rsl=$this->objeto->buscar($this->arr_objeto)->first();
            if(count($rsl)>=1){
                $usuario=true;
            }else{
                unset($this->arr_objeto['autor']);
            }
        }elseif(auth()->user()->puesto=='GERENTE DE VENTAS GDL'){
            $this->arr_objeto['sucursal']=['GDL','BAJIO'];
        }
        return $usuario;
    }
    private function buscarMesVenta($request){
        $meses = array('ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE');
        $arr_meses_buscar=[];
        //ver si viene un solo mes
        //ver si vienen dos meses y son consecutivos o habra que agregar meses intermedios
        $mes_venta=$request->fecha_atencion;
        $meses_buscar=explode('-', $mes_venta);
        if(count($meses_buscar)>=2){
            $key_inicial=null;
            foreach ($meses as  $key=>$value) {
                if($meses_buscar[0]==$value){
                    $key_inicial=$key;
                }
                if($meses_buscar[1]==$value){
                    $key_final=$key;
                }
            }
            foreach ($meses as $key => $value) {
                if($key_inicial>=$key || $key_final<=$key){
                    $arr_meses_buscar[]=$value;
                }
                
            }

        }elseif(count($meses)==1){

        }
        return $arr_meses_buscar;
    }
    private function buscarJson($request){
        //obtener el campo dato
        //verificar si el campo cumple la condicion buscada
        /*if(!empty($request->mes_venta) ){
            $this->arr_objeto['dato']='*"mes_venta":"'.$request->mes_venta.'"*';
        }*/
        if(!empty($request->compromiso) ){
            $this->arr_objeto['dato']='*"compromiso":"'.$request->compromiso.'"*';
        }
    }
    private function buscarId($id){
      $objeto='';
            $rsl=$this->objeto->findOrFail($id);
            if($rsl->clase='PRO'){
                $objeto=$rsl;
            }
      return $objeto;
    }
}
