<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tercero;									//use App\Prueba;//use App\Direccion;

class TerceroController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request){		//dd($request->get("nombre_fiscal"));
		$terceros = Tercero::on('pgsql')			 //->with('direcciones')			// ->with('cents')
			->isactive("Y")	
			->group($request->get('group_name'))	
			->name($request->get('nombre_fiscal'))
			->orgName($request->get('org_name'))
			->isbillto($request->get('isbillto'))
			->isshipto($request->get('isshipto'))
			->isvendor($request->get('is_vendor'))
			->iscustomer($request->get('iscustomer'))
			->id($request->get('c_bpartner_id'))						//->take(10)			 //->where('bpartner_name','like','%LUCIA%')			 //->where('org_name','=','SMH')			//->where('group_name','=','EMPLEADOS')			//->where('group_name','=','NACIONALES')			//->orwhere('group_name','LIKE','%'.'ACREEDORES'.'%')			//->orwhere('group_name','=','ACREEDORES DIVERSOS')
			->get();													//->paginate(15);
  return response()->json([
                    "msg"=>"Success",
                    "terceros"=>$terceros->toArray()
                ],200);													//return view('test.terceros',compact('terceros') );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//dd("SHOW");
		//
		$terceros = Tercero::on('pgsql')
		->id($id)
		->get();
		return response()->json(
                [
                    "msg"=>"Success",
                    "terceros"=>$terceros->toArray()
                ],200
                );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
