<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Tercero;
use App\Direccion;
use App\Comercial;


class TerceroComercialController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        //dd($request->get("isbillto"));
        $terceros = Tercero::on('pgsql')
             //->with('direcciones')
            // ->with('cents')
            ->group($request->get('group_name'))
            ->name($request->get('nombre_fiscal'))
            ->isbillto($request->get('isbillto'))
            ->isshipto($request->get('isshipto'))
            ->isvendor($request->get('is_vendor'))
            ->id($request->get('c_bpartner_id'))
            ->orderBy('bpartner_name')
            //->take(1)
             //->where('bpartner_name','like','%LUCIA%')
             //->where('org_name','=','SMH')
            //->where('group_name','=','EMPLEADOS')
            //->where('group_name','=','NACIONALES')
            //->orwhere('group_name','LIKE','%'.'ACREEDORES'.'%')
            //->orwhere('group_name','=','ACREEDORES DIVERSOS')
            ->get();
            $arr=[];
            foreach ($terceros as $tercero) {
                # code...
                $t=$tercero->direcciones()->where('isbillto','Y')
                ->orderBy('name')
                ->get();
                //INCIO CREAR NUEVO TERCERO
                $arr_tercero=$tercero->toArray();
                $arr_tmp=[];
                foreach ($arr_tercero as $key => $value) {
                    # code...
                    $arr_tmp[$key]=$value;
                }
                //FIN CREAR NUEVO TERCERO
                foreach ($t as $value) {
                    $arr_tmp['address1']=$value->address1;
                    $arr_tmp['address2']=$value->address2;
                    $arr_tmp['cp']=$value->cp;
                    $arr_tmp['city']=$value->city;
                    $arr_tmp['region_name']=$value->region_name;
                    $arr_tmp['country_name']=$value->country_name;
                    $arr_tmp['name']=$value->name;
                    $arr_tmp['c_bpartner_location_id']=$value->c_bpartner_location_id;
                    $arr_tmp['c_bpartner_id']=$value->c_bpartner_id;
                    $arr[]=$arr_tmp;
                }
            }
            return response()->json(
                [
                    "msg"=>"Success",
                    "terceros"=>$arr
                ],200
                );

//return view('test.terceros',compact('terceros') );
    }


}
