<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model {

	protected $table = 'zascust_proy_address_v';
    protected $connection = 'pgsql';

	public function tercero(){
		return $this->belongsTo('App\Tercero','c_bpartner_id', 'c_bpartner_id');
	}

	    public function scopeIdTercero($query, $id_tercero){
        if(trim($id_tercero)!="")
        {
            $arr=explode("*", $id_tercero);
            if(count($arr)>=2)
            {
                $id_tercero=  str_replace("*", "%", $id_tercero);
                $query->where('c_bpartner_id','like',$id_tercero);
            }  else 
            {
                $query->where('c_bpartner_id',$id_tercero);
            }
        }
    }

    
    public function scopeId($query, $id){
        if(trim($id)!="")
        {
            $arr=explode("*", $id);
            if(count($arr)>=2)
            {
                $id=  str_replace("*", "%", $id);
                $query->where('c_location_id','like',$id);
            }  else 
            {
                $query->where('c_location_id',$id);
            }
        }
    }
    public function scopeLocationId($query, $id){
        if(trim($id)!="")
        {
            $arr=explode("*", $id);
            if(count($arr)>=2)
            {
                $id=  str_replace("*", "%", $id);
                $query->where('c_location_id','like',$id);
            }  else 
            {
                $query->where('c_location_id',$id);
            }
        }
    }
    public function scopeName($query, $id){
        if(trim($id)!="")
        {
            $arr=explode("*", $id);
            if(count($arr)>=2)
            {
                $id=  str_replace("*", "%", $id);
                $query->where('name','ilike',$id);
            }  else 
            {
                $query->where('name',$id);
            }
        }
    }
    public function scopeFacturacion($query, $id){
        if(trim($id)!="")
        {
            $arr=explode("*", $id);
            if(count($arr)>=2)
            {
                $id=  str_replace("*", "%", $id);
                $query->where('isbillto','like',$id);
            }  else 
            {
                $query->where('isbillto',$id);
            }
        }
    }
    public function scopeEntrega($query, $id){
        if(trim($id)!="")
        {
            $arr=explode("*", $id);
            if(count($arr)>=2)
            {
                $id=  str_replace("*", "%", $id);
                $query->where('isshipto','like',$id);
            }  else 
            {
                $query->where('isshipto',$id);
            }
        }
    }
    public function scopeAddress1($query, $id){
        if(trim($id)!="")
        {
            $arr=explode("*", $id);
            if(count($arr)>=2)
            {
                $id=  str_replace("*", "%", $id);
                $query->where('address1','like',$id);
            }  else 
            {
                $query->where('address1',$id);
            }
        }
    }
    public function scopeIsactive($query, $id){
        if(trim($id)!="")
        {
            $arr=explode("*", $id);
            if(count($arr)>=2)
            {
                $id=  str_replace("*", "%", $id);
                $query->where('isactive','like',$id);
            }  else 
            {
                $query->where('isactive',$id);
            }
        }
    }

}# Direccion
