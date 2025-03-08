<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;
use App\Insumo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class  PaqueteController extends Controller
{   

    public function __construct(){
         $this->middleware('auth');
     }
     
    public function consultaPaquete(Request $request)
    {
        $objetos=Paquete::on('mysql')
        //->with('insumos')
        ->idPack($request->get('id_pack'))
        ->get();
        $insumos=Insumo::on('mysql') //20160701
        -id($objetos->id_equipo)
        -get();
        $objetos=$insumos;
        return response()->json(
                [
                    "msg"=>"Success",
                    "paquete"=>$objetos->toArray()
                ],200
                );
       // dd($objetos->toArray());
    }

    public function consultarPaquetes(Request $request)
    {
        //dd($request->get('bandera_insumo'));        //dd($request->get('descripcion'));
        $objetos=Paquete::on('mysql')
        ->idpack($request->get('id_pack'))
        ->descripcion($request->get('descripcion'))
        ->codigo($request->get('codigo_proovedor'))
        ->bandera($request->get('bandera_insumo'))
        ->tipoequipo($request->get('tipo_equipo'))
        ->marca($request->get('marca'))
        ->modelo($request->get('modelo'))
        ->get();
                //dd($objetos);
        return response()->json(
                [
                    "msg"=>"Success",
                    "paquetes"=>$objetos->toArray()
                ],200
                );
       // dd($objetos->toArray());
    }

    public function maximo(Request $request)
    {
        $objetos=Paquete::on('mysql')
        ->whereRaw('id_pack = (select max(`id_pack`) from paquetes)')
        ->groupBy('id_pack')
        ->get();
        return response()->json(
                [
                    "msg"=>"Success",
                    "maximo"=>$objetos->toArray()
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

        switch ($request->vista) {
            case '0':
                # code...
            $objetos=Paquete::on('mysql')//->paginate(10);
                        ->onlyTrashed()
                        ->with('insumos')
                        ->with('refacciones')
                        ->paginate(15);

                        $subject=$objetos->render();
                        $objetos->paginado=str_replace("?", "?vista=0&", $subject);
                        return view('paquetes.restaura',  compact('objetos','request'));

                break;
                case '1':       //dd("entrando a vista = 1");
                    # code...           
                    //var_dump("expression");         
                    $objetos=Paquete::on('mysql')
                    ->idPack($request->id_pack)
                            ->descripcion($request->get('descripcion'))
                            ->codigo($request->get('codigo_proovedor'))
                            ->bandera($request->get('bandera_insumo'))
                            ->tipoequipo($request->get('tipo_equipo'))
                            ->marca($request->get('marca'))
                            ->modelo($request->get('modelo'))
                    ->get();
                    foreach ($objetos as $key => $objeto) {
                        # code-...
                        $insumo=Insumo::find($objeto->id_equipo);
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
                        $objeto->insumo_costo_moneda=$insumo->costo_moneda;
                        $objeto->insumo_unidad_compra=$insumo->unidad_compra;
                        $objeto->insumo_cantidad_unidad_compra=$insumo->cantidad_unidad_compra;
                    }
                    //dd($objetos);
                    return response()->json(
                            [
                                "msg"=>"Success",
                                "paquete"=>$objetos->toArray()
                            ],200
                            );
                    break;
            default:
                # code...
                $objetos=Paquete::on('mysql')//->paginate(10);
                        ->with('insumos')
                        ->with('refacciones')
                        ->paginate(10);
                return view('paquetes.index',  compact('objetos','request'));
                break;
        }
                //->get();
               //dd($objetos->toArray());
        //->IdEquipo($request->get('id_equipo'))
        //->IdRefaccion($request->get('id_refaccion'))
        //->BanderaInsumo($request->get('bandera_insumo'))
        //->paginate(25);
       /* return response()->json(
                [
                    "msg"=>"Success",
                    "paquetes"=>$objeto->toArray()
                ],200
                );*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('paquetes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->only('id'));
        switch ($request->vista) {
            case '0':
                # code...
                $objeto=Paquete::create($request->all());
                return response()->json(
                [
                    "msg"=>"Success",
                    "paquete"=>$objeto
                    
                ],200
                );

                break;
            
            default:
                # code...
                    $i=1;
                    $j=1;
                   //dd($request->all()); 
                    //dd("ENTRO AQUI");
               $a=count($request->objeto);
               //dd($a);
               
            while($i<=$a){
                Paquete::create($request->objeto[$j]);
                $i++;
                $j++;
                
            }
                return redirect('paquetes');
                break;
        
   }
        //var_dump($request->objeto[2]);
        //dd($a);
        
        /*foreach ($request as $value) {
            echo "$value";
        }*/
        
      //  Paquete::create($request->all());
        //return redirect('paquetes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$objeto = Paquete::find($id);
 $paquetes = Paquete::on('mysql')
       // ->with('insumos')
        ->where('id_pack',$id)
        ->get();
       /*return response()->json(
                [
                    "msg"=>"Success",
                    "paquetes"=>$paquetes->toArray()
                ],200
                );*/
//dd($paquetes->toArray());
return view('paquetes.delete',compact('paquetes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pack)
    {
        //dd($id_pack);
        $paquetes = Paquete::on('mysql')
        ->with('insumos')
        ->where('id_pack',$id_pack)
        ->get();
        //dd($paquetes->toArray());
        //dd($paquetes[0]['id']);
            //realizar consulta PAQUETES
            //return $objeto;
       
       return view('paquetes.edit',compact('paquetes'));
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
        $objeto = Paquete::find($id);
            $objeto->update($request->all());
            return redirect('paquetes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $rq,$id_pack)
    {
        switch ($rq->vista) {
            case '0':
                # code..."BORRADO FISICO DE UN ELEMENTO."
            //dd("BORRADO FISICO DE UN ELEMENTO");
                $objeto= Paquete::on('mysql')
                ->withTrashed()
                ->find($id_pack);
                $objeto->forceDelete();
                //->get();
                /*$objeto->forceDelete();
                redirect()->action('PaqueteController@edit', [$id_pack]);
                break;*/
                return response()->json(
                [
                    "msg"=>"Success"
                    
                ],200
                );
                break;
            
            default:
                # code...BORRADO LOGICO Y RESTAURACION.
                //dd("BORRADO LOGICO Y RESTAURACION");
                $paquetes = Paquete::on('mysql')
                ->withTrashed()
                ->with('insumos')
                ->where('id_pack',$id_pack)
                ->get();
                //dd($paquetes);
                if($paquetes[0]->trashed())
                {//Si esta eliminado va a restaurar.
                    foreach ($paquetes as $key => $paquete) {
                       $paquete->restore();
                    }

                }else
                {//Borrado logico 
                    foreach ($paquetes as $key => $paquete) {
                        # code...
                        $paquete->delete();
                    }
                    
                }
                return redirect('paquetes');
                break;
        }

        
       // dd($id);
       // $objeto = Paquete::find($id_pack);
            //dd($objeto);
		
    }
}
