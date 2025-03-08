<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insumo;
use App\MarcaProveedor;
use App\Http\Requests;
use App\Helpers\HelperUtil;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsumoStoreRequest;
//use
class  InsumoController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request){                                    // $i=1;
        switch ($request->vista) {
            case '0':                                                            # Direcciona a restaurar elemento eliminado.
                $objetos=Insumo::on('mysql')
                    ->onlyTrashed()                                             //                    ->estado($i)
                    ->paginate(15);
                    $subject=$objetos->render();
                    $objetos->paginado=str_replace("?", "?vista=0&", $subject);
                    return view('insumos.restaura',  compact('objetos','request'));
                break;
            case '1':                                                           //dd($request->vista);
                    $insumos = Insumo::on('mysql')
                     ->id($request->get('ide'))
                     ->bandera($request->get('equipoOpcion'))
                     ->codigo($request->get('codigo_proovedor'))
                     ->marca($request->get('marca'))
                     ->modelo($request->get('modelo'))
                     ->igual($request->get('bandera_insumo'))
                     ->igual($request->get('bandera_marca'))
                     ->diferente($request->get('bandera_equipo'))           //                     ->estado($request->get('estado'))
                     ->descripcion($request->get('descripcion'))            /*20160718 UPDATE*/
                     ->tipoEquipo($request->get('tipo_equipo'))
                     ->categoria1($request->get('categoria1'))
                     ->categoria2($request->get('categoria2'))
                     ->categoria3($request->get('categoria3'))                     //->groupBy($tipomodelo)
                     ->agrupar($request->get('agrupar'))
                     ->get();                                                //->paginate(5000);
                     foreach ($insumos as  $key => $insumo) {
                          $insumo->precios;
                         }                                                  //dd($insumos);
                        return response()->json([
                    "msg"=>"Success",
                    "insumos"=>$insumos->toArray()
                ],200);
            break;
            case '3':
            $objetos=Insumo::tipoEquipo($request->get('tipo_equipo'))
            ->bandera($request->get('bandera'))
            ->categoria3($request->get('categoria3'))                     //->groupBy($tipomodelo)
            ->groupBy('marca')
            ->get();
                return response()->json([
                    "msg"=>"Success",
                    "objetos"=>$objetos->toArray()
                ],200);
            break;
            case '4':
            $objetos=Insumo::marca($request->get('marca'))
            ->tipoEquipo($request->get('tipo_equipo'))
            ->categoria3($request->get('categoria3')) 
            ->bandera($request->get('bandera'))
            ->groupBy('modelo')
            ->get();
            //HelperUtil::log(['$objetos :'.count($objetos)=>$objetos->tipo_equipo]);
            //1HelperUtil::log(['$objetos :'.count($objetos)=>$objetos->marca]);
                return response()->json([
                    "msg"=>"Success",
                    "objetos"=>$objetos->toArray()
                ],200);
            break;
            default:                # code...
                $objetos=Insumo::on('mysql')
                    ->codigo($request->get('codigo_proovedor'))
                    ->estado($request->get('estado'))
                    ->categoria1($request->get('categoria1'))
                    ->marca($request->get('marca'))
                    ->modelo($request->get('modelo'))
                    ->descripcion($request->get('descripcion'))
                    ->paginate(15);                                                 //dd($objetos);//                $insumo = Insumo::find(1345);
            foreach ($objetos as  $k=>$obj){
//                $obj->precios;
//                $obj->precios=$obj->precios;
//                $obj->precios;
            }                                                                       //dd($request);            //dd($objetos);
                return view('insumos.index',  compact('objetos','request'));
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create(){                                                       //
        $marcas_proveedores=MarcaProveedor::all(['marca_representada','id']);
        $arr=array('0'=>'Seleccione opción');
        foreach ($marcas_proveedores as $value) {
            $id_marca=$value["id"];
            $marca=$value["marca_representada"];
            $id_marca=$id_marca.",".$marca;
            $marcas_representadas[$id_marca]=$value["marca_representada"];
        }
        $marcas_representadas=array_merge($arr,$marcas_representadas);
        return view('insumos.create',compact('marcas_representadas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *///    public function store(Request $request)//    public function store(Requests\InsumoStoreRequest $request)

    public function store(InsumoStoreRequest $request){                                //  dd($request->costo_moneda);
        $insumo = new Insumo();                                                        //  $arr_marca=$insumo->getArrMarca($request->marca);
        $insumo->bandera_insumo=$request->bandera_insumo;
        $insumo->codigo_proovedor=$request->codigo_proovedor;
        $insumo->tipo_equipo=$request->tipo_equipo;                                    //   $insumo->marca=$request->id_marca;
        $insumo->marca=$request->marca;                                                 //  $insumo->id_marca='1';                                                      //  $insumo->id_marca=$arr_marca[0];        //  $insumo->id_marca=$request->id_marca;                                       //  $insumo->id_marca=$arr_marca[0];
        $insumo->modelo=$request->modelo;
        $insumo->categoria1=$request->categoria1;                                       //$insumo->categoria2=$request->categoria2;        //$insumo->categoria3=$request->categoria3;
        $insumo->descripcion=$request->descripcion;                                     //$insumo->caracteristicas=$request->caracteristicas;        //$insumo->especificaciones=$request->especificaciones;
        $insumo->costos=$request->costos;
        $insumo->unidad_medida=$request->unidad_medida;
        $insumo->tipo_cambio=$request->tipo_cambio;
        $insumo->estado=$request->estado;
        $insumo->unidad_compra=$request->unidad_compra;
        $insumo->cantidad_unidad_compra=$request->cantidad_unidad_compra;        //$insumo->unidades_minimo_compra=$request->unidades_minimo_compra;        //$insumo->unidades_venta=$request->unidades_venta;
        $insumo->costo_moneda=$request->costo_moneda;
        $insumo->precio=$request->precio;
        if($request->multiprecios){           //multiprecio = 1
            $insumo->multiprecios=$request->multiprecios;
            $insumo->save();
           $precios_relacionados=$insumo->arrayPrecios($request->monto,$request->etiqueta);
           $insumo->precios()->saveMany($precios_relacionados);
        }else{                                                      //multiprecio = 0
            $insumo->multiprecios=0;
           $insumo->save();
        }
        $objetos=$insumo;                    //        return view('insumos.index',  compact('objetos'));
        return redirect('insumos');          //        return view('insumos.index',  compact('objetos'));
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){              //
        $insumo = Insumo::find($id);            //realizar consulta INSUMOS            //return $objeto;
        return view('insumos.delete',compact('insumo'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)    {                                          //
        $insumo = Insumo::findOrFail($id);
        $marcas_proveedores=MarcaProveedor::get();                          //        $marcas_representadas[0]="SELECCIONE MARCA";
        $insumo->precios();
        foreach ($marcas_proveedores as $key => $value){
            $id_marca=$value["id"];
            $marca=$value["marca_representada"];                            //            $id_marca=$id_marca;//            $id_marca=$id_marca.",".$marca;
            $marcas_representadas[$id_marca]=$value["marca_representada"];
        }                                                                   //realizar consulta INSUMOS
            return view('insumos.edit',compact('insumo','marcas_representadas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InsumoStoreRequest $request, $id)    {                                   //dd($request->costo_moneda);
        $insumo = Insumo::find($id);                                                                //        dd($insumo->precios);
            //dd($request->multiprecios);
            //dd($request->etiqueta);
            //dd($request->monto);
        $insumo->precios()->delete();                                                               //$arr_marca=$insumo->getArrMarca($request->marca);
        $insumo->bandera_insumo=$request->bandera_insumo;
        $insumo->codigo_proovedor=$request->codigo_proovedor;
        $insumo->tipo_equipo=$request->tipo_equipo;
        $insumo->marca=$request->marca;        //$insumo->marca=$arr_marca[1];        //$insumo->id_marca=$arr_marca[0];                                                          //        $insumo->id_marca=$request->id_marca;
        $insumo->modelo=$request->modelo;
        $insumo->descripcion=$request->descripcion;
        $insumo->caracteristicas=$request->caracteristicas;
        $insumo->especificaciones=$request->especificaciones;
        $insumo->costos=$request->costos;
        $insumo->unidad_medida=$request->unidad_medida;
        $insumo->tipo_cambio=$request->tipo_cambio;
        $insumo->estado=$request->estado;
        $insumo->unidad_compra=$request->unidad_compra;
        $insumo->cantidad_unidad_compra=$request->cantidad_unidad_compra;
        $insumo->unidades_minimo_compra=$request->unidades_minimo_compra;
        $insumo->unidades_venta=$request->unidades_venta;
        $insumo->costo_moneda=$request->costo_moneda;                                               //dd($insumo->estado);
        $insumo->precio=$request->precio;
        if($request->multiprecios){                                                                 //se eligio multiprecio
            $insumo->multiprecios=$request->multiprecios;
            $insumo->update();
            $precios_relacionados=$insumo->arrayPrecios($request->monto,$request->etiqueta);
            //dd($precios_relacionados);
            $insumo->precios()->saveMany($precios_relacionados);                                     //$insumo->multiprecios=1;
        }else{
            $insumo->multiprecios=0;
            $insumo->update();                                                  //        $objetos=$insumo;
        }
            return redirect()->action('InsumoController@index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){                                       //
        $objeto = Insumo::withTrashed()->find($id);                     //	$objeto->delete();
        if ($objeto->trashed()){//el elemento fue borrado y habra que habiltarlo
            $objeto->restore();
        }else{//BORRADO LOGICO DEL ELEMENTO.
            $objeto->delete();
            Session::flash('message','El registro fue eliminado');            //return redirect()->route('users');            //dd("Eliminado ".$id);
        }
		return redirect('insumos');
    }

    public function delet(Request $request, $id){//
        $insumo = Insumo::find($id);
         $insumo->update(array('estado'=> 0));
            return redirect('insumos');
    }

    public function stock(Request $request, $id){
        return view('insumos.stock', compact('id'));
    }

    public function calcularstock(Request $request){                    //calcula el punto d pedido de item, toma el promedio de ventas del insumo.
         Calc::promedio([1,2,3,4,5,6]);
        return response()->json(
                [
                    "msg"=>"Success",
                    "calculo"=>$insumos->toArray()
                ],200
                );
    }

    public function stocksave(Request $request,$id){
        $insumo = Insumo::find($id);
        $insumo->fill($request->all())->save();
        return response()->json(
                [
                    "msg"=>"Success",
                    "insumos"=>$insumos->toArray()
                ],200
                );
    }
}