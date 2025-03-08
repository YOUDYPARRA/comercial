<?php
namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

                class AgenteAduanal extends Model
                {
                    //
use SoftDeletes;
protected $dates = ['deleted_at'];
protected $table='agentes_aduanales';
protected $fillable=[
    'agente_aduanal',
    'ubicacion',
    'telefono',
    'fax',
    'email',
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
    }	   public function scopeAgenteAduanal($query,$agente_aduanal)
    {
        if(trim($agente_aduanal)!="")
        {
            $arr=explode("*", $agente_aduanal);
            if(count($arr)>=2)
            {
                $agente_aduanal=  str_replace("*", "%", $agente_aduanal);
                $query->where('agente_aduanal','like',$agente_aduanal);
            }  else 
            {
                $query->where('agente_aduanal',$agente_aduanal);
            }
        }
    }	   public function scopeTelefono($query,$telefono)
    {
        if(trim($telefono)!="")
        {
            $arr=explode("*", $telefono);
            if(count($arr)>=2)
            {
                $telefono=  str_replace("*", "%", $telefono);
                $query->where('telefono','like',$telefono);
            }  else 
            {
                $query->where('telefono',$telefono);
            }
        }
    }	   public function scopeFax($query,$fax)
    {
        if(trim($fax)!="")
        {
            $arr=explode("*", $fax);
            if(count($arr)>=2)
            {
                $fax=  str_replace("*", "%", $fax);
                $query->where('fax','like',$fax);
            }  else 
            {
                $query->where('fax',$fax);
            }
        }
    }	   public function scopeEmail($query,$email)
    {
        if(trim($email)!="")
        {
            $arr=explode("*", $email);
            if(count($arr)>=2)
            {
                $email=  str_replace("*", "%", $email);
                $query->where('email','like',$email);
            }  else 
            {
                $query->where('email',$email);
            }
        }
    }	
}
