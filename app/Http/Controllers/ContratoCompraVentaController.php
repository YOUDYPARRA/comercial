<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContratoCompraVenta;
use App\CotizacionPaqueteInsumo;
use App\Cotizacion;
use App\Services\ManagerCorreo;
use App\Helpers\HelperUsuario;
use App\Http\Requests\ArchivoDigitalStoreRequest;
use App\Clase;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  ContratoCompraVentaController extends Controller
{
    protected $usuario;
    protected $correo;
     public function __construct(HelperUsuario $consulta_usuario, ManagerCorreo $envia_correo){
         $this->usuario= $consulta_usuario;
         $this->correo=$envia_correo;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function ccv_create(Request $request,$id){
    //CONSULTAR LA COTIZACION,CLASE, INSUMOSPAQUETESINSUMOS Y CONSULTAR PLANTILLA DE CONTRATO D COMPRA VENTA Y ENVIARLO AL FORMULARIO.
        $cccv = Cotizacion::find($id);
        $ccvex = Clase::where('id_cotizacion',$id);
        $cpi=CotizacionPaqueteInsumo::where('id_cotizacion',$id);
          foreach ($ccvex as $key => $value) {
            $cccv->$key=$value;
          }
        dd($cccv);
        
    }
    public function ccv_store(Request $request){}
    */
    public function index(Request $request)
    {
        switch ($request->vi) {
            case '0':
                # code...SOLO ELIMINADOS
                $objetos=ContratoCompraVenta::onlyTrashed()
                    ->idCotizacion($request->get('id_cotizacion'))
                    ->NumeroContratoCompraVenta($request->get('numero_contrato_compra_venta'))
                    ->paginate(25);
                    $subject=$objetos->render();
                    $objetos->paginado=str_replace("?", "?vi=0&", $subject);
            return view('contratos_compra_venta.restaura',  compact('objetos','request'));
                break;
                case '1': //dd($request->get('organizacion'));
                    # code...//obtener el ultimo numero de contrato de compra venta.
                $objetos=ContratoCompraVenta::
                numeroContratocompraventa($request->get('numero_contrato_compra_venta'))
                ->organizacion($request->get('organizacion'))
                ->orderBy('numero_contrato_compra_venta','desc')
                ->take(3)
                ->get();
                //dd($objetos);
                    break;
            default:
                # code...
            //dd("okas");
            $objetos=ContratoCompraVenta::
            numeroContratocompraventa($request->get('numero_contrato_compra_venta'))
            ->idCotizacion($request->get('id_cotizacion'))
            ->fecha($request->get('fecha'))
            ->orderBy('numero_contrato_compra_venta','desc')
                    //->get();
                    ->paginate(10);
                break;
        }
        //dd($objetos[0]->cotizacion->numero_cotizacion);
        //dd($objetos[0]->contrato_compra_venta->id);
        if ($request->wantsJson())
            {
                return response()->json(
                [
                    "msg"=>"Success",
                    "contratos_compra_venta"=>$objetos->toArray()
                ],200
                );

            }else
            {
                return view('contratos_compra_venta.index',compact('objetos','request'));
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $id_cotizacion=$request->id_cotizacion;
        return view('contratos_compra_venta.create',compact('id_cotizacion'));
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
        ContratoCompraVenta::create($request->all());
        return response()->json(
                [
                    "msg"=>"Success",
                ],200
                );
        //return redirect('cotizacionPaqueteInsumo',compact('request'));
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
        $objeto = ContratoCompraVenta::find($id);
        return response()->json(
                [
                    "msg"=>"Success",
                    "contrato_compra_venta"=>$objeto->toArray()
                ],200
                );
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
          return view('contratos_compra_venta.edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){//dd($id);//
     // dd($request->get('condicion_pago'));
        $objeto = ContratoCompraVenta::find($id);
            $objeto->update($request->all());
            if($request->aviso){//inicio aviso
                $correo=[
                    'remitente'=>auth()->user()->email,
                    'alias'=>auth()->user()->name,
                    'asunto'=>'Notificación de sistema.'
                ];
                $destinatario=$this->usuario->getUsuario(['iniciales'=>$objeto->cotizacion->iniciales_asignado]);
                $contenido=array('msj'=>'AVISO DE CONTRATO REALIZADO:  <h4> '.$objeto->numero_contrato_compra_venta.'</h4>. HA CAMBIADO. '.'<a href="'.'/contratos_compra_venta?numero_contrato_compra_venta='.$objeto->numero_contrato_compra_venta.'">Clic aquí para verificar</a>');
                            $correo['destino']=$destinatario[0]->email;
                            $correo['contenido']=$contenido;
                            $this->correo->enviarCorreo($correo);

            }//fin aviso
            if($request->wantsJson()){

            return response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
            }else{
                return back();                
            }
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
        $objeto=null;
        $objeto = ContratoCompraVenta::withTrashed()->find($id);
		if($objeto)
                {//Si esta eliminado va a restaurar. ANTES DE RESTAURAR CONSULTAR QUE NO EXISTA ALGUNO OTRO CONTRATO 
                       $objeto->restore();
                }else
                {//Borrado logico 
                        # code...
                        $objeto->delete();
                }
		return response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
    }
    public function digitalizar($id){
        $objeto=ContratoCompraVenta::findOrFail($id);
        //dd($objeto->getAttributes());
          $objeto->clase='CON';
        return view('contratos_compra_venta.digitalizar',compact('objeto'));
    }
    public function archivar(ArchivoDigitalStoreRequest $request){
        //dd($request->all());
        $file = $request->file('file');
       $arr_nombre_archivo =explode('.',$file->getClientOriginalName());
       $nombre='Con'.$request->id.'.'.$arr_nombre_archivo[count($arr_nombre_archivo)-1];
       \Storage::disk('local')->put($nombre,  \File::get($file));
        $objeto = ContratoCompraVenta::findOrFail($request->id);
        $objeto->digitalizacion=$nombre;
        $objeto->update();
        return view('contratos_compra_venta.digitalizar',compact('objeto'));
    }
    public function digital($id){
        $objeto=ContratoCompraVenta::findOrFail($id);
        $ruta=  '/var/www/html/comercial/storage/app/'.$objeto->digitalizacion;
        $headers = array(
                    'Content-Type' => 'application/octet-stream',
                );
        return response()->download($ruta,$objeto->digitalizacion,$headers);
    }
}
