<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase as CContrato;
use App\Contrato;
use App\ZasapiUser1 as APIContrato;
use App\VContrato;
use App\User;
use App\OrganizacionV;
use App\Calificacion;
use Carbon\Carbon;
use App\Helpers\HelperUsuario;
use App\Helpers\HelperUtil;
use App\Http\Requests\ContratoStoreRequest;
use App\Http\Requests\ContratoUpdateRequest;
use App\Http\Requests\ArchivoDigitalStoreRequest;
use App\Observacion;
use App\Http\Requests\ObservacionStoreRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;


class ContratoController extends Controller
{
protected $arr_bsc=[];
protected $correo;
protected $fecha_inicio_garantia=null;
protected $fecha_fin_garantia=null;
protected $fecha_inicio_contrato=null;
protected $fecha_fin_contrato=null;
protected $fecha_contrato=null;
protected $usuario;
protected $ruta=  '/var/www/html/comercial/storage/app/contrato';
    public function __construct(HelperUsuario $consulta_usuario){
        $this->arr_bsc['clase']='C';
        $this->arr_bsc_cccv['clase']='CCCV';
        $this->usuario= $consulta_usuario;
        //$this->arr_bsc['organizacion']=auth()->user()->org_name;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        //
        if ($request->wantsJson()){
            switch ($request->v) {
                case '1':
                    # code...IR POR DOCUMENTOS CON EL NUMERO DE SERIE EN LA PETICION
                    $objetos=CContrato::buscar(['clase'=>'EC','numero_serie'=>$request->numero_serie])->take(10)->get();
                    foreach ($objetos as $ec) {
                        $f=$ec->equipos_contrato()->where('clase','C')->get();
                        if(count($f)>0){
                            $ec->folio=$f[0]->folio_contrato;
                        }
                    }
                    return response()->json(
                    [
                        "msg"=>"Success",
                        "objetos"=>$objetos->toArray()
                    ],200
                    );
                    break;
                case '2':
                    $objetos=CContrato::buscar(['instituto'=>$request->instituto])->take(10)->get();
                    return response()->json(
                    [
                        "msg"=>"Success",
                        "objetos"=>$objetos->toArray()
                    ],200
                    );

                break;
                case '3':
                $objeto='';
                    $objetos=CContrato::buscar($this->arr_bsc+$request->all())->get();
                    foreach ($objetos as $objeto) {
                        # code...
                        $objeto->contrato;
                        $objeto->r_conts_eqps->sortBy('clase');
                    }
                    if(!empty($objeto)){

                        return response()->json(
                        [
                            "msg"=>"Success",
                            "objetos"=>$objeto->toArray()
                        ],200
                        );

                    }else{

                        return response()->json(
                        [
                            "msg"=>"Success",
                        ],200
                        );
                    }

                break;
                case '4'://consulta de contrato vigente...(Reporte servicio)
                $today = Carbon::today();
                    $objeto='';
                    $objetos=VContrato::buscar($this->arr_bsc+$request->all())
                    ->whereDate('fecha_fin_garantia','>=',$today)
                    ->get();
                    //dd($objetos);
                    //HelperUtil::log(array('contrato' => $objetos) );
                    foreach ($objetos as $objeto) {
                        $objeto->contrato;
                        $objeto->equipos_contrato->sortBy('clase');
                    }
                    //dd($objeto);
                    if(!empty($objeto)){
                        return response()->json(
                        [
                            "msg"=>"Success",
                            "objetos"=>$objetos->toArray(),
                            "cantidad"=>count($objetos)
                        ],200
                        );
                    }
                break;
                case '5':
                    $objetos=CContrato::buscar($this->arr_bsc_cccv+$request->all())->get();
                        return response()->json(
                        [
                            "msg"=>"Success",
                            "objetos"=>$objetos->toArray()
                        ],200
                        );
                break;

                default:
                    # code...
                    $objetos=CContrato::buscar($this->arr_bsc+$request->all())->get();
                    break;
            }
                return response()->json(
                [
                    "msg"=>"Success",
                    "objetos"=>$objetos->toArray()
                ],200
                );
        }else{
            //$objetos=VContrato::all();
                $objetos=VContrato::buscar($request->all())
                ->where('folio','<>','0')
                ->orderBy('id', 'asc')
                ->paginate(15);
                return view('contratos.index',compact('objetos','request'));
        }
    }
    public function restaurar(Request $request)
    {
        //
        $objetos=CContrato::OnlyTrashed()
        //->buscar($request->all())
        ->buscar($this->arr_bsc+$request->all())
        ->paginate(15);
        return view('contratos.index',compact('objetos','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contratos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(ContratoStoreRequest $request)
    {
        //dd($request->all());
        //Log::info('Contrato: '.json_encode($request->all()));
        //dd($request->fecha_inicio_garantia);
        //folio contrato = folio del contrato interno de la organizacion
        //Instituto = folio del contrato para el cliente
        if ($request->wantsJson()){
            $objeto = new CContrato($request->except([
                'fecha_inicio',
                'fecha_fin',
                'equipo',
                'marca',
                'modelo',
                'coordinacion',
                'tipo_servicio',
                "nombre_cliente",
                "calle",
                "colonia",
                "c_p",
                "ciudad",
                "estado",
                "pais",
                "numero",
                //"c_bpartner_id",
                //"c_bpartner_location"
                ]));
            $objeto->estatus='GUARDADO';
            $objeto->autor= auth()->user()->iniciales;
            $objeto->sucursal= auth()->user()->lugar_centro_costo;
            $objeto->organizacion= auth()->user()->org_name;
            //ININCIO FOLIAR  CONTRATO
            //$f = Carbon::now();
            //$an=explode('-', $f);
            //$an=$an[0];
            if(empty($request->folio_contrato)){
                $objeto->foliar='C';
                $num=str_pad($objeto->folio, 4, "0", STR_PAD_LEFT);
                $objeto->folio_contrato='SER-'.$num;
                //$objeto->folio_contrato='SER-'.$num.'-'.$an;
            }else{
                $objeto->folio_contrato=$request->folio_contrato;
            }
            //FIN FOLIAR  CONTRATO
            $objeto->clase= 'C';
            //$objeto->fecha_captura=Carbon::createFromFormat('d-m-Y H',$request->fecha_captura.'23');
            $objeto->modificable= '0';
            $objeto->save();

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
            //dd($request->moneda);
            $arr=[
                'id_foraneo'=>$objeto->id,
                'fecha_inicio_garantia'=>$this->fecha_inicio_garantia,
                'fecha_fin_garantia'=>$this->fecha_fin_garantia,
                'fecha_inicio_contrato'=>$this->fecha_inicio_contrato,
                'fecha_fin_contrato'=>$this->fecha_fin_contrato,
                'refacciones'=>$request->refacciones,
                'numeros_pagos'=>$request->numeros_pagos,
                'limite_atencion'=>$request->limite_atencion,
                "tipo_contrato"=>$request->tipo_contrato,
                "monto_total_contrato"=>$request->monto_total_contrato,
                "monto_pago_inicial"=>$request->monto_pago_inicial,
                "dia_final_pago"=>$request->dia_final_pago,
                "interes_moratorio_cliente"=>$request->interes_moratorio_cliente,
                "descuento_incumplimiento_smh" =>$request->descuento_incumplimiento_smh,
                "monto_nueva_ubicacion"=>$request->monto_nueva_ubicacion,
                "representante_cliente"=>$request->representante_cliente,
                "representante_smh"=>$request->representante_smh,
                "declaracion_cliente"=>$request->declaracion_cliente,
                "declaracion_smh"=>$request->declaracion_smh,
                "lugar_pago_cliente"=>$request->lugar_pago_cliente,
                "refacciones_excepciones"=>$request->refacciones_excepciones,
                "conclusion"=>$request->conclusion,
                "fecha_pago_inicial"   =>$this->fecha_pago_inicial,
                "fecha_contrato"   =>$this->fecha_contrato,
                "moneda"   =>$request->moneda,
                "tiempo_contrato"  =>$request->tiempo_contrato,
                "modalidad_pagos"  =>$request->modalidad_pagos,
                "clausula_primera" =>$request->clausula_primera,
                "definiciones" =>$request->definiciones
                ];
            $contrato=new Contrato($arr);
            $contrato->save();
            //dd($contrato);
            //$arr_ccv= array('' => , );
            $arr_equipo_contrato='';
            foreach ($request->equipos as $equipo) {
                $equipo=(object)$equipo;
                if(empty($equipo->numero_serie) ){
                    $equipo->numero_serie='';
                }
                 $arr_eqp = array('id_foraneo' =>$objeto->id,
                    'equipo'=>$equipo->equipo,
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
                    'nombre_fiscal'=>trim($equipo->nombre_fiscal),
                    'c_bpartner_id'=>$equipo->c_bpartner_id,
                    'c_bpartner_location'=>$equipo->c_bpartner_location,
                    'hora_atencion'=>$equipo->hora_atencion,
                    'clase'=>'EC'
                    );
                 $arr_equipo_contrato[]= new CContrato($arr_eqp);
             }
             $objeto->r_conts_eqps()->saveMany($arr_equipo_contrato);

         //dd($objeto);
                return response()->json(
                [
                    "msg"=>"GUARDADO CORRECTAMENTE"
                ],200
                );
            }else{
                abort(404);
        }
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
        $objeto=CContrato::findOrFail($id);
        $objeto->contrato;
        $objeto->r_conts_eqps->sortBy('clase');
        //echo 'SHOW>'.$objeto->contrato->declaracion_smh.'<';
        if ($request->wantsJson()){
                return response()->json(
                [
                    "objeto"=>$objeto->toArray()
                ],200
                );
            }
        return view('contratos.show',compact('objeto'));
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
        $objeto=CContrato::findOrFail($id);
        $objeto->contrato;
        $objeto->r_conts_eqps;
        //$objeto=$objeto->toArray;

        return view('contratos.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratoUpdateRequest $request, $id)
    {
        Log::info('Contrato: '.json_encode($request->all()));
        $objeto=CContrato::findOrFail($id);
        if ($request->wantsJson()){
            $objeto->fill($request->except([
                'fecha_inicio',
                'fecha_fin',
                'equipo',
                'marca',
                'modelo',
                'coordinacion',
                'tipo_servicio',
                "nombre_cliente",
                "calle",
                "colonia",
                "c_p",
                "ciudad",
                "estado",
                "pais",
                "numero"
                ]));
            $objeto->estatus='GUARDADO';
            //$objeto->fecha_captura=Carbon::now();
            $objeto->save();
            $objeto->contrato()->delete();
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
            if(!empty($request->fecha_contrato)){
                $this->fecha_contrato=Carbon::createFromFormat('d-m-Y H',$request->fecha_contrato.'23');
            }
              if(!empty($request->fecha_pago_inicial)){
                $this->fecha_pago_inicial=Carbon::createFromFormat('d-m-Y H',$request->fecha_pago_inicial.'23');
            }
            $contrato=new Contrato([
                'id_foraneo'=>$id,
                'fecha_inicio_garantia'=>$this->fecha_inicio_garantia,
                'fecha_fin_garantia'=>$this->fecha_fin_garantia,
                'fecha_inicio_contrato'=>$this->fecha_inicio_contrato,
                'fecha_fin_contrato'=>$this->fecha_fin_contrato,
                'refacciones'=>$request->refacciones,
                'refacciones_excepciones'=>$request->refacciones_excepciones,
                'numeros_pagos'=>$request->numeros_pagos,
                'limite_atencion'=>$request->limite_atencion,
                "tipo_contrato" => $request->tipo_contrato,
                "monto_total_contrato" =>$request->monto_total_contrato,
                "monto_pago_inicial" =>$request->monto_pago_inicial,
                "numeros_pagos" =>$request->numeros_pagos,
                "numeros_pagos" =>$request->numeros_pagos,
                "dia_final_pago" =>$request->dia_final_pago,
                "interes_moratorio_cliente" =>$request->interes_moratorio_cliente,
                "descuento_incumplimiento_smh" =>$request->descuento_incumplimiento_smh,
                "monto_nueva_ubicacion" =>$request->monto_nueva_ubicacion,
                "limite_atencion" =>$request->limite_atencion,
                "representante_cliente" =>$request->representante_cliente,
                "representante_smh" =>$request->representante_smh,
                "declaracion_cliente" =>$request->declaracion_cliente,
                "lugar_pago_cliente" =>$request->lugar_pago_cliente,
                "refacciones" =>$request->refacciones,
                "refacciones_excepciones" =>$request->refacciones_excepciones,
                "conclusion" =>$request->conclusion,
                "fecha_pago_inicial" =>$this->fecha_pago_inicial,
                "fecha_contrato" =>$this->fecha_contrato,
                "moneda" =>$request->moneda,
                "tiempo_contrato" =>$request->tiempo_contrato,
                "modalidad_pagos" =>$request->modalidad_pagos,
                "clausula_primera" =>$request->clausula_primera,
                "declaracion_smh" =>$request->declaracion_smh,
                "definiciones" =>$request->definiciones,
                ]);
            $contrato->save();
            //dd($request->all());
            //$objeto->contrato->save($request->all());
            $objeto->r_conts_eqps()->delete();
            $arr_equipo_contrato='';
            foreach ($request->equipos as $equipo) {
                $equipo=(object)$equipo;
                 $arr_eqp = array('id_foraneo' =>$id,
                    'equipo'=>$equipo->equipo,
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
                 $arr_equipo_contrato[]= new CContrato($arr_eqp);
            }
            $objeto->r_conts_eqps()->saveMany($arr_equipo_contrato);

                return response()->json(
                [
                    "msg"=>"ACTUALIZADO CORRECTAMENTE"
                ],200
                );
        }else{
        return back();
        }
    }
    public function observar(ObservacionStoreRequest $request)
    {
        $objeto= new Observacion();
        $objeto->observacion='<:'.$request->user()->iniciales.':>'.$request->observacion.'. . .';
        $objeto->nombre_tipo=$request->nombre_tipo;
        $objeto->id_producto=$request->id_producto;
        $objeto->save();
        return back();
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
        $objeto=CContrato::findOrFail($id);
        $objeto->update($request->all());
        //INICIO enviar aviso a aprobador
        $aprobador=null;
        if(isset($request->aprobador)){//aprobadores provienen desde request
            //dd($request->aprobador);
            foreach ($request->aprobador as $val) {
                $aprobador[]= new User(['email'=>$val]);
            }
            //dd($aprobador);
            //$aprobador=(object)$aprobador;
        }else{
            $aprobador=$this->usuario->getUsuario(['recurso'=>'contratos.index']);
            HelperUtil::log(['$aprobador :'.count($aprobador)=>$aprobador]);
        }
        if(!empty($aprobador)){

            $arr_url=explode('/',$request->url());
            $url= $arr_url[2].'/contratos';

            foreach ($aprobador as $v) {
                # code...
                $destinatario=array('destino' => $v->email,'msj'=>
                    'AVISO DE CONTRATO PARA REVISION '.$objeto->folio_contrato. ' '.$objeto->estatus.' <a href="'.$url.'?folio_contrato='.$objeto->folio_contrato.'">Clic aquí para verificar</a>'
                 );
                $arr_des[]=$destinatario;
            }

        if(!empty($arr_des)){
         $objeto->aviso($arr_des,'atencion');
        }
        }
        //FIN enviar aviso a aprobador
        return back();
    }

    public function aprobar(Request $request,$id)//Cambia el estatus de documento
    {
        $iniciales=auth()->user()->iniciales;
        $destinos=[];
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'aprobar',
            'ruta_siguiente'=>'contratos.index',
            'ruta_califico'=>$califico,
            'calificacion'=>'cerrar',
            'iniciales'=>$iniciales
            ]);
        //dd($request->all());
        $objeto=CContrato::findOrFail($id);
        $objeto->update($request->all());

        //INICIO enviar aviso a aprobador
        $aprobador=0;
        $aprobador=$this->usuario->getUsuario(['recurso'=>'contratos.index']);
        //HelperUtil::log(['$aprobador :'.count($aprobador)=>$aprobador]);
                if(!empty($aprobador)){

            $arr_url=explode('/',$request->url());
            $url= $arr_url[2].'/contratos';

            foreach ($aprobador as $v) {
              if(!empty($v)){
                //HelperUtil::log(['$v :'.count($v)=>$v]);
                $destinos[]=$v->email;
                  $destinatario=array('destino' => $destinos,'msj'=>
                  'AVISO DE CONTRATO PARA REVISION '.$objeto->folio_contrato. ' '.$objeto->estatus.' <a href="'.$url.'?folio_contrato='.$objeto->folio_contrato.'">Clic aquí para verificar</a>'
                );
              }
                $arr_des[]=$destinatario;
            }

        if(!empty($arr_des)){
         $objeto->aviso($arr_des,'atencion');
        }
        }
        //FIN enviar aviso a aprobador
        return back();
    }

    public function cerrar(Request $request,$id)//Cambia el estatus de documento
    {
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'contratos',
            'ruta_siguiente'=>'contratos.index',
            'ruta_califico'=>$califico,
            'calificacion'=>'cerrar',
            'iniciales'=>$iniciales
            ]);
        //dd($request->all());
        $objeto=CContrato::findOrFail($id);
        //INICIO ENVIAR CONTRATO API ALENDUM
        $organizaciones = null;
        $organizaciones = OrganizacionV::buscar(['name'=>$objeto->organizacion])->get();
        if(count($organizaciones)){
            $AD_Org_Id=$organizaciones[0]->ad_org_id;
            //dd($AD_Org_Id);
            if(empty($objeto->instituto)){
                $objeto->instituto=$objeto->folio_contrato;
            }
            $api= new APIContrato;
            $api->AD_Org_Id=$AD_Org_Id;//id de la organizacion
             $api->Value=$objeto->folio_contrato;//numero de contrato interno
             $api->Name=$objeto->nombre_fiscal;//nombre del tercero
             $api->Description=$objeto->instituto; //numero de contrato externo
             $api->Isactive='Y';
            // dd($objeto->instituto);
            $api->guardar();
             $objeto->dato=$api->zasapi_user1;
            //dd($objeto->dato);
            $objeto->update($request->all());
        }
        //FIN ENVIO CONTRATO API
        return back();
    }
    public function cancelar(Request $request,$id)//Cambia el estatus de documento
    {
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'contratos',
            'ruta_siguiente'=>$request->ruta_siguiente,
            'ruta_califico'=>$califico,
            'calificacion'=>$request->estatus,
            'iniciales'=>$iniciales
            ]);
        //dd($request->all());
        $objeto=CContrato::findOrFail($id);
        $objeto->update($request->all());
        return back();
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
        $objeto = CContrato::withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                       //dd($objeto->r_conts_eqps);
                       $objeto->r_conts_eqps()->restore();
                }else
                {//Borrado logico
                        # code...
                        $objeto->delete();
                }
               return redirect('contratos');
    }
    public function digital($id){
        $objeto=CContrato::findOrFail($id);
        $archivo=$objeto->contrato->digitalizacion;
        $digitalizacion=$this->ruta.'/'.$archivo;
        $headers = array('Content-Type' => 'application/octet-stream');
        return response()->download($digitalizacion,$archivo,$headers);
    }
    public function digitalizar($id){
        $objeto=CContrato::findOrFail($id);
        return view('contratos.archivo',compact('objeto'));
    }
    //public function archivar(Request $request){
    public function archivar(ArchivoDigitalStoreRequest $request){
        $extension = strtolower(\Input::file('file')->getClientOriginalExtension());
        $nombre='Con'.$request->id.'.'.$extension;
        $request->file('file')->move($this->ruta,$nombre);
        $objeto = CContrato::findOrFail($request->id);
        $objeto->contrato()->update(['digitalizacion'=>$nombre]);
        return view('contratos.archivo',compact('objeto'));
    }
    public function vigencia($id)//Cambia la vigencia de un equipo en contrato
    {
        $objeto=CContrato::findOrFail($id);
        if($objeto->vigencia=='0'){
            $objeto->vigencia='';
            $objeto->save();

        }else{
            $objeto->vigencia='0';
            $objeto->save();
        }
        return response()->json(
                [
                    "msg"=>"ACTUALIZADO CORRECTAMENTE"
                ],200
                );

    }
}
