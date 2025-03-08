<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model {



	protected $table = 'zascust_proy_product_v';
//    protected $connection = 'pgpro';
	protected $connection = 'pgsql';

	public function scopeCodigo($query, $nombre_equipo){
        if(trim($nombre_equipo)!="")
        {
            /*$arr=explode("*", $nombre_equipo);
            if(count($arr)>=2)
            {
                $nombre_equipo=  str_replace("*", "%", $nombre_equipo);
                $query->where('value','like',$nombre_equipo);
            }  else
            {*/
                $query->where('value',$nombre_equipo);
            //}
        }
    }

    public function re_stock(){
        return $this->hasMany('App\Stock','m_product_id','m_product_id');
    }

}
