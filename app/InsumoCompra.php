<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsumoCompra extends Model
{
                    //
    protected $table='insumos_compras';
    protected $fillable=[
           'id_insumo', 
           'id_compra', 
          'id_pack',
          'tipo_equipo',
          'marca',
          'modelo',
          'caracteristicas',
          'especificaciones',
          'cantidad',
          'codigo_proovedor',//catalogo
          'descripcion',
          'costos',
          'precio',
          'total',
          'tipo_cambio',
          'bandera_insumo',
          'unidad_compra',
          'costo_moneda'
        	];

  
}
