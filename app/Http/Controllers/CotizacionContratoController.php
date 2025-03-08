<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Documento;
use App\Clase as Cotizacion;
use App\Calificacion;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CotizacionContratoController extends Controller
{
        //
        private $objeto= null;//objeto clase
        private $ano=null;
        private $objetos= null;//objetos relacionados en documentos
        protected $arr_obj=null;
        protected $documentos=null;
        public function __construct(){     
            $this->arr_obj=array('clase'=>'CCS','sucursal'=>auth()->user()->lugar_centro_costo,'organizacion'=>auth()->user()->org_name);
        $this->objeto=new Cotizacion($this->arr_obj);
        $this->objetos= new Documento;
        $this->documentos= new Documento();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if($request->wantsJson()){
            $objetos =Documento::buscar($request->all())->get();
            return response()->json(
            [
                'objeto'=>$objetos->toArray(),
                "msg"=>"SUCCESS"
            ],200
            );
        }
        $objetos =$this->objeto->buscar($this->arr_obj+$request->all())
        ->orderBy('created_at','desc')
        ->paginate(15);
        return view('cotizaciones_contratos.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cotizaciones_contratos.create');
        //
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
        //dd($request->all());
        //dd(json_encode($request->json));
        $json=json_encode($request->json);
        $tablados=json_encode($request->tablados);

        if(empty($request->id)){
            $this->objeto->fill($request->all());
            $this->objeto->foliar='CCS';
            $this->objeto->clase='CCS';
            $this->objeto->autor=auth()->user()->iniciales;
            $this->objeto->dato=auth()->user()->iniciales.'-'.auth()->user()->lugar_centro_costo.'-'.$this->getAno().'-'.$this->objeto->folio;
            
            //dd($request->json);


            $this->objeto->sucursal= auth()->user()->lugar_centro_costo;
            $this->objeto->organizacion= auth()->user()->org_name;
            $this->objeto->vigencia= Carbon::now()->addWeeks(3);
            $this->objeto->estatus='GUARDADO';
            $this->objeto->save();
            
            $this->objetos->id_foraneo=$this->objeto->id;
            $this->objetos->fill($request->all());
            $this->objetos->clase='CCS';
            $this->objetos->version='CCS';
            $this->objetos->json=$json;
            $this->objetos->texto=$request->head;
            $this->objetos->save();
            $ver=$this->objetos->version;
            Documento::create([
                'id_foraneo'=>$this->objeto->id,
                'version'=>$ver,
                'texto'=>$request->foot,
                'clase'=>'CCS',
                'json'=>$tablados
                ]);
            if(isset($request->fin)){
                Documento::create([
                    'id_foraneo'=>$this->objeto->id,
                    'version'=>$ver,
                    'texto'=>$request->fin,
                    'clase'=>'CCS'
                ]);                
            }
            $this->objeto->version=$ver;
        }else{//actualizar
            //echo 'ACTUALIZO';
            $head='';
            $foot='';
            //$json='';
            $this->objeto= $this->objeto->findOrFail($request->id);
            //dd($this->objeto);
            $this->objeto->fill($request->all());
            $this->objeto->save();
            $head=$request->head;
            if(!empty($request->foot)){
                $foot=$request->foot;                
            }
            //$json=$json;
            $version=$request->version;
            /*
            $obj=Documento::buscar(['id_foraneo'=>$this->objeto->id_foraneo,
                'version'=>$request->version,
                'desc'=>'version'
                ])->limit(1)->get();
                */
            Documento::buscar(['id_foraneo'=>$this->objeto->id,
                'version'=>$version,
                ])->forceDelete();
            //dd($request->version);
//dd($head);
            //$this->objetos->id_foraneo=$this->objeto->id;
            Documento::create([
                'id_foraneo'=>$this->objeto->id,
                'version'=>$version,
                'texto'=>$head,
                'json'=>$json,
                'clase'=>'CCS'
                ]);
            if(!empty($request->foot)){
                Documento::create([
                    'id_foraneo'=>$this->objeto->id,
                    'version'=>$version,
                    'texto'=>$foot,
                    'clase'=>'CCS',
                    'json'=>$tablados
                    ]);
            }
            if(!empty($request->fin)){
                Documento::create([
                'id_foraneo'=>$this->objeto->id,
                'version'=>$version,
                'texto'=>$request->fin,
                'clase'=>'CCS'
            ]);

            }
            $this->objeto->version=$version;
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
    public function show(Request $request, $id)
    {
        //
        if($request->wantsJson()){
            //id de clase, version de clase, numero de cotizacion contrato de clase
            $this->objeto=$this->objeto->findOrFail($id);
            $objeto=$this->documentos->buscar(['id_foraneo'=>$this->objeto->id])->get();
            if(!empty($objeto)){
                $json=json_decode($objeto[0]->json);
                $this->objeto->tabla=$json;
                $this->objeto->head=$objeto[0]->texto;
                if(count($objeto)>1){
                    $this->objeto->foot=$objeto[1]->texto;
                    $this->objeto->tablados=json_decode($objeto[1]->json);
                }
                if(count($objeto)==3){
                    $this->objeto->fin=$objeto[2]->texto;
                }

            }else{
                $this->objeto->tabla='';
                $this->objeto->head='';
                $this->objeto->foot='';
                $this->objeto->fin='';
            }
            $this->objeto->version=$objeto[0]->version;        
                //dd($this->objeto);
            return response()->json(
                [
                "objeto"=>$this->objeto->toArray(),
                    "msg"=>"SUCCESS"
                ],200
                );
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
        //
        return view('cotizaciones_contratos.edit',compact('id'));        
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
            $json=json_encode($request->json);
            $tablados=json_encode($request->tablados);
            $this->objeto->fill($request->all());            
            $this->objeto->clase='CCS';
            $this->objeto->autor=auth()->user()->iniciales;
            $this->objeto->dato=auth()->user()->iniciales.'-'.auth()->user()->lugar_centro_costo.'-'.$this->getAno().'-'.$this->objeto->folio;
            $this->objeto->sucursal= auth()->user()->lugar_centro_costo;
            $this->objeto->organizacion= auth()->user()->org_name;
            $this->objeto->vigencia= Carbon::now()->addWeeks(3);
            $this->objeto->estatus='GUARDADO';
            //INICIO buscar la version ultima de este folio
            $docs_vers = $this->objeto->buscar(['dato'=>$this->objeto->dato,'desc'=>'created_at'])->get();
            foreach ($docs_vers as $key => $value) {
                # code...
                //buscar version 
                $documento=$this->documentos->buscar(['id_foraneo'=>$value->id])->first();
                $arr_docs_vers[]=array('id_foraneo' =>$value->id,'version'=>$documento->version);
            }
            $colc=collect($arr_docs_vers);
            $doc_ver=$colc->sortBy('version');
            $v=last($doc_ver->toArray());
            $u_v=$v['version']+1;
            //FIN buscar la version ultima de este folio
            Documento::buscar(['id_foraneo'=>$value->id,
                            'version'=>$documento->version,
                            ])->forceDelete();

            $this->objeto->save();

            $this->objetos->id_foraneo=$this->objeto->id;
            $this->objetos->clase='CCS';
            $this->objetos->version=$u_v;
            $this->objetos->json=$json;
            $this->objetos->texto=$request->head;
            $this->objetos->save();
            Documento::create([
                'id_foraneo'=>$this->objeto->id,
                'version'=>$u_v,
                'texto'=>$request->foot,
                'clase'=>'CCS',
                'json'=>$tablados
                ]);

            if(!empty($request->fin)){
                Documento::create([
                'id_foraneo'=>$this->objeto->id,
                'version'=>$u_v,
                'texto'=>$request->fin,
                'clase'=>'CCS'
            ]);
            }
            $this->objeto->version=$u_v;
        
        return response()->json(
                [
                "objeto"=>$this->objeto->toArray(),
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
    }
    protected function getAno(){
        $this->ano = Carbon::now();
        $this->ano=explode('-',$this->ano);
        return $this->ano[0];
    }
    public function estatus(Request $request, $id)//Cambia el estatus de documento
    {
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'estatus',
            'ruta_siguiente'=>'contratos.index',
            'ruta_califico'=>$califico,
            'calificacion'=>$request->estatus,
            'iniciales'=>$iniciales
            ]);
        //dd($request->all());
        $objeto=Cotizacion::findOrFail($id);
        $objeto->update($request->all());
        return back();
    }
}
