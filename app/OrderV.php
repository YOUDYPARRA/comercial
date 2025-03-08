<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderV extends Model
{
    //
	protected $connection = 'pgsql';
	protected $table='zascust_proy_order_v';
	protected $fillable=[
		'ad_org_id',
	   	'c_order_id',
	   	'documentno',
	   	'issotrx',
	   	'c_bpartner_id',
	   	'c_bpartner_location_id',
	   	'dateordered',
	   	'datepromised',
	   	'em_zascust_po_shippingby',
	   	'c_currency_id',
	   	'm_warehouse_id',
	   	'docstatus'
	];

}
