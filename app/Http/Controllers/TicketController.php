<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Http\Requests\EnviarARequest;
use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests;
use Carbon\Carbon;
use App\Helpers\HelperUtil;
use App\User;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    protected $estado;
    protected $ticket;
    protected $arr_buscar=null;
    public function __construct(Ticket $ticket){        
         $this->ticket= new Ticket();
        $this->arr_buscar['clase']='ticket';
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $objetos=$this->ticket->buscar($this->arr_buscar+$request->all())
                ->orderBy('updated_at','desc')
                ->paginate(15);
            return view('tickets.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->all());
        if(!empty($request->id_foraneo) ){
        $this->ticket->clase='hilo';
        $this->ticket->id_foraneo=$request->id_foraneo;
        }else{
            $this->ticket->clase='ticket';
            //$this->ticket->compromiso=Carbon::now();
        }
            /*$this->ticket->nombre='nombre';
            $this->ticket->descripcion='Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
            $this->ticket->modulo='modulo';
            $this->ticket->prioridad='2';
            $this->ticket->estatus='cerrado';
            $this->ticket->autor='autor';
            $this->ticket->departamento='DIRECCION';
            $this->ticket->area='prueba';
            //$this->ticket->compromiso='comprimiso';
            $this->ticket->dato='datoxxxz';
        */
        $objeto=$this->ticket;
        return view('tickets.create',compact('objeto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketStoreRequest $request)
    {
        if($this->validacion($request)){
            return back()->withErrors(['FECHA COMPROMISO dd-mm-yyyy '.$request->compromiso]);
        }
            
        $objetos=[];
        if($request->id){
            $objeto=$this->actualizar($request);
        }else{
            $objeto=$this->guardar($request);
        }
        $objeto->calificacion($objeto->id,$objeto->clase,$objeto->estatus);
        return view('tickets.show',compact('objeto','objetos'))->withErrors(['GUARDADO CORRECTAMENTE']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objeto=$this->ticket->find($id);
        $objetos=$this->ticket->where('id_foraneo',$id)->get();
        return view('tickets.show',compact('objetos','objeto'));
    }

    /**
     * MOSTRAR FECHA DE INICIO Y LOS DIAS CONSECUTIVOS A LA FECHA FIN
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objeto=$this->ticket->find($id);
        //dd(count($objeto->hilos));
        if(count($objeto->hilos)>0){

            $inicio=$objeto->created_at;
            $fechas[]=$objeto->created_at;
            $arrobj=$objeto->hilos()->orderBy('compromiso')->get();
            $ultimo=count($arrobj)-1;
            //dd($arrobj);
            $fechas[]=$arrobj[$ultimo]->compromiso;
            $fin=$arrobj[$ultimo]->compromiso;
            $objeto=$this->ticket->FindOrFail($id);
            $fechas_arreglo=$this->rangoFecha($inicio,$fin);
            return view('tickets.calendario',compact('fechas_arreglo','arrobj'));
        }else{
            return back()->withErrors('FALTAN RESPUESTAS');
        }
    }
    private function rangoFecha($inicio,$fin){
        $arr=null;
        if(!empty($fin) ){
            $ff=explode(' ', $fin);
            $compromiso=Carbon::createFromFormat('Y-m-d H', $ff[0].' 22')->toDateString();
            if($inicio!=$compromiso){
                $desigual=true;
            }else{$desigual=false;}
            $arr[]=$inicio;
            while ( $desigual) {
                $nvo= new Carbon($inicio);
                    $temp=$nvo->addDay();
                    $inicio=$nvo;
                    $arr[]=$temp;
                if($compromiso==$temp->toDateString()){
                    $desigual=false;
                }
            }
        }
        return $arr;
    }
    private function setBandera($objetos,$fecha_fin){
        foreach ($objetos as $objeto) {
            $ff=explode(' ', $objeto->compromiso);
            $compromiso=Carbon::createFromFormat('Y-m-d H', $ff[0].' 0');
            /*if($compromiso<=$fecha_fin){

            }*/
            $objeto->compromiso=$compromiso;
        }
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
        
    }

    private function guardar($objeto){
        $this->ticket->fill($objeto->all());
        $this->ticket->compromiso=$objeto->compromiso;
        $this->ticket->autor=auth()->user()->iniciales;
        $this->ticket->area=auth()->user()->area;
        $this->ticket->save();
        return $this->ticket;
    }
    private function actualizar($obj){
        $objeto=$this->ticket->FindOrFail($obj->id);
        $objeto->fill($obj->all());
        $objeto->autor=auth()->user()->iniciales;
        $this->ticket->area=auth()->user()->area;
        //$compromiso=Carbon::createFromFormat('d-m-Y',$obj->compromiso);
        $objeto->compromiso=$obj->compromiso;
        $objeto->save();
        return $objeto;

    }
    public function digital($id){
        $objeto=CContrato::findOrFail($id);
        $archivo=$objeto->contrato->digitalizacion;
        $digitalizacion=$this->ruta.'/'.$archivo;
        $headers = array('Content-Type' => 'application/octet-stream');
        return response()->download($digitalizacion,$archivo,$headers);
    }
    public function digitalizar($id){
        $objeto=$this->ticket->findOrFail($id);
        return view('tickets.archivo',compact('objeto'));
    }
    //public function archivar(Request $request){
    public function archivar(ArchivoDigitalStoreRequest $request){
        $extension = strtolower(\Input::file('file')->getClientOriginalExtension());
        $nombre='TCK'.$request->id.'.'.$extension;
        $request->file('file')->move($this->ruta,$nombre);
        $objeto = CContrato::findOrFail($request->id);
        $objeto->contrato()->update(['digitalizacion'=>$nombre]);
        return view('tickets.archivo',compact('objeto'));
    }
    
    public function enviar(EnviarARequest $request,$id){
        $objeto=$this->ticket->findOrFail($id);
        $objeto->calificacion($id,$objeto->clase,'aviso');
        $aprobador=null;
        foreach ($request->aprobador as $val) {
                $aprobador[]= new User(['email'=>$val]);
            }
        //INICIO enviar aviso a aprobador
        if(!empty($aprobador)){
            $arr_url=explode('/',$request->url());
            $url= $arr_url[2].'/reportes';

            foreach ($aprobador as $v) {
                $destinatario=array('destino' => $v->email,'msj'=>
                    'REPORTE DE SOPORTE GENERADO '.$objeto->folio_contrato. ' '.$objeto->estatus.' <a href="'.$url.'?folio='.$objeto->folio.'">Clic aquí para verificar</a>'
                 );
                $arr_des[]=$destinatario;
            }

        if(!empty($arr_des)){
         $objeto->aviso($arr_des);            
        }
        }        
        //FIN enviar aviso a aprobador
        return back();
    }
    private function porUsuario(){
        $this->arr_buscar['autor']=auth()->user()->iniciales;
    }
    private function validacion($request){
        $validacion=false;
        if(!empty($request->compromiso)){
            $fecha_valida=$this->ticket->esFecha($request->compromiso);
            if(!$fecha_valida){
                $validacion=true;
            }
        }else{
            //$validacion=true;
        }
        return $validacion;
    }

}
