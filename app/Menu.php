<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Menu extends Model
{
    use SoftDeletes;
    protected $table='menus';
    //protected $touches = ['recursos'];
    protected $fillable=[
            'menu'
	];
        public function permisos() {
            return $this->hasMany('App\Permiso', 'id_menu', 'id');
        }
        public function recursos() {
            return $this->hasMany('App\Recurso', 'id_menu', 'id');
        }
    public function scopeMenu($query,$menu)
    {
        if(trim($menu)!="")
        {
            $arr=explode("*", $menu);
            if(count($arr)>=2)
            {
                $menu=  str_replace("*", "%", $menu);
                $query->where('menu','like',$menu);
            }  else 
            {
                $query->where('menu',$menu);
            }
        }
    }	
    	
}
