<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Producto extends Model
{
    use SoftDeletes;
    protected $table='productos';//representa el equipo
    protected $fillable=[
            'nombre'
	];
        
    public function scopeNombre($query,$nombre)
    {
        if(trim($nombre)!="")
        {
            $arr=explode("*", $nombre);
            if(count($arr)>=2)
            {
                $nombre=  str_replace("*", "%", $nombre);
                $query->where('nombre','like',$nombre);
            }  else 
            {
                $query->where('nombre',$nombre);
            }
        }
    }	
    	
}
