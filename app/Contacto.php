<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model {

	protected $table = 'zascust_proy_contact_v';

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
                $query->where('ad_user_id','like',$id);
            }  else 
            {
                $query->where('ad_user_id',$id);
            }
        }
    }

}
