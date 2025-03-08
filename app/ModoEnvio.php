<?php
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
                use Illuminate\Database\Eloquent\Model;

    class ModoEnvio extends Model
    {
                    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
                    protected $table='modos_envios';
    protected $fillable=[
    'tipo_envio',
	];
   public function scopeId($query,$id)
    {
        if(trim($id)!="")
        {
            $arr=explode("*", $id);
            if(count($arr)>=2)
            {
                $id=  str_replace("*", "%", $id);
                $query->where('id','like',$id);
            }  else 
            {
                $query->where('id',$id);
            }
        }
    }	   public function scopeTipoEnvio($query,$tipo_envio)
    {
        if(trim($tipo_envio)!="")
        {
            $arr=explode("*", $tipo_envio);
            if(count($arr)>=2)
            {
                $tipo_envio=  str_replace("*", "%", $tipo_envio);
                $query->where('tipo_envio','like',$tipo_envio);
            }  else 
            {
                $query->where('tipo_envio',$tipo_envio);
            }
        }
    }	
}
