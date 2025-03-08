<?php namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    
    use SoftDeletes;
    protected $table='paquetes';
    protected $dates = ['deleted_at'];
    protected $fillable=[
                        'id_equipo',
                        'id_refaccion',
                        'id_pack',
                        'bandera_insumo',
                        'codigo_proovedor',
                        'cantidad',
                        'usuario',
                        'descripcion',
                        'precio',
                        'costo',
                        'tipo_equipo',
                        'marca',
                        'modelo',
                        'caracteristica',
                        'especificacion',
                        'tipo_cambio',
                        'estado',
                        ];

    public function insumos(){
    return $this->hasMany('App\Insumo','id', 'id_equipo'); //'foreign_key', 'local_key'
    }
    public function refacciones(){
    return $this->hasMany('App\Insumo','id', 'id_refaccion'); //'foreign_key', 'local_key'
    }

    public function scopeDescripcion($query,$descripcion)
    {
        if(trim($descripcion)!="")
        {
            $arr=explode("*", $descripcion);
            if(count($arr)>=2)
            {
                $descripcion=  str_replace("*", "%", $descripcion);
                $query->where('descripcion','like',$descripcion);
            }  else{
                 $query->where('descripcion',$descripcion);
            }
        }
    }

    public function scopeCodigo($query,$id){
        if(trim($id)!=""){
            $arr=explode("*", $id);
            if(count($arr)>=2){
                $id=  str_replace("*", "%", $id);
                $query->where('codigo_proovedor','like',$id);
            }  else{
                $query->where('codigo_proovedor',$id);
            }
        }
    }

    public function scopeIdpack($query,$id)
    {
        if(trim($id)!="")
        {
            $arr=explode("*", $id);
            if(count($arr)>=2)
            {
                $id=  str_replace("*", "%", $id);
                $query->where('id_pack','like',$id);
            }  else 
            {
                $query->where('id_pack',$id);
            }
        }
    }

    public function scopeBandera($query,$bandera_insumo)
    {   //var_dump($bandera_insumo);
        if(trim($bandera_insumo)!="")
        {
            $arr=explode("*", $bandera_insumo);
            if(count($arr)>=2){
                $bandera_insumo=  str_replace("*", "%", $bandera_insumo);
                $query->where('bandera_insumo','like',$bandera_insumo);
            }  else{
                $query->where('bandera_insumo',$bandera_insumo);
            }
        }
    }   

    public function scopeTipoequipo($query,$tipo_equipo){//        var_dump($tipo_equipo);
        if(trim($tipo_equipo)!="")        {
            $arr=explode("*", $tipo_equipo);
            if(count($arr)>=2)            {
                $tipo_equipo=  str_replace("*", "%", $tipo_equipo);
                $query->where('tipo_equipo','like',$tipo_equipo);
            }  else{
                $query->where('tipo_equipo',$tipo_equipo);
            }
        }
    } 

    public function scopeMarca($query,$marca){//        var_dump($marca);
        if(trim($marca)!=""){
            $arr=explode("*", $marca);
            if(count($arr)>=2){
                $marca=  str_replace("*", "%", $marca);
                $query->where('marca','like',$marca);
            }  else{
                $query->where('marca',$marca);
            }
        }
    }

    public function scopeModelo($query,$modelo){        //var_dump($modelo);
        if(trim($modelo)!=""){
            $arr=explode("*", $modelo);
            if(count($arr)>=2){
                $modelo=  str_replace("*", "%", $modelo);
                $query->where('modelo','like',$modelo);
            }  else{
                $query->where('modelo',$modelo);
            }
        }
    } 

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
    }	   

    public function scopeIdEquipo($query,$id_equipo)
    {
        if(trim($id_equipo)!="")
        {
            $arr=explode("*", $id_equipo);
            if(count($arr)>=2)
            {
                $id_equipo=  str_replace("*", "%", $id_equipo);
                $query->where('id_equipo','like',$id_equipo);
            }  else 
            {
                $query->where('id_equipo',$id_equipo);
            }
        }
    }	   

    public function scopeIdRefaccion($query,$id_refaccion)
    {
        //var_dump($id_refaccion);
        if(trim($id_refaccion)!="")
        {
            $arr=explode("*", $id_refaccion);
            if(count($arr)>=2)
            {
                $id_refaccion=  str_replace("*", "%", $id_refaccion);
                $query->where('id_refaccion','like',$id_refaccion);
            }  else 
            {
                $query->where('id_refaccion',$id_refaccion);
            }
        }
    }	   


}
