<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Precio;
class Insumo extends Model{
                    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='insumos';
    protected $fillable=[
    'bandera_insumo',
    'codigo_proovedor',
    'tipo_equipo',
    'marca',
    'modelo',
    'descripcion',
    'caracteristicas',
    'especificaciones',
    'precio',
    'costos',
    'unidad_medida',//de venta
    'tipo_cambio',//tipo de cambio para la venta
    'unidad_compra',
    'estado',
    'categoria1',
    'categoria2',
    'categoria3',
    'id_marca',
    'multiprecios',
    'costo_moneda',//tipo de cambio para la compra
    'cantidad_unidad_compra',
    'unidades_minimo_compra',//unidades que surte el proveedor considerando que la unidad referida es aglomerado de X cantidad_unidad_compra
    'unidades_venta',//unidades que se surten al cliente
    'aviso',
    'seguridad',
    ];


    public function paquetes(){
        return $this->belongsTo('App\Paquete', 'id','id');
    }
    public function precios() {
        return $this->hasMany('App\Precio','id_insumo','id');
    }
    public function arrayPrecios($array_precios,$array_etiqueta) {
//            dd($array_precios);
        foreach ($array_precios as $k=> $precio){
            $arr[]=new Precio(['etiqueta'=>$array_etiqueta[$k],'monto'=>$precio]);
        }
        return $arr;
    }
    public function getArrMarca($SlcMarca){
        $arr_marca=explode(",", $SlcMarca);
        return $arr_marca;
//        $request->id_marca=$arr_marca[0];
//        $SlcMarca=$arr_marca[1];
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
    public function scopeBandera($query,$bandera_insumo)
    {
        if(trim($bandera_insumo)!="")
        {
            $arr=explode("*", $bandera_insumo);
            if(count($arr)>=2)
            {
                $bandera_insumo=  str_replace("*", "%", $bandera_insumo);
                $query->where('bandera_insumo','like',$bandera_insumo);
            }  else
            {
                $query->where('bandera_insumo',$bandera_insumo);
            }
        }
    }
    public function scopeCodigo($query,$codigo_proovedor)
    {
        if(trim($codigo_proovedor)!="")
        {
            $arr=explode("*", $codigo_proovedor);
            if(count($arr)>=2)
            {
                $codigo_proovedor=  str_replace("*", "%", $codigo_proovedor);
                $query->where('codigo_proovedor','like',$codigo_proovedor);
            }  else
            {
                $query->where('codigo_proovedor',$codigo_proovedor);
            }
        }
    }
    public function scopeTipoEquipo($query,$tipo_equipo)
    {
        if(trim($tipo_equipo)!="")
        {
            $arr=explode("*", $tipo_equipo);
            if(count($arr)>=2)
            {
                $tipo_equipo=  str_replace("*", "%", $tipo_equipo);
                $query->where('tipo_equipo','like',$tipo_equipo);
            }  else
            {
                $query->where('tipo_equipo',$tipo_equipo);
            }
        }
    }
    public function scopeMarca($query,$marca)
    {
        if(trim($marca)!="")
        {
            $arr=explode("*", $marca);
            if(count($arr)>=2)
            {
                $marca=  str_replace("*", "%", $marca);
                $query->where('marca','like',$marca);
            }  else
            {
                $query->where('marca',$marca);
            }
        }
    }
    public function scopeModelo($query,$modelo)
    {
        if(trim($modelo)!="")
        {
            $arr=explode("*", $modelo);
            if(count($arr)>=2)
            {
                $modelo=  str_replace("*", "%", $modelo);
                $query->where('modelo','like',$modelo);
            }  else
            {
                $query->where('modelo',$modelo);
            }
        }
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
            }  else
            {
                $query->where('descripcion',$descripcion);
            }
        }
    }
    public function scopeCaracteristicas($query,$caracteristicas)
    {
        if(trim($caracteristicas)!="")
        {
            $arr=explode("*", $caracteristicas);
            if(count($arr)>=2)
            {
                $caracteristicas=  str_replace("*", "%", $caracteristicas);
                $query->where('caracteristicas','like',$caracteristicas);
            }  else
            {
                $query->where('caracteristicas',$caracteristicas);
            }
        }
    }
    public function scopeEspecificaciones($query,$especificaciones)
    {
        if(trim($especificaciones)!="")
        {
            $arr=explode("*", $especificaciones);
            if(count($arr)>=2)
            {
                $especificaciones=  str_replace("*", "%", $especificaciones);
                $query->where('especificaciones','like',$especificaciones);
            }  else
            {
                $query->where('especificaciones',$especificaciones);
            }
        }
    }
    public function scopePrecio($query,$precio)
    {
        if(trim($precio)!="")
        {
            $arr=explode("*", $precio);
            if(count($arr)>=2)
            {
                $precio=  str_replace("*", "%", $precio);
                $query->where('precio','like',$precio);
            }  else
            {
                $query->where('precio',$precio);
            }
        }
    }
    public function scopeCostos($query,$costos)
    {
        if(trim($costos)!="")
        {
            $arr=explode("*", $costos);
            if(count($arr)>=2)
            {
                $costos=  str_replace("*", "%", $costos);
                $query->where('costos','like',$costos);
            }  else
            {
                $query->where('costos',$costos);
            }
        }
    }
    public function scopeUnidad($query,$unidad_medida)
    {
        if(trim($unidad_medida)!="")
        {
            $arr=explode("*", $unidad_medida);
            if(count($arr)>=2)
            {
                $unidad_medida=  str_replace("*", "%", $unidad_medida);
                $query->where('unidad_medida','like',$unidad_medida);
            }  else
            {
                $query->where('unidad_medida',$unidad_medida);
            }
        }
    }
    public function scopeTipoCambio($query,$tipo_cambio)
    {
        if(trim($tipo_cambio)!="")
        {
            $arr=explode("*", $tipo_cambio);
            if(count($arr)>=2)
            {
                $tipo_cambio=  str_replace("*", "%", $tipo_cambio);
                $query->where('tipo_cambio','like',$tipo_cambio);
            }  else
            {
                $query->where('tipo_cambio',$tipo_cambio);
            }
        }
    }

    public function scopeEstado($query,$estado)
    {
//        if(trim($estado)!="")
//        {
                $query->where('estado',$estado);

//        }
    }

    public function scopeDiferente($query,$estado)
    {
        if(trim($estado)!="")
        {
                $query->where('bandera_insumo','!=',$estado);

        }
    }
    public function scopeIgual($query,$estado)
    {
        if(trim($estado)!="")
        {
                $query->where('bandera_insumo',$estado);
        }
    }

    public function scopeAgrupar($query,$id_pertenece)
    {
        if(trim($id_pertenece)!="")
        {
                $query->groupBy($id_pertenece);
        }
    }
