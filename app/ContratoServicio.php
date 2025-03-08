<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratoServicio extends Model
{
    //
    protected $table='contrato';
    protected $primaryKey  = 'pk_orden_servicio';
    public $timestamps = false;
    protected $fillable=[
    'nocontratointerno'
    ];
    
}
