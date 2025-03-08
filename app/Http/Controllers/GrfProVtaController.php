<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProyectoVenta;
use App\Http\Requests;
use App\Helpers\HelperUtil;
use App\Http\Controllers\Controller;

class GrfProVtaController extends Controller
{

  protected $objeto;
  private $arr_objeto='';

  public function __construct(ProyectoVenta $proyecto_venta){
    $this->arr_objeto['clase']='PRO';
    $this->objeto=$proyecto_venta;
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->all());
          switch ($request->i) {
            case '1':
              $objetos=$this->camposTabla();
              return response()->json(
                [
                    "msg"=>"Success",
                    "objetos"=>$objetos
                ],200
              );
              break;

              case '2':
            $this->buscarJson($request);
            $objetos=$this->objeto->buscar($this->arr_objeto+$request->all())
            ->select('autor','dato',\DB::raw('sum(numero_exterior)as monto,count(*) as total'))
            ->groupBy('dato')
            ->get();
            return response()->json(
                [
                    "msg"=>"Success",
                    "objetos"=>$objetos
                ],200
              );
              break;

              case '3':
           // $this->buscarJson($request);
            $objetos=$this->objeto//->buscar($this->arr_objeto+$request->all())
            ->select('autor','dato',\DB::raw('sum(numero_exterior)as monto,count(*) as total'))
            ->where('clase','PRO')
            ->where('created_at','LIKE','%'.$request->anio.'%')
            ->groupBy('dato')
            ->get();
            return response()->json(
                [
                    "msg"=>"Success",
                    "objetos"=>$objetos
                ],200
              );
              break;

            default:
              $objetos=ProyectoVenta::buscar($this->arr_objeto+$request->all())->get(); //dd($objetos);
              return response()->json(
                [
                    "msg"=>"Success",
                    "objetos"=>$objetos->toArray()
                ],200
              );
              
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
        return view('proyecto_venta.grafico');
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
    private function camposTabla(){
      //obtener los campos que conforman la tabla
      //realizar el order by por cada campo encontrado
      $this->objeto->first();
      $variante=null;
      //HelperUtil::log(['$this->objeto: '=>$this->objeto]);
      $objeto = new ProyectoVenta;
      foreach ($this->objeto['fillable'] as $value) {
        $variantes= $objeto
        ->select($value)
        ->where('clase','PRO')
        ->groupBy($value)->get();
        $valores=null;
        foreach ($variantes as $key=>$v) {
            $valores[]=$v->$value;
        }
        $variante[$value]=$valores;
      }
      return $variante;
      //HelperUtil::log(['$variante: '=>$variante]);
    }

     private function buscarJson($request){
        //obtener el campo dato
        //verificar si el campo cumple la condicion buscada
        if(!empty($request->mes_venta) ){
            $this->arr_objeto['dato']='*"mes_venta":"'.$request->mes_venta.'"*';
        }
        if(!empty($request->compromiso) ){
            $this->arr_objeto['dato']='*"compromiso":"'.$request->compromiso.'"*';
        }
    }
}
