<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Calificacion;
use App\Estado;
use App\Observacion;
use App\InsumoCompraVenta;
use App\Helpers\HelperUsuario;
use App\Helpers\HelperUtil;
use App\Services\ManagerCorreo;
use App\Http\Requests\ObservacionStoreRequest;
use App\Http\Requests\ArchivoDigitalStoreRequest;
use App\Http\Requests;
use App\Http\Requests\CompraStoreRequest;
use App\Http\Controllers\Controller;
use App\Helpers\Contracts\AvisosSistemaContract;

class  CompraController extends Controller
{
protected $usuario;
protected $correo;
protected $arr_objeto=null;
protected $arr_json;
     public function __construct(HelperUsuario $consulta_usuario, ManagerCorreo $envia_correo){
         $this->usuario= $consulta_usuario;
         $this->correo=$envia_correo;
         $this->arr_objeto=array('tipo_archivo'=>'c');
         $this->arr_json=[];
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->buscar)){//mostrar solo guardadas y aprobadas
                $objetos=Compra::buscar($request->all())
                    ->where('tipo_archivo','c')
                    //->orderBy('updated_at','desc')
                    ->paginate(15);
                return view('compras.index',compact('objetos','request'));

        }else{
            switch ($request->folio) {
                case '1':
                    # code...
                $folio=$this->getFolio($request->org_name);
                return response()->json(
                [
                    "msg"=>"Success",
                    "folio"=>$folio
                ],200);
                    break;

                default:
                    # code...
                    $objetos=Compra::buscar($this->arr_objeto+$request->all())
                    //where('tipo_archivo','c')
                    ->orderBy('updated_at','desc')
                    ->paginate(15);
                    return view('compras.index',compact('objetos','request'));
                    break;
            }//FIN SWITCH
        }//FIN ELSE
    }//FIN FUNCION
    public function indexAprobar(Request $request)
    {
        //if(!isset($request->buscar)){
            $objetos=Compra::buscar($request->all())
                ->where('tipo_archivo','c')
                ->orderBy('updated_at','desc')
                ->paginate(15);
     /*
        }else{

            $objetos=Compra::
                where('tipo_archivo','c')
                ->orderBy('updated_at','desc')
                ->paginate(25);
        }
        */
                //dd($objetos);
            return view('compras.indexAprobar',compact('objetos','request'));
    }
    public function restaurar(Request $request){
        $objetos=Compra::OnlyTrashed()
            ->where('tipo_archivo','c')
            ->paginate(15);
            //dd($objetos);
            return view('compras.restaurar',compact('objetos','request'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function create($id)
    public function create($id)
    {
        return view('compras.compras_create',compact('id'));
    }

    public function solicitud()
    {
        return view('compras.compras_solicitud');
    }
    public function prestamo($id)
    {
        return view('compras.compras_prestamo',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(CompraStoreRequest $request)
    public function store(Request $request)
    {
        if(!$this->folioValido($request->folio,$request->org_name)){
            return response()->json(['msg'=>'Folio no válido'],422);
        }
        //inicia obtener ultima compra
        //dd($request->all());
        $compra_folio=Compra::select('id','folio')->Where('tipo_archivo','c')->where('org_name',$request->org_name)->orderBy('folio','desc')->limit(1)->get();
        //dd($compra_folio);
        //dd($request->version);
        if(empty($compra_folio[0])){
            $ultima_orden=1;
        }else{
            if($request->version==0){
                $ultima_orden=$compra_folio[0]->folio+1;
            }else{
                $ultima_orden=$compra_folio[0]->folio;
            }
        }
        //fin obtener ultima compra
        //return  $ultima_orden;
        foreach ($request->all() as $key => $value) {
            if($key!=='insumos'){
                $this->aJson($key,$value);
                $compra[$key]=$value;
            }
        }
        if($request->folio>0){
            $compra['folio']=$request->folio;
        }else{
            $compra['folio']=$ultima_orden;
        }
        //dd($compra['folio']);
        $compra['estatus']='GUARDADO';
        $compra['digitalizacion']='';
        //$compra['id_camp_publ']='';
        $compra['dato']=json_encode($this->arr_json);

        $compra_nueva=Compra::create($compra);

        //inicia relacion estatus - objeto.
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        Calificacion::create([
            'id_producto'=>$compra_nueva->id,
            'nombre_tipo'=>'compra',
            'ruta_siguiente'=>'compra.IndexAprobacion',
            'ruta_califico'=>$califico,
            'calificacion'=>'GUARDADO',
            'iniciales'=>$iniciales
            ]);
        //fin registro estatus - objeto.
        $arr_insumos_compras=[];
            foreach ($request->insumos as $insumo_compra) {
                foreach($insumo_compra as $key=>$v){
                    $insumo_compra[$key]=trim($v);
                }
                $insumo_compra['id_compra_venta']=$compra_nueva->id;
                $arr_insumos_compras[]=new InsumoCompraVenta($insumo_compra);
            }
            //dd($arr_insumos_compras);
        $compra_nueva->insumos_compras_ventas()->saveMany($arr_insumos_compras);
        //fin alta insumos compras
        return response()->json(
                [
                    "msg"=>"Success"
                ],200);
        //return redirect('compras');
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
        if($request->wantsJson()){
            $objetos=Compra::findOrFail($id);
            $insumos=InsumoCompraVenta::clase('')
            ->idCompraVenta($id)->get();
            $objetos->insumos_compras_ventas=$insumos;
               return response()->json(
                [
                    "msg"=>"Success",
                    "compra"=>$objetos->toArray()
                ],200
                );

        }else{
            $objeto = Compra::findOrFail($id);
            return view('compras.show',compact('objeto'));
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
        //dd($id);
        //$objeto = Compra::find($id);                                                  //realizar consulta Compras//
        return view('compras.compras_edit',compact('id'));//return view('compras.compras_edit',compact('objeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        foreach ($request->all() as $key => $value) {
            if($key!='insumos'){
                $this->aJson($key,$value);
                $compra[$key]=$value;
            }
        }

        $objeto = Compra::findOrFail($id);
        //$compra['id_camp_publ']='';
        $compra['dato']=json_encode($this->arr_json);
        $objeto->update($compra);
        $insumos=InsumoCompraVenta::clase('')
            ->idCompraVenta($id)->delete();
        $arr_insumos_compras='';
            foreach ($request->insumos as $insumo_compra) {
                $insumo_compra['id_compra_venta']=$id;
                $arr_insumos_compras[]=new InsumoCompraVenta($insumo_compra);
            }
            //dd($arr_insumos_compras);
        $objeto->insumos_compras_ventas()->saveMany($arr_insumos_compras);

        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        $objeto->calificacion()->delete();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'compra',
            'ruta_siguiente'=>'compra.IndexAprobacion',
            'ruta_califico'=>$califico,
            'calificacion'=>'GUARDADO',
            'iniciales'=>$iniciales
            ]);
        return response()->json(
                [
                    "msg"=>"Success"
                ],200);
    }

    public function estatus(Request $request, $id,AvisosSistemaContract $notificar)
    {
        //primero buscar la ultima
        $compra=Compra::findOrFail($id);
        $compra->update(['estatus'=>$request->calificacion]);
        //$compra->calificacion()->delete();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'compra',
            'ruta_siguiente'=>'',
            'ruta_califico'=>\Route::current()->getName(),
            'calificacion'=>$request->calificacion,
            'iniciales'=>auth()->user()->iniciales
            ]);
            //INICIO ENVIO AVISO
            $avisar_usario=$this->estadoAviso($request,$compra);
            //FIN ENVIO AVISO
            //dd($avisar_usario);
        $arr_url=explode('/',$request->url());
        $url= $arr_url[2].'/compras';
        if(count($avisar_usario)>0){
            foreach ($avisar_usario as $key => $usuario_dpto_vtas) {
                $contenido=array('msj'=>'ESTATUS DE COMPRA: <h4> '.$compra->folio.'</h4>. HA CAMBIADO A '.$request->calificacion.'. '.
                    '<a href="'.$url.'?numero_orden='.$compra->folio.'">Clic aquí para verificar</a>');
                $correo=[
                    'remitente'=>$request->user()->email,
                    'alias'=>$request->user()->name,
                    'asunto'=>'Notificación de sistema.'
                ];
                $correo['destino']=$usuario_dpto_vtas;
                $correo['contenido']=$contenido;
                $this->correo->enviarCorreo($correo);
            }

        }
        $notificar->avisa([
        'recurso'=>'cotizaciones.update',
          'estado'=>$compra->estatus,

          'acceso'=>'CompraController@index',
          'dato'=>'buscar=1&folio='.$compra->folio,
          'descripcion'=>'ACCESO A COMPRA'.$compra->estatus,
          'id_foraneo'=>$compra->id
          ]);
        return back();
    }

    public function cancelar(Request $request, $id){
        $compra=Compra::findOrFail($id);
        $compra->update(['estatus'=>$request->estatus]);
        $compra->calificacion()->delete();
        Calificacion::create([
            'id_producto'=>$id,
            'nombre_tipo'=>'compra',
            'ruta_siguiente'=>$request->ruta_siguiente,
            'ruta_califico'=>\Route::current()->getName(),
            'calificacion'=>$request->estatus,
            'iniciales'=>auth()->user()->iniciales
            ]);

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
    public function digitalizar($id){
        $objeto=Compra::findOrFail($id);
        return view('compras.digitalizar',compact('objeto'));
    }
    public function archivar(ArchivoDigitalStoreRequest $request){
        $file = $request->file('file');
       $arr_nombre_archivo =explode('.',$file->getClientOriginalName());
       $nombre='Com'.$request->id.'.'.$arr_nombre_archivo[count($arr_nombre_archivo)-1];
       \Storage::disk('local')->put($nombre,  \File::get($file));
        $objeto = Compra::findOrFail($request->id);
        $objeto->digitalizacion=$nombre;
        $objeto->update();
        return view('compras.digitalizar',compact('objeto'));
    }
    public function digital($id){
        $objeto=Compra::findOrFail($id);
        $ruta=  '/var/www/html/comercial/storage/app/'.$objeto->digitalizacion;
        $headers = array(
                    'Content-Type' => 'application/octet-stream',
                );
        return response()->download($ruta,$objeto->digitalizacion,$headers);
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
        $objeto = Compra::withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico
                        # code...
                        $objeto->delete();
                }
		       return redirect('compras');
		//return redirect()->action('CompraController@index');
    }
    public function aJson($key,$value){
        switch ($key) {
            case 'numero_contrato_cliente':
                $this->arr_json['numero_contrato_cliente'] = $value;
            break;
            case 'equipo':
                $this->arr_json['equipo'] = $value;
            break;
            case 'numero_serie':
                $this->arr_json['numero_serie'] = $value;
            break;
            case 'sr':
                $this->arr_json['sr'] = $value;
            break;
            case 'incoterm':
                $this->arr_json['incoterm'] = $value;
            break;
            case 'reporte':
                $this->arr_json['reporte'] = $value;
            break;
            case 'moneda':
                $this->arr_json['moneda'] = $value;
            break;
            case 'name_metodo_pago':
                $this->arr_json['name_metodo_pago'] = $value;
            break;
            case 'name_metodo_envio':
                $this->arr_json['name_metodo_envio'] = $value;
            break;
            case 'name_condicion_pago':
                $this->arr_json['name_condicion_pago'] = $value;
            break;
            case 'name_gerente':
                $this->arr_json['name_gerente'] = $value;
            break;
            case 'name_facturacion':
                $this->arr_json['name_facturacion'] = $value;
            break;
        }
    }
    public function getFolio($org){
        $ultima_orden='';
        $compra_folio=Compra::select('id','folio')->Where('tipo_archivo','c')->where('org_name',$org)->orderBy('folio','desc')->first();
        //limit(1)->get();
        //dd($compra_folio);
        //dd($request->version);
        if(empty($compra_folio)){
            $ultima_orden=1;
        }else{
                $ultima_orden=$compra_folio->folio+1;
        }
        return $ultima_orden;
    }
    public function folioValido($folio,$org){
        $valido=0;
        $compara_folio=null;
        $compara_folio=Compra::select('id','folio')
        ->Where('tipo_archivo','c')
        ->where('org_name',$org)
        ->where('folio',$folio)
        ->orderBy('folio','desc')
        ->first();
        if(empty($compara_folio) ){
            $valido=1;
        }
        if(is_numeric($folio)){
            $valido=1;
        }
        return $valido;
    }
private function estadoAviso($request,$objeto){
          $destinos=[];
          $usuarios=[];
          $estado_aviso= Estado::buscar([
              'clase'=>'compra',
              'subclase'=>'',
              'organizacion'=>$objeto->org_name,
              'estado'=>$objeto->estatus,
              ])->get();
              foreach($estado_aviso as $v){
              foreach($v->avisos as $usuario_estado_aviso){
                $usuarios=HelperUsuario::getUsuarioConPermiso([
                  'condicion'=>$usuario_estado_aviso->condicion,
                  'condicionante'=>$usuario_estado_aviso->condicionante,
                  'permiso'=>'compras.estatus',
                ]);//verificar que usuario tenga permiso al index de compra

              }
              }//usuarios q deben recibir avisos.
              foreach ($usuarios as $value) {
                $destinos[]=$value->email;
              }
          return $destinos;
}

}
