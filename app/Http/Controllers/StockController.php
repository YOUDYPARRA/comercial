<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Stock;

class StockController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request) 
	{
		//dd($request->all());
		$stock = Stock::on('pgsql')
		->id($request->get('m_product_id'))
		->almacen($request->get('almacen'))
		//->nombre($request->get('todoText'))
		->get();

		/*
		//print_r($stock);
		foreach ($stock as $value) {
			echo "->".$value->primer_qty;
			$value->primer_qty=$value->primer_qty+$value->primer_qty;
			$value->segundo_qty=$value->segundo_qty+$value->segundo_qty;
		}*/
		return response()->json(
                [
                    "msg"=>"Success",
                    "stock"=>$stock->toArray()
                ],200
                );
		//dd($equipos);
	//return view('test.contactos',compact('contactos'));
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
