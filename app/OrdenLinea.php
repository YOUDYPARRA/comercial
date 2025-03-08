<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
//use App\Services\PgManager;

class OrdenLinea extends Model
{
    //
    protected $pgconn;
    
     public function __construct(){
         //$this->pgqry= new PgManager;
     }
    protected $connection = 'pgsql';
    protected $table = 'zasapi_orderline';
    protected $fillable=[
		'c_order_id',//obligatorio
		'M_Product_ID',//obligatorio
		'qtyordered',//obligatorio
		'PriceActual',
		'C_Tax_ID',//obligatorio
		'PriceList',//obligatorio
		'QuantityOrder',
		'Discount',
		'M_Warehouse_Rule_ID',
		'Description',
		'C_cost_center_id',
		'm_product_category_id',
    ];

    public function guardar(){
    	//dd($this->M_Product_ID);
    	try{
    		$rsl=DB::connection($this->connection)->select(DB::raw("select $this->table (
		    		'$this->c_order_id',
					'$this->M_Product_ID',
					'$this->qtyordered',
					'$this->PriceActual',
					'$this->C_Tax_ID',
					'$this->PriceList',
					'$this->QuantityOrder',
					'$this->Discount',
					'$this->M_Warehouse_Rule_ID',
					'$this->Description',
					'$this->C_cost_center_id',
					'$this->m_product_category_id'
					)"));

    	}catch(Exception $e){
    		echo 'HAY ERROR AQUI';
    		return 'Eror '.$e;
    	}
        return $rsl;
    }
}
