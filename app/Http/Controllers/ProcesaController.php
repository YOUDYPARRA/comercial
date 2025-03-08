<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase  as Expendido;
use App\Plantilla;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProcesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *en request->id id de eequipo expendido EN CASO de que request->tb no exista y request->tb= tabla
     $id = id de plantilla
     * @return \Illuminate\Http\Response
     */
     private $expendido;
     private $plantilla;
     //private $arr_expendido=array('clase'=>'X','sucursal'=>auth()->user()->lugar_centro_costo,'organizacion'=>auth()->user()->org_name);
     public function __construct(){        
        $this->expendido= new Expendido;
        $this->plantilla= new Plantilla;

     }
    public function index()
    {}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id,Request $request)
    {
        //

        $pln='';
        if(isset($request->tb) && isset($request->i) ){//query por tabla

        }else if(isset($request->i) ){            
            $this->expendido=$this->expendido->findOrFail($request->i);
            $this->plantilla=$this->plantilla->findOrFail($id);
            //dd($id);
            //dd($this->expendido);
            //dd($this->plantilla);
            //dd($this->plantilla->plantilla[0]);
        //Inicio buscar por linea texto
                //dd($this->plantilla->plantilla);
            if($this->plantilla->plantilla[0]=='_' && $this->plantilla->plantilla[1]=='_'){
                $pln=$this->procTbl();
            }else{
                $pln=$this->procTxt();
            }
        //fin buscar por espacio en linea texto
        }
        return response()->json(
                [
                    "txt"=>$pln
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
    public function destroy($id)
    {
        //
    }
    protected function procTbl(){
        $ln=Null;
        //dd($this->plantilla->plantilla);
        $arr_tbl=explode("\n",$this->plantilla->plantilla);
        //dd($arr_tbl);
        $arr_head=explode('__',$arr_tbl[0]);
        $ln[]=(object)$this->hed($arr_head);
        //dd($ln);
        $arr_txt=explode('__',$arr_tbl[1]);
        foreach ($arr_txt as $key => $txt) {
            $i=$arr_head[$key];
            $i=snake_case($i);
            if(ends_with(trim($txt),'%') && starts_with(trim($txt),'%') ){
                $arr[$i]=$this->sust($txt).'..';
                //$arr[$key]=$this->sust($txt).'..';
                //$arr[]=$this->sust($txt).'..';
            }else{
                //$arr[$key]=$txt;
                //$arr[]=$txt;
                $arr[$i]=$txt;
            }
        }
        //dd($arr);        
        $ln[]=(object)$arr;

        return $ln;
    }
    protected function procTxt(){
        $ln=Null;
        $arr_n=[];
        //dd($this->plantilla->plantilla);
        $arr_n=explode("\n",$this->plantilla->plantilla);
        if(count($arr_n)>0){
            foreach ($arr_n as $key => $txt) {
                $arr_subln=explode(' ',$txt);
                if(count($arr_subln)>0){
                    foreach ($arr_subln as $key => $subtxt) {
                        $ln=$ln.' '.$this->sust($subtxt);
                    }
                    $ln=$ln."\n";
                }else{
                    $ln=$ln."\n".$this->sust($txt);
                }
            }

        }else{//no hay ningun tipo de salto de linea 
            echo 'no hay lineas';
            $arr_txt=explode(' ',$this->plantilla->plantilla);
            foreach ($arr_txt as $key => $txt) {
                $ln=$ln.' '.$this->sust($txt);            
            }
        }

        return $ln;

    }
    protected function hed($arr_txt){
        //dd($arr_txt);
        $arr=null;
        foreach ($arr_txt as $key => $h) {
            if (!empty($h) ){
                $c=$h;
                $h=snake_case($h);
                $arr[$h]= $c;
            }
        }
        return $arr;
    }
    protected function sust($txt){
        $ln=null;
        if( ends_with(trim($txt),'%') && starts_with(trim($txt),'%')  ){
                $arr_cmp=explode('.', $txt);
                if(count($arr_cmp)>1){//hay dos campos en el arreglo
                    $cm=$arr_cmp[1];
                    $cm=substr($cm, 0,-1);
                    //dd($cm);
                    $ln=$this->expendido->$cm;
                }else{//hay solo un campo en el arreglo
                    $cm=$arr_cmp[0];
                    $cm=substr($cm, 1,0);
                    $ln=$this->expendido->$cm;
                }
                //$ln=$ln.' '.$sust;
        }else if(  ends_with(trim($txt),',') && starts_with(trim($txt),'%')  ){//PARA CADENAS COMO %EJEMPLO.EJEMPLO%,

                $arr_cmp=explode('.', $txt);
                if(count($arr_cmp)>1){//hay dos campos en el arreglo
                    $cm=$arr_cmp[1];
                    $cm=substr($cm, 0,-2);
                    $ln=$this->expendido->$cm.',';
                }else{//hay solo un campo en el arreglo
                    $cm=$arr_cmp[0];
                    $cm=substr($cm, 1,0);
                    $ln=$this->expendido->$cm.',';
                }

        }else{//el txt no tiene % %
            $ln=$txt;
        }
        return $ln;
    }
}
