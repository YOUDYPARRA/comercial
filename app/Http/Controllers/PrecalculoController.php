<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Precalculo;
use App\Cotizacion; 
use App\CotizacionPaqueteInsumo;
use App\Insumo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  PrecalculoController extends Controller
{

    public function ultimo(Request $request)
    {
        $objetos=Cotizacion::on('mysql')
        ->whereRaw('id = (SELECT max(`id`) FROM precalculos)')
        ->groupBy('id')
        ->get();
        return response()->json(
                [
                    "msg"=>"Success",
                    "ultimo"=>$objetos->toArray()
                ],200
                );
        //return view('paquetes.index',  compact('objetos','request'));
        //dd($objetos->toArray());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
    switch ($request->vi) {
        case '0':
            # code...Solo eliminados
            $objetos=Precalculo::onlyTrashed()
            ->IdCotizacionesPaquetesInsumos($request->get('id_cotizaciones_paquetes_insumos'))
            ->NumeroProyecto($request->get('numero_proyecto'))
            ->fechaCreacion($request->get('numero_proyecto'))
            ->paginate(25);
            $subject=$objetos->render();
                    $objetos->paginado=str_replace("?", "?vi=0&", $subject);
                    
            break;
        
        default:
            # code...
            $objetos=Precalculo::
             IdCotizacionesPaquetesInsumos($request->get('id_cotizaciones_paquetes_insumos'))
            ->NumeroProyecto($request->get('numero_proyecto'))
            ->fechaCreacion($request->get('numero_proyecto'))
            ->paginate(25);
            break;
    }
     if ($request->wantsJson())
        {
            return response()->json(
            [
                "msg"=>"Success",
                "precalculos"=>$objetos->toArray()
            ],200
            );

        }else
        {
            
            if($request->vi=='0')
            {
                return view('precalculos.restaurar',  compact('objetos','request'));
            }else
            {
                return view('precalculos.index',  compact('objetos','request'));
            }

           
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->id_cotizacion);
        $id_cotizacion=$request->id_cotizacion;
        //return view('precalculos.create');
        return view('precalculos.create',compact('id_cotizacion'));
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
        //dd($request);
        Precalculo::create($request->all());
        return response()->json(
                [
                    "msg"=>"Success"
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
    {   //dd("ENTRO AQUI");
        try {
                    
            $objeto = Precalculo::findOrFail($id);
            $cotizacion=Cotizacion::on('mysql')
        ->id($objeto->id_cotizaciones_paquetes_insumos)
        ->get();
        $objeto->cotizacion=$cotizacion;  //        //dd($objetos->cotizacion[0]->id);
//$d=$objetos->cotizacion[0]->id;
//dd($objetos);
           $cotizacion_paquete_insumo=CotizacionPaqueteInsumo::on('mysql')
            ->idCotizacion($objeto->id_cotizaciones_paquetes_insumos)
            ->get();            //dd($cotizacion_paquete_insumo->toArray()); //OK
        $objeto->insumos=$cotizacion_paquete_insumo;  //        
        //dd($objetos);
        /*foreach ($cotizacion_paquete_insumo as $key => $objeto) {
                        # code-...
                        $insumo=Insumo::find($objeto->id_insumo);
                        //dd($insumo);
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
                        $objeto->insumo_unidad_medida=$insumo->unidad_medida;
                        $objeto->insumo_tipo_cambio=$insumo->tipo_cambio;
                        $objeto->insumo_estado=$insumo->estado;
                        $objeto->insumo_deleted_at=$insumo->deleted_at;
                        $objeto->insumo_updated_at=$insumo->updated_at;
                    }*/


                $return = response()->json(               //ERROR DE SINTAXIS FALTA=
                    [
                        "msg"=>"Success",
                        'precalculo'=>$objeto
                    ],200
                    );
                } catch (Exception $e) {
                    $return = response()->json(               //ERROR DE SINTAXIS FALTA=
                    [
                        "msg"=>"Fail"
                    ],500
                    );
                }
        return $return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {//dd($id);//
        try {
            
            $objeto = Precalculo::findOrFail($id);
                return view('precalculos.edit',compact('id'));
        } catch (Exception $e) {
                       abort(404, 'Error action.');
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
        //
        try {
            $objeto = Precalculo::findOrFail($id);
                $objeto->update($request->all());
            $rtn=response()->json(
                [
                    "msg"=>"Success"
                ],200
                );
        } catch (Exception $e) {
            $rtn=response()->json(
                [
                    "msg"=>"Fail"
                ],500
                );
        }
            return $rtn; 
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
        try {
            
            $objeto = Precalculo::withTrashed()->findOrFail($id);
            if($objeto->trashed())
                    {//
                           $objeto->restore();
                    }else
                    {//Borrado logico 
                            # code...
                            $objeto->delete();
                    }
            $return = response()->json(                 
                    [
                        "msg"=>"Success"
                    ],200
                    );
        } catch (Exception $e) {
            $return = response()->json(                 
                    [
                        "msg"=>"Fail"
                    ],404
                    );
        }
        return $return;
    }
}
