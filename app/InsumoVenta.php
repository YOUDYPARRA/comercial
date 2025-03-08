<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsumoVenta extends Model
{
                    //
    protected $table='insumos_venta';
    protected $fillable=[
           'id_orden_venta', 
          'id_pack',
          'id_insumo',
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
          'unidad_venta',
          'costo_moneda'
        	];

  
}
