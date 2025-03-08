<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model {

	protected $table = 'zascust_proy_stock_v';
    protected $connection = 'pgsql';
//    protected $connection = 'pgpro';
    protected $fillable=[
    'm_product_id',
    'm_warehouse_id',
    'warehouse_name',
    'primary_qty',
    'secundary_qty',
    'org_name',
    ];


	public function scopeId($query, $id_equipo){
        if(trim($id_equipo)!="")
        {
            $arr=explode("*", $id_equipo);
            if(count($arr)>=2)
            {
                $id_equipo=  str_replace("*", "%", $id_equipo);
                $query->where('m_product_id','like',$id_equipo);
            }  else
            {
                $query->where('m_product_id',$id_equipo);
            }
        }
    }
    public function scopeOrganizacion($query, $id_equipo){
        if(trim($id_equipo)!="")
        {
            $arr=explode("*", $id_equipo);
            if(count($arr)>=2)
            {
                $id_equipo=  str_replace("*", "%", $id_equipo);
                $query->where('org_name','like',$id_equipo);
            }  else
            {
                $query->where('org_name',$id_equipo);
            }
        }
    }

    public function scopeAlmacen($query, $id_equipo){
        if(trim($id_equipo)!="")
        {
            $arr=explode("*", $id_equipo);
            if(count($arr)>=2)
            {
                $id_equipo=  str_replace("*", "%", $id_equipo);
                $query->where('warehouse_name','like',$id_equipo);
            }  else
            {
                $query->where('warehouse_name',$id_equipo);
            }
        }
    }

}
