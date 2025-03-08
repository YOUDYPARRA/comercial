<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tercero extends Model {

	protected $table = 'zascust_proy_bpartner_v';
    protected $connection = 'pgsql';

	public function direcciones(){
		return $this->hasMany('App\Direccion','c_bpartner_id', 'c_bpartner_id');
	}

	public function cents(){
		return $this->hasMany('App\CentrosCosto','ad_org_id', 'org_id');
	}
    
    public function scopeName($query, $nombre_fiscal){
        if(trim($nombre_fiscal)!=""){
            $arr=explode("*", $nombre_fiscal);
            if(count($arr)>=2){
                $nombre_fiscal=  str_replace("*", "%", $nombre_fiscal);
                $query->where('bpartner_name','ilike',$nombre_fiscal);
            }else{
                $query->where('bpartner_name',$nombre_fiscal);
            }
        }
    }   
    
    public function scopeOrgName($query, $org_name){
        if(trim($org_name)!=""){
            $arr=explode("*", $org_name);
            if(count($arr)>=2){
                $org_name=  str_replace("*", "%", $org_name);
                $query->where('org_name','like',$org_name);
            }else{
                $query->where('org_name',$org_name);
            }
        }
    }	
    
    public function scopeId($query, $id){
        if(trim($id)!=""){
            $arr=explode("*", $id);
            if(count($arr)>=2){
                $id=  str_replace("*", "%", $id);
                $query->where('c_bpartner_id','like',$id);
            }else{
                $query->where('c_bpartner_id',$id);
            }
        }
    }

    public function scopeGroup($query, $group){                             //ADD 10-02-2016 EMS
        if(trim($group)!=""){
            if($group=="NACIONALES"){
                $query->where('group_name','=','NACIONALES');
            }else{
                $query->where('group_name','=','EMPLEADOS');
            }
        }
    }

    public function scopeRfc($query, $id){
        if(trim($id)!=""){
            $arr=explode("*", $id);
            if(count($arr)>=2){
                $id=  str_replace("*", "%", $id);
                $query->where('taxid','like',$id);
            }else{
                $query->where('taxid',$id);
            }
        }
    }

    public function scopeIsshipto($query, $isshipto){
        if(trim($isshipto)!=""){
            $arr=explode("*", $isshipto);
            if(count($arr)>=2){
                $isshipto=  str_replace("*", "%", $isshipto);
                $query->where('isshipto','like',$isshipto);
            }else{
                $query->where('isshipto',$isshipto);
            }
        }
    }
    public function scopeIsbillto($query, $isbillto){
        if(trim($isbillto)!=""){
            $arr=explode("*", $isbillto);
            if(count($arr)>=2){
                $isbillto=  str_replace("*", "%", $isbillto);
                $query->where('isbillto','like',$isbillto);
            }else{
                $query->where('isbillto',$isbillto);
            }
        }
    }

    public function scopeIsvendor($query, $isVendor){
        if(trim($isVendor)!=""){
            $arr=explode("*", $isVendor);
            if(count($arr)>=2){
                $isVendor=  str_replace("*", "%", $isVendor);
                $query->where('isvendor','like',$isVendor);
            }else{
                $query->where('isvendor',$isVendor);
            }
        }
    }

    public function scopeIsactive($query, $isVendor){
        if(trim($isVendor)!=""){
            $arr=explode("*", $isVendor);
            if(count($arr)>=2){
                $isVendor=  str_replace("*", "%", $isVendor);
                $query->where('isactive','like',$isVendor);
            } else{
                $query->where('isactive',$isVendor);
            }
        }
    }

    public function scopeIscustomer($query, $isVendor){
        if(trim($isVendor)!=""){
            $arr=explode("*", $isVendor);
            if(count($arr)>=2){
                $isVendor=  str_replace("*", "%", $isVendor);
                $query->where('iscustomer','like',$isVendor);
            } else{
                $query->where('iscustomer',$isVendor);
            }
        }
    }


}# Tercero
