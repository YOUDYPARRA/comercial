<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EquipoStockQueryRequest;
use Illuminate\Http\Request;
use App\Equipo;
use App\Helpers\HelperUtil;

class EquipoController extends Controller {

	private $codigo_proovedor_temp=0;
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
//HelperUtil::log([$request->almacen]);
		$equipo=array('primer_qty'=>0);
		$equipos=array();
		if(!isset($request->codigo_proovedor)){
			$codigo_proovedor='1';
		}else{
			$almacen=$request->almacen;
			$codigo_proovedor=$request->codigo_proovedor;
		}
		$equips = Equipo::codigo($codigo_proovedor)->get();
		//HelperUtil::log(['eL EQUIPO ES: '=>$equips]);
		foreach ($equips as $equip) {
			//$this->codigo_proovedor_temp=$equip->value;
			$equipo['m_producto_id']=$equip->m_product_id;
			$equipo['codigo_proovedor']=$equip->value;
			$equipo['descripcion']=$equip->description;
			if(isset($request->almacen) && (!empty($request->almacen)) ){
//HelperUtil::log(['LA QUERY TIENE ALMACEN'=>$request->almacen]);
				$sp=0;
				$ss=0;
				foreach ($equip->re_stock->where('warehouse_name',$almacen) as $st) {
					$sp=$sp+$st->primary_qty;
					$ss=$ss+$st->secondary_qty;
					$equipo['primer_qty']=$sp;
					$equipo['segundo_qty']=$ss;
					$equipo['primer_nombre_uom']=$st->primary_uom_name;
					$equipo['segundo_nombre_uom']=$st->secondary_uom_name;
					$equipo['almacen']=$st->warehouse_name;
					$equipo['nombre_org']=$st->org_name;
				}
				$equipos[]=(object)$equipo;
			}else{
				$sp=0;
				$ss=0;
				foreach ($equip->re_stock as $st) {
						# code...
					$sp=$sp+$st->primary_qty;
					$ss=$ss+$st->secondary_qty;
					$equipo['m_producto_id']=$equip->m_product_id;
					$equipo['codigo_proovedor']=$equip->value;
					$equipo['descripcion']=$equip->description;
					$equipo['almacen']=$st->warehouse_name;
					$equipo['primer_nombre_uom']=$st->primary_uom_name;
					$equipo['primer_qty']=$sp;
					$equipo['segundo_qty']=$ss;
					$equipo['segundo_nombre_uom']=$st->secondary_uom_name;
					$equipo['nombre_org']=$st->org_name;
//HelperUtil::log(['SIN ALMACEN: '=>$equipo]);
					$equipos[]=(object)$equipo;
				}
			}
		}
		//dd($equipos);
		if($request->wantsJson()){
	  		return response()->json(
	            [
	                "msg"=>"Success",
	                "equipos"=>$equipos
	            ],200
	            );

		}/*else{
			$objetos=(object)$equipos;
			return view('equipos.index',compact('objetos'));
		}*/
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
	public function show(Request $request,$id)
	{
		//dd('entre al show');
				$equipo=array('primer_qty'=>0);
				$equipos=array();
				$almacen=$request->almacen;
				$codigo_proovedor=$request->codigo_proovedor;

				if(empty($codigo_proovedor)){
					$codigo_proovedor='';
				}else{
					$equips = Equipo::codigo($codigo_proovedor)->get();
					//HelperUtil::log(['$equips'=>$equips]);
					foreach ($equips as $equip) {
						$equipo['m_producto_id']=$equip->m_product_id;
						$equipo['codigo_proovedor']=$equip->value;
						$equipo['descripcion']=$equip->description;
						if(isset($request->almacen) && (!empty($request->almacen)) ){
							//HelperUtil::log(['$almacen'=>$almacen]);
							$sp=0;
							$ss=0;
							foreach ($equip->re_stock->where('warehouse_name',$almacen) as $st) {
								$sp=$sp+$st->primary_qty;
								$ss=$ss+$st->secondary_qty;
								$equipo['primer_qty']=$sp;
								$equipo['segundo_qty']=$ss;
								$equipo['primer_nombre_uom']=$st->primary_uom_name;
								$equipo['segundo_nombre_uom']=$st->secondary_uom_name;
								$equipo['almacen']=$st->warehouse_name;
								$equipo['nombre_org']=$st->org_name;
							}
							$equipos[]=(object)$equipo;
						}else{//viene almacen vacio
							$sp=0;
							$ss=0;
							foreach ($equip->re_stock as $st) {
									# code...
								$sp=$sp+$st->primary_qty;
								$ss=$ss+$st->secondary_qty;
								$equipo['m_producto_id']=$equip->m_product_id;
								$equipo['codigo_proovedor']=$equip->value;
								$equipo['descripcion']=$equip->description;
								$equipo['almacen']=$st->warehouse_name;
								$equipo['primer_nombre_uom']=$st->primary_uom_name;
								$equipo['primer_qty']=$sp;
								$equipo['segundo_qty']=$ss;
								$equipo['segundo_nombre_uom']=$st->secondary_uom_name;
								$equipo['nombre_org']=$st->org_name;
			//HelperUtil::log(['SIN ALMACEN: '=>$equipo]);
								$equipos[]=(object)$equipo;
							}
						}
					}

				}//fin si esta vacio el qyuery
		$objetos=(object)$equipos;
		return view('equipos.index',compact('objetos'));
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
