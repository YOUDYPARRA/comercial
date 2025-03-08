<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase as Servicio;
use App\ServicioReporte;
use App\Servicio as Viatico;
use App\TiempoServicio;
use App\User;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ServicioReporteController extends Controller 
{
    /*
    *CONTROLA LOS HORARIOS DE ATENCION INVERTIDO POR EL INGENIERO DE SERVICIO clase SR
    */
protected $objeto=null;
private $user;
    public function __construct(){
        $this->objeto['clase']='SR';
         $this->user = new User;
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
            $objetos=Servicio::buscar($request->all())->get();

                return response()->json(
                [
                    "msg"=>"Success",
                    "objetos"=>$objetos->toArray()
                ],200
                );
            }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        //echo(last(explode('/', URL::current())));
        return view('servicios_reportes.create',compact('r'));
    }
    
    /**
     * Guardar los ingenieros y sus horarios respectivamente junto con los viaticos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $programa=Servicio::findOrFail($request->programacion);
        foreach ($request->persona as $value) {//Guardar en clase con clase SR los datos de ingeniero
            //INICIO BUSCAR INGENIERO
            $ingeniero_servicio = User::findOrFail($value);
            //FIN BUSCAR INGENIERO
            $objeto = new Servicio;
            $objeto->clase='SR';
            $objeto->id_foraneo=$request->id_foraneo;//ID DE REPORTE
            $objeto->autor=$ingeniero_servicio->iniciales;//INICIALES DE INGENIERO
            $objeto->correos=$ingeniero_servicio->email;//CORREO DE INGENIERO
            $objeto->id_cliente=$value;//ID DE INGENIERO
            $objeto->nombre_cliente=$ingeniero_servicio->name;//NOMBRE COMPLETO DE INGENIERO
            $objeto->dato=$request->programacion;//ID DE PROGRAMACION
            $objeto->organizacion=auth()->user()->org_name;
            $objeto->autor= auth()->user()->iniciales;
            $objeto->sucursal= auth()->user()->lugar_centro_costo;
            $objeto->folio_contrato=$request->folio_contrato;//ID DE COTIZACION
            $objeto->id_cotizacion=$request->id_cotizacion;//ID DE COTIZACION
            $objeto->folio_contrato_venta=$request->folio_contrato_venta;
            $objeto->save();
            foreach ($request->horarios as $horario) {    
                # code...id_foraneo debe ser el del reporte
                $obj_horario=new TiempoServicio($horario);
                $obj_horario->fecha=Carbon::parse($obj_horario->fecha)->format('Y-m-d');
                //$obj_horario->fecha=Carbon::createFromFormat('d-m-Y H',$obj_horario->fecha.'23');
                $obj_horario->id_foraneo=$request->id_foraneo;//ID DEL REPORTE PARA ESTE CASO.
                $obj_horario->save();
                //$arr_hor[]=$obj_horario;
                $servicio_reporte= new ServicioReporte;
                $servicio_reporte->dato='';
                $servicio_reporte->id_reporte=$request->id_foraneo;
                $servicio_reporte->id_horario=$obj_horario->id;
                $servicio_reporte->id_ingeniero_atencion=$value;
                $servicio_reporte->id_servicio='';
                $servicio_reporte->clase='SR';
                $servicio_reporte->subclase='';
                $servicio_reporte->organizacion=auth()->user()->org_name;
                $servicio_reporte->sucursal=auth()->user()->lugar_centro_costo;
                $servicio_reporte->save();
                //GUARDAR LOS VIATICOS
                $viaticos = new Viatico($request->all());
                $viaticos->id_foraneo=$request->id_foraneo;//ID DE REPORTE DE SERVICIO
                $viaticos->save();
            }
            //$objeto->rel_horario()->saveMany($arr_hor);            
        }

        //INICIO VIGENCIA PROGRAMACION
                    //dd($programa->personas_servicio);
        foreach ($programa->personas_servicio as $p_servicio) {
            $p_servicio->vigente='0';
            $p_servicio->update();
        }//fin vigencia PROGRAMADO

        if ($request->wantsJson()){
            return response()->json(
                    [
                        "msg"=>"Success",
                        //"objetos"=>$objetos->toArray()
                    ],200
                    );            
        }
        /*
        dd($request->horarios);
        dd($request->persona);*/
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
        $objeto=Servicio::findOrFail($id);
        $objeto->rel_horario;
        if ($request->wantsJson()){
                return response()->json(
                [
                    "objeto"=>$objeto->toArray()
                ],200
                );
        }else{
            return view('servicios_reporte.show',compact('objeto'));            
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
        return view('servicios_reporte.edit',compact('id'));
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
        //INSERTA UNA NUEVO HORARIO DE TRABAJO PARA CADA INGENIERO Y CAMBIAR BANDERA PROGRAMADO DE CADA INGENIERO PROGRAMADO
        //dd($request->all());
        $iniciales=auth()->user()->iniciales;
        $califico=\Route::current()->getName();
        
        //Inicia registro vigencias PROGRAMADO y estatus de reporte A CERRADO
        
            //dd($request->programacion);
            $programa=Servicio::findOrFail($request->programacion);
            //dd($programa->personas_servicio);
            foreach ($programa->personas_servicio as $p_servicio) {
                $objeto->clase='SR';
                $objeto->id_foraneo=$request->id_foraneo;//ID DE REPORTE
                $objeto->id_cotizacion=$request->id_cotizacion;//ID DE COTIZACION
                $objeto->folio_contrato=$request->folio_contrato;//ID DE COTIZACION
                $objeto->folio_contrato_venta=$request->folio_contrato_venta;
                $objeto->autor='SR';//INICIALES DE INGENIERO
                $objeto->correos='SR';//CORREO DE INGENIERO
                $objeto->id_cliente='';//ID DE INGENIERO
                $objeto->nombre_cliente='--- ';//NOMBRE COMPLETO DE INGENIERO
                $objeto->dato='---';//ID DE PROGRAMACION
                $objeto->organizacion=auth()->user()->org_name;
                $objeto->autor= auth()->user()->iniciales;
                $objeto->sucursal= auth()->user()->lugar_centro_costo;
                $objeto->save();
                //Inicio registro fechas Y HORAS SERVICIO
                //¿que ingeniero tiene que y cuantas varias horas?
                foreach ($request->horarios as $horario) {
                    # code...id_foraneo debe ser el del reporte
                    $obj_horario=new TiempoServicio($horario);
                    $obj_horario->fecha=Carbon::parse($obj_horario->fecha)->format('Y-m-d');
                    //$obj_horario->fecha=Carbon::createFromFormat('d-m-Y H',$obj_horario->fecha.'23');
                    $obj_horario->id_foraneo=$request->id_foraneo;//ID DEL REPORTE PARA ESTE CASO.
                    $arr_hor[]=$obj_horario;
                }
                $objeto->rel_horario()->saveMany($arr_hor);
            }

        //RESPUESTA...
        if ($request->wantsJson()){
                return response()->json(
                [
                    "msg"=>"ACTUALIZADO CORRECTAMENTE"
                ],200
                );
            }else{
                
            return back()->withErrors(['SE HA ACTUALIZADO EL DOCUMENTO.']);
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
        $objeto = Servicio::withTrashed()->findOrFail($id);
        if($objeto->trashed())
                {//Si esta eliminado va a restaurar.
                       $objeto->restore();
                }else
                {//Borrado logico 
                        # code...
                        $objeto->delete();
                } 
               return redirect('servicios_reporte');
    }
    
}
