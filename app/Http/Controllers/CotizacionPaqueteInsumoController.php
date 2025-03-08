<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CotizacionPaqueteInsumo;
use App\Cotizacion;
use Carbon\Carbon;
use App\Clase;
use App\Insumo;
use App\Tercero;
use App\Direccion;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  CotizacionPaqueteInsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function ccv_index(Request $request){

      return view('cotizaciones_paquetes_insumos.index',compact('request'));
    }*/
    public function ccv_edit($id){
      return view('cotizaciones_paquetes_insumos.c_ccv_edit',compact('id'));
    }

    public function ccv_create(Request $request){
      //dd('FcN CREATE');
      return view('cotizaciones_paquetes_insumos.c_ccv_create');
    }
    public function ccv_update(Request $request,$id){
      $cccv = Cotizacion::find($id);
      $ccvex = Clase::buscar(['id_cotizacion'=>$id])->get();
      $ccvex=$ccvex[0];
      $arr_cccv=null;
      $arr_cccvex=null;
      foreach ($request->all() as $key => $value) {
        if(!is_array($value)){
          $arr_cccv[$key]=$value;
        }
      }/*
      foreach ($request->all() as $key => $value) {
        if(!is_array($value)){
          $arr_cccvex[$key]=$value;
        }
      }*/
      $cccv->fill($arr_cccv);
      $cccv->codigo_postal_fiscal=$request->c_p_fiscal;
      $cccv->correo=$request->correos;
      $cccv->telefono=$request->telefonos;
      $cccv->calle_entrega=$request->calle;
      $cccv->colonia_entrega=$request->colonia;
      $cccv->ciudad_entrega=$request->ciudad;
      $cccv->pais_entrega=$request->pais;
      $cccv->codigo_postal_entrega=$request->c_p;
      $cccv->estado_entrega=$request->estado;
      $cccv->org_name=$request->organizacion;
      $fecha=Carbon::parse($request->fecha)->format('Y-m-d');
      $cccv->fecha=$fecha;
      $cccv->area='comercial';
      $cccv->clase='CCCV';
      $cccv->save();      
      $ccvex->folio_contrato=$request->no_contrato;
      $ccvex->organizacion=$request->organizacion;
      $ccvex->clase='CCCV';
      $ccvex->sucursal=auth()->user()->lugar_centro_costo;
      $ccvex->autor=auth()->user()->iniciales;
      $ccvex->folio_contrato_venta=$request->no_pedido;
      $dato['mensualidades']=$request->mensualidades;
      //$dato['porcentaje']=$request->porcentaje;
      $dato['pagare']=$request->pagare;
      $dato['referencia']=$request->referencia;
      $dato['referenciados']=$request->referenciados;
      $dato['aval']=$request->aval;
      $dato['identificacion']=$request->identificacion;
      $dato['identificacionno']=$request->identificacionno;
      $dato['numero_escritura_publica']=$request->numero_escritura_publica;
      $dato['notario']=$request->notario;
      $dato['ciudadnotario']=$request->ciudadnotario;
      $dato['numero_poder']=$request->numero_poder;
      $dato['notario1']=$request->notario1;
      $dato['ciudadnotario1']=$request->ciudadnotario1;
      $dato['aclaracion_dato_comprador']=$request->aclaracion_dato_comprador;
      $dato['representante_legal']=$request->representante_legal;
      $dato['entrega']=$request->entrega;
      $dato['identificador']=$request->identificador;
      $dato['contraentrega']=$request->contraentrega;
      $dato['financiamiento']=$request->financiamiento;
      $ccvex->nombre_responsable=$cccv->nombre_empleado;
      $ccvex->dato=json_encode($dato);
      $ccvex->update();
      CotizacionPaqueteInsumo::where('id_cotizacion',$id)->forceDelete();
      foreach ($request->equipos as $v) {
          $cotizacionPaqueteInsumo = [
                 'id_cotizacion' => $cccv->id,
                'bandera_insumo' => 'E',
                'tipo_equipo' => 'E',
                'descripcion' => $v['descripcion'],
                'modelo' => $v['modelo'],
                'marca' => $v['marca'],
                'cantidad' => $v['cantidad'],
                'codigo_proovedor' => $v['codigo_proovedor']
                 ];
            CotizacionPaqueteInsumo::create($cotizacionPaqueteInsumo);
      }

      return response()->json(
                [
                    "msg"=>"Success",
                ],200
                );
    }
    public function ccv_store(Request $request){
      $fecha=Carbon::parse($request->fecha)->format('Y-m-d');
      $ccvex = new Clase($request->all());
      $cccv = new Cotizacion($request->all());
      $cccv->codigo_postal_fiscal=$request->c_p_fiscal;
      $cccv->correo=$request->correos;
      $cccv->telefono=$request->telefonos;
      $cccv->calle_entrega=$request->calle;
      $cccv->colonia_entrega=$request->colonia;
      $cccv->ciudad_entrega=$request->ciudad;
      $cccv->pais_entrega=$request->pais;
      $cccv->codigo_postal_entrega=$request->c_p;
      $cccv->estado_entrega=$request->estado;
      $cccv->org_name=$request->organizacion;
      $cccv->fecha=$fecha;
      $cccv->area='comercial';
      $cccv->clase='CCCV';
      $cccv->save();
      $ccvex->folio_contrato=$request->no_contrato;
      $ccvex->organizacion=$request->organizacion;
      $ccvex->clase='CCCV';
      $ccvex->sucursal=auth()->user()->lugar_centro_costo;
      $ccvex->autor=auth()->user()->iniciales;
      $ccvex->folio_contrato_venta=$request->no_pedido;
      $dato['mensualidades']=$request->mensualidades;
      //$dato['porcentaje']=$request->porcentaje;
      $dato['pagare']=$request->pagare;
      $dato['referencia']=$request->referencia;
      $dato['referenciados']=$request->referenciados;
      $dato['aval']=$request->aval;
      $dato['identificacion']=$request->identificacion;
      $dato['identificacionno']=$request->identificacionno;
      $dato['numero_escritura_publica']=$request->numero_escritura_publica;
      $dato['notario']=$request->notario;
      $dato['ciudadnotario']=$request->ciudadnotario;
      $dato['numero_poder']=$request->numero_poder;
      $dato['notario1']=$request->notario1;
      $dato['ciudadnotario1']=$request->ciudadnotario1;
      $dato['aclaracion_dato_comprador']=$request->aclaracion_dato_comprador;
      $dato['representante_legal']=$request->representante_legal;
      $dato['entrega']=$request->entrega;
      $dato['identificador']=$request->identificador;
      $dato['contraentrega']=$request->contraentrega;
      $dato['financiamiento']=$request->financiamiento;
      $ccvex->dato=json_encode($dato);
      $ccvex->id_cotizacion=$cccv->id;
      $ccvex->nombre_responsable=$cccv->nombre_empleado;
      $ccvex->save();
      foreach ($request->equipos as $v) {
          //dd($request->objeto);
      //dd($request->equipos);
          $cotizacionPaqueteInsumo = [
                'id_cotizacion' => $cccv->id,
                'bandera_insumo' => 'E',
                'tipo_equipo' => 'E',
                'descripcion' => $v['descripcion'],
                'modelo' => $v['modelo'],
                'marca' => $v['marca'],
                'cantidad' => $v['cantidad'],
                'codigo_proovedor' => $v['codigo_proovedor']
                 ];
            CotizacionPaqueteInsumo::create($cotizacionPaqueteInsumo);
      }
      return response()->json(
                [
                    "msg"=>"Success",
                    //"cotizacion"=>$request->all(),
                ],200
                );

    }
    public function index(Request $request)
    {
      //dd('index coti Paq Ins Control');
        switch ($request->vista) {
            case '0':
                # code...COTIZACIONES  ELIMINADAS
                $cotizaciones=Cotizacion::on('mysql')
                    ->onlyTrashed()
                    ->NombreFiscal($request->get('nombre_fiscal'))
                    ->NumeroCotizacion($request->get('numero_cotizacion'))
                   ->Fecha($request->get('fecha'))
                   ->Subtotal($request->get('subtotal'))
                   ->Iva($request->get('iva'))
                   ->Total($request->get('total'))
                   ->AprobacionVentas($request->get('aprobacion_ventas'))
                   ->FechaAprobacionVentas($request->get('fecha_aprobacion_ventas'))
                   ->AprobacionMarketing($request->get('aprobacion_marketing'))
                   ->FechaAprobacionMarketing($request->get('fecha_aprobacion_marketing'))
                   ->Version($request->get('version'))
                   ->NombreEmpleado($request->get('nombre_empleado'))
                   ->Estatus($request->get('estatus'))
                   ->Contacto($request->get('contacto'))
                   ->Correo($request->get('correo'))
                   ->Telefono($request->get('telefono'))
                   ->Celular($request->get('celular'))
                   ->TipoMoneda($request->get('tipo_moneda'))
                   ->TipoCliente($request->get('tipo_cliente'))
                   ->AprobacionCobranza($request->get('aprobacion_cobranza'))
                   ->FechaAprobacionCobranza($request->get('fecha_aprobacion_cobranza'))
                   ->Rfc($request->get('rfc'))
                   ->paginate(25);
                    $subject=$cotizaciones->render();
                    $cotizaciones->paginado=str_replace("?", "?vista=0&", $subject);
                    return view('cotizaciones_paquetes_insumos.restaura',  compact('cotizaciones','request'));

                break;
            default:
                # code...INGRESAR SI TIENE ACCESO Y BUSCAR DATOS POR VENDEDOR Y/O FILTRADO
            $cotizaciones=Cotizacion::on('mysql')
                   ->NombreFiscal($request->get('nombre_fiscal'))
                   ->NumeroCotizacion($request->get('numero_cotizacion'))
                   ->Fecha($request->get('fecha'))
                   ->Subtotal($request->get('subtotal'))
                   ->Iva($request->get('iva'))
                   ->Total($request->get('total'))
                   ->AprobacionVentas($request->get('aprobacion_ventas'))
                   ->FechaAprobacionVentas($request->get('fecha_aprobacion_ventas'))
                   ->AprobacionMarketing($request->get('aprobacion_marketing'))
                   ->FechaAprobacionMarketing($request->get('fecha_aprobacion_marketing'))
                   ->Version($request->get('version'))
                   ->NombreEmpleado($request->get('nombre_empleado'))
                   ->Estatus($request->get('estatus'))
                   ->Contacto($request->get('contacto'))
                   ->Correo($request->get('correo'))
                   ->Telefono($request->get('telefono'))
                   ->Celular($request->get('celular'))
                   ->TipoMoneda($request->get('tipo_moneda'))
                   ->TipoCliente($request->get('tipo_cliente'))
                   ->AprobacionCobranza($request->get('aprobacion_cobranza'))
                   ->FechaAprobacionCobranza($request->get('fecha_aprobacion_cobranza'))
                   ->Rfc($request->get('rfc'))
                   ->where('clase','CCCV')//->where('departamento','VENTAS PRIVADO')
                   ->orderBy('updated_at', 'desc')
                   ->paginate(25);

                    return view('cotizaciones_paquetes_insumos.index', compact('request','cotizaciones'));
                break;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cotizaciones_paquetes_insumos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $cotizacionPaqueteInsumo = [
                'id_cotizacion' => $request->get('id_cotizacion'),
                'id_insumo'    => $request->get('id_insumo'),
                'bandera_insumo' => $request->get('bandera_insumo'),
                'codigo_proovedor' => $request->get('codigo_proovedor'),
                'caracteristicas' => $request->get('caracteristicas'),
                'descripcion' => $request->get('descripcion'),
                'especificaciones' => $request->get('especificaciones'),
                'marca' => $request->get('marca'),
                'modelo' => $request->get('modelo'),
                'costos' => $request->get('costo'),
                'precio' => $request->get('precio'),
                'tipo_equipo' => $request->get('tipo_equipo'),
                'tipo_cambio' => $request->get('tipo_cambio'),
                'unidad_medida' => $request->get('unidad_medida'),
                'cantidad' => $request->get('cantidad'),
                'estado' => $request->get('estado')
                 ];
            CotizacionPaqueteInsumo::create($cotizacionPaqueteInsumo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $cotizacion=Cotizacion::on('mysql')
        ->find($id);        //->get();  //dd($cotizacion->toArray()); //ok
        $ccvex = null;
        $ccvex = Clase::where('id_cotizacion',$id)->where('clase','CCCV')->get();
        if(count($ccvex)>0){
          //dd($ccvex);
          $cotizacion->folio_contrato=$ccvex[0]->folio_contrato;
          $cotizacion->folio_contrato_venta=$ccvex[0]->folio_contrato_venta;
          $cotizacion->nombre_responsable=$ccvex[0]->nombre_responsable;
          $cotizacion->organizacion=$ccvex[0]->organizacion;
          $cotizacion->autor=$ccvex[0]->autor;
          $cotizacion->calle=$ccvex[0]->calle;
          $cotizacion->colonia=$ccvex[0]->colonia;
          $cotizacion->c_p=$ccvex[0]->c_p;
          $cotizacion->ciudad=$ccvex[0]->ciudad;
          $cotizacion->estado=$ccvex[0]->estado;
          $cotizacion->pais=$ccvex[0]->pais;
          $d=$ccvex[0]->dato;
          $arr=json_decode($d, true);
          foreach ($arr as $k => $v) {
            $cotizacion->$k=$v;
          }
        }

        //dd($cotizacion);
        $cotizacion_paquete_insumo=CotizacionPaqueteInsumo::idCotizacion($cotizacion->id)->get();
        //    dd($cotizacion_paquete_insumo);
        $cotizacion->insumos=$cotizacion_paquete_insumo;  //

        foreach ($cotizacion_paquete_insumo as $key => $objeto) {
                        # code-...
                        $insumo=null;
                        $insumo=Insumo::find($objeto->id_insumo);
                        //dd($insumo);
                        if($insumo){
                          $objeto->insumo_id=$insumo->id;
                          $objeto->insumo_bandera_insumo=$insumo->bandera_insumo;
                          $objeto->insumo_proovedor=$insumo->codigo_proovedor;
                          $objeto->insumo_tipo_equipo=$insumo->tipo_equipo;
                          $objeto->insumo_marca=$insumo->marca;
                          $objeto->insumo_modelo=$insumo->modelo;
                          $objeto->insumo_caracteristicas=$insumo->caracteristicas;
                          $objeto->insumo_descripcion=$insumo->descripcion;
                          $objeto->insumo_especificaciones=$insumo->especificaciones;
                          $objeto->insumo_precio=$insumo->precio;
                          $objeto->insumo_costos=$insumo->costos;
                          $objeto->insumo_unidad_compra=$insumo->unidad_compra;
                          $objeto->insumo_costo_moneda=$insumo->costo_moneda;
                          $objeto->insumo_unidad_medida=$insumo->unidad_medida;
                          $objeto->insumo_tipo_cambio=$insumo->tipo_cambio;
                          $objeto->insumo_estado=$insumo->estado;
                          $objeto->insumo_cantidad_unidad_compra=$insumo->cantidad_unidad_compra;
                          $objeto->insumo_deleted_at=$insumo->deleted_at;
                          //$objeto->insumo_updated_at=$insumo->updated_at;
                        }
                    }
       return response()->json(
                [
                    "msg"=>"Success",
                    "cotizacion"=>$cotizacion->toArray()
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
        $objeto = CotizacionPaqueteInsumo::find($id);
            //realizar consulta COTIZACIONES_PAQUETES_INSUMOS
            return $objeto;
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
      //dd($id);
        $objeto = CotizacionPaqueteInsumo::find($id);
            $objeto->update($request->all());
            //return redirect('cotizaciones_paquetes_insumos');
            return response()->json(
                [
                    "msg"=>"Success"
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
      $objeto = CotizacionPaqueteInsumo::find($id);
      $objeto->delete();
      return response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
    }
}