/*    public function scopeEstado($query,$estado)
    {
        if(trim($estado)!="")
        {
            $arr=explode("*", $estado);
            if(count($arr)>=2)
            {
                $estado=  str_replace("*", "%", $estado);
                $query->where('estado','like',$estado);
            }  else
            {
                $query->where('estado',$estado);
            }
        }
    }*/
    public function scopeCategoria1($query,$categoria1)
    {
        if(trim($categoria1)!="")
        {
            $arr=explode("*", $categoria1);
            if(count($arr)>=2)
            {
                $categoria1=  str_replace("*", "%", $categoria1);
                $query->where('categoria1','like',$categoria1);
            }  else
            {
                $query->where('categoria1',$categoria1);
            }
        }
    }
    public function scopeCategoria2($query,$categoria2)
    {
        if(trim($categoria2)!="")
        {
            $arr=explode("*", $categoria2);
            if(count($arr)>=2)
            {
                $categoria2=  str_replace("*", "%", $categoria2);
                $query->where('categoria2','like',$categoria2);
            }  else
            {
                $query->where('categoria2',$categoria2);
            }
        }
    }
    public function scopeCategoria3($query,$categoria3)
    {
        if(trim($categoria3)!="")
        {
            $arr=explode("*", $categoria3);
            if(count($arr)>=2)
            {
                $categoria3=  str_replace("*", "%", $categoria3);
                $query->where('categoria3','like',$categoria3);
            }  else
            {
                $query->where('categoria3',$categoria3);
            }
        }
    }

    public function scopeCantidadUnidadCompra($query,$categoria3)
    {
        if(trim($categoria3)!="")
        {
            $arr=explode("*", $categoria3);
            if(count($arr)>=2)
            {
                $categoria3=  str_replace("*", "%", $categoria3);
                $query->where('cantidad_unidad_compra','like',$categoria3);
            }  else
            {
                $query->where('cantidad_unidad_compra',$categoria3);
            }
        }
    }
}
