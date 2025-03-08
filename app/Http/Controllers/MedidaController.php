<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Medida;

class MedidaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		//dd($request);
		

		$ok=\DB::connection('pgsql')->statement("select zascust_ifz_ins_uom('D7546DB55DBD45199B4D96618B6B6DCF','ED','ed','TESTy19','prueba8',2,2,'Y') ");
		//dd($ok);
		while ($data=pg_fetch_array($ok)) {
			print_r($data);
		}

/*
		$ok=\DB::connection('pgsql')->statement("select zascust_ifz_upd_uom('8A6122C233E4495CBDB4B35D62F5355E','D7546DB55DBD45199B4D96618B6B6DCF','KK','kk','TESTUPD','pruebaupd',2,2,'V')");
		dd($ok);
*/

		$ok=\DB::connection('pgsql')->statement("select zascust_ifz_del_uom('49B535BCC1C44DEAAA9841DB2E03BDD4','D7546DB55DBD45199B4D96618B6B6DCF')");
		dd($ok);
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
	public function store(Request $request)//P_uom_id=5B2BF79ED2B14ADAA3D6361AF6523107,
	//p_user_id=D7546DB55DBD45199B4D96618B6B6DCF,p_codigo_edi=ok,p_symbol=E,p_name=TEST,p_description=ok,p_std_precision=2,p_costing_precision=2,p_uom_type=V
	//p_user_id=D7546DB55DBD45199B4D96618B6B6DCF&p_codigo_edi=ok&p_symbol=E&p_name=TEST&p_description=ok&p_std_precision=2&p_costing_precision=2&p_uom_type=V
	//D7546DB55DBD45199B4D96618B6B6DCF&ok&E&TEST&ok&2&2&V
		{	
		/*dd($request); 			//DB::getPdo()->exec
		 $ok =Medida::on('pgsql')
		 ->create($request->all());*/
		 //Medida::on('pgsql')->save($request->all());//execute($request->all());

		 /*Medida::on('pgsql')->select('zascust_ifz_ins_uom(D7546DB55DBD45199B4D96618B6B6DCF,ok,E,TEST,ok,2,2,V)')->get();*/
		 //$ok->save();
		 //$objeto->update($request->all());
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
