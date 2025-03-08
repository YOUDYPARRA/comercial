<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensualidad;
use App\Http\Requests;
use Carbon\Carbon;
use App\Helpers\HelperUtil;
use App\Http\Controllers\Controller;

class MensualidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {
     $anios = new Mensualidad;
        $anios=$anios->getAnios();
        return response()->json(
                [
                    "msg"=>"GUARDADO CORRECTAMENTE",
                    "objeto"=>$anios
                ],200
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->all());
        return view('mensualidades.create',compact('request'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request[0]['id_foraneo']);
        //HelperUtil::log(['GENERAR PAGOS'=>$request->all()]);
        Mensualidad::where('id_foraneo',$request[0]['id_foraneo'])->where('clase','MES')->delete();
        foreach ($request->all() as $value) {
            Mensualidad::create($value);
        }
        return response()->json(
                [
                    "msg"=>"GUARDADO CORRECTAMENTE"
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
    {
        //Qry por años y por mes;
        $objetos=$this->pagos($id);
        //dd($objetos);
        return response()->json(
                [
                    "msg"=>"GUARDADO CORRECTAMENTE",
                    "objeto"=>$objetos
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
   
    /*
    @denota alfo
    */
    public function pagos($id){
        $pagos = new Mensualidad;
        $objetos='';
        $meses=$pagos->getMeses();
        $anios=$pagos->getAnios();
        foreach ($anios as $key => $anio) {
            foreach ($meses as $key => $mes) {
                $obj=Mensualidad::
                    where('id_foraneo',$id)
                    ->where('clase','MES')
                    ->where('dato',$anio)//dato=año
                    ->where('vigencia',$mes)//vigencia=mes
                    ->first();
                if(!empty($obj)){
                    $objetos[]=$obj;
                }
                
            }
        }
        return $objetos;
    }
    public function destroy($id)
    {
        //
    }
}
