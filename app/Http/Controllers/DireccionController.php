<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Direccion;

class DireccionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$direcciones = Direccion::on('pgsql')
		->id($request->get('c_location_id'))
		->idTercero($request->get('id_tercero'))
		->name($request->get('name'))
		->facturacion($request->get('isbillto'))
		->entrega($request->get('isshipto'))
		->isactive("Y")
		->orderBy('name')
		//->take(5)
		->get();
		return response()->json(
                [
                    "msg"=>"Success",
                    "direcciones"=>$direcciones->toArray()
                ],200
                );

		//dd($prueba);
	//return view('test.direcciones',compact('direcciones') );
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
		//
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
