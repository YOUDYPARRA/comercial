<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    protected $table = 'precios';
    protected $fillable=[
                            'id_insumo',
                            'etiqueta',
                            'monto'
                        ];
    public function insumo() {
        return $this->belongsTo('App\Insumo');

                }
}
