<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ContratoCompraVenta extends Model
{
                    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='contratos_compra_venta';
    protected $fillable=[
        'id_cotizacion',
        'numero_contrato_compra_venta',
        'leyenda_comprador',
        'identificacion',
        'numero',
        'numero_escritura_publica',
        'numero_poder',
        'notario',
        'notario1',
        'ciudad',
        'ciudad1',
        'aclaracion_dato_comprador',
        'leyenda_equipo',
        'acuerdo_equipo',
        'condicion_pago',
        'fecha',
        'mensualidad',
        'enganche',
        'financiamiento',
        'forma_pago',
        'aclaracion_pago',
        'obligacion_comprador',
        'condicion_entrega',
        'condicion_adecuacion',
        'condicion_clausula',
        'aval',
        'comprador_representante',
        'contraentrega',
        'dato',
        'fecha_primer_pago',
        'tipo_cambio',
        'anexo',
        'organizacion',
        'subtotal',
        'iva',
        'total',
        'moneda',
        'pagare',
        'garantia',
        'entrega',
	];
    public function cotizacion()
    {
        return $this->belongsTo('App\Cotizacion','id_cotizacion','id');
    }
/*    public function scopeNumeroCotizacion($query,$numero_cotizacion)
    {
        if(trim($numero_cotizacion)!="")
        {
            $arr=explode("*", $numero_cotizacion);
            if(count($arr)>=2)
            {
                $numero_cotizacion=  str_replace("*", "%", $numero_cotizacion);
                $query->where('numero_cotizacion','like',$numero_cotizacion);
            }  else 
            {
                $query->where('numero_cotizacion',$numero_cotizacion);
            }
        }
    }*/
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
    }	   public function scopeIdCotizacion($query,$id_cotizacion)
    {
        if(trim($id_cotizacion)!="")
        {
            $arr=explode("*", $id_cotizacion);
            if(count($arr)>=2)
            {
                $id_cotizacion=  str_replace("*", "%", $id_cotizacion);
                $query->where('id_cotizacion','like',$id_cotizacion);
            }  else 
            {
                $query->where('id_cotizacion',$id_cotizacion);
            }
        }
    }	   public function scopeNumeroContratoCompraVenta($query,$numero_contrato_compra_venta)
    {
        if(trim($numero_contrato_compra_venta)!="")
        {
            $arr=explode("*", $numero_contrato_compra_venta);
            if(count($arr)>=2)
            {
                $numero_contrato_compra_venta=  str_replace("*", "%", $numero_contrato_compra_venta);
                $query->where('numero_contrato_compra_venta','like',$numero_contrato_compra_venta);
            }  else 
            {
                $query->where('numero_contrato_compra_venta',$numero_contrato_compra_venta);
            }
        }
    }	   public function scopeLeyendaComprador($query,$leyenda_comprador)
    {
        if(trim($leyenda_comprador)!="")
        {
            $arr=explode("*", $leyenda_comprador);
            if(count($arr)>=2)
            {
                $leyenda_comprador=  str_replace("*", "%", $leyenda_comprador);
                $query->where('leyenda_comprador','like',$leyenda_comprador);
            }  else 
            {
                $query->where('leyenda_comprador',$leyenda_comprador);
            }
        }
    }	   public function scopeIdentificacion($query,$identificacion)
    {
        if(trim($identificacion)!="")
        {
            $arr=explode("*", $identificacion);
            if(count($arr)>=2)
            {
                $identificacion=  str_replace("*", "%", $identificacion);
                $query->where('identificacion','like',$identificacion);
            }  else 
            {
                $query->where('identificacion',$identificacion);
            }
        }
    }	   public function scopeNumero($query,$numero)
    {
        if(trim($numero)!="")
        {
            $arr=explode("*", $numero);
            if(count($arr)>=2)
            {
                $numero=  str_replace("*", "%", $numero);
                $query->where('numero','like',$numero);
            }  else 
            {
                $query->where('numero',$numero);
            }
        }
    }	   public function scopeNumeroEscrituraPublica($query,$numero_escritura_publica)
    {
        if(trim($numero_escritura_publica)!="")
        {
            $arr=explode("*", $numero_escritura_publica);
            if(count($arr)>=2)
            {
                $numero_escritura_publica=  str_replace("*", "%", $numero_escritura_publica);
                $query->where('numero_escritura_publica','like',$numero_escritura_publica);
            }  else 
            {
                $query->where('numero_escritura_publica',$numero_escritura_publica);
            }
        }
    }	   public function scopeNumeroPoder($query,$numero_poder)
    {
        if(trim($numero_poder)!="")
        {
            $arr=explode("*", $numero_poder);
            if(count($arr)>=2)
            {
                $numero_poder=  str_replace("*", "%", $numero_poder);
                $query->where('numero_poder','like',$numero_poder);
            }  else 
            {
                $query->where('numero_poder',$numero_poder);
            }
        }
    }	   public function scopeNotario($query,$notario)
    {
        if(trim($notario)!="")
        {
            $arr=explode("*", $notario);
            if(count($arr)>=2)
            {
                $notario=  str_replace("*", "%", $notario);
                $query->where('notario','like',$notario);
            }  else 
            {
                $query->where('notario',$notario);
            }
        }
    }	   public function scopeCiudad($query,$ciudad)
    {
        if(trim($ciudad)!="")
        {
            $arr=explode("*", $ciudad);
            if(count($arr)>=2)
            {
                $ciudad=  str_replace("*", "%", $ciudad);
                $query->where('ciudad','like',$ciudad);
            }  else 
            {
                $query->where('ciudad',$ciudad);
            }
        }
    }	   public function scopeAclaracionDatoComprador($query,$aclaracion_dato_comprador)
    {
        if(trim($aclaracion_dato_comprador)!="")
        {
            $arr=explode("*", $aclaracion_dato_comprador);
            if(count($arr)>=2)
            {
                $aclaracion_dato_comprador=  str_replace("*", "%", $aclaracion_dato_comprador);
                $query->where('aclaracion_dato_comprador','like',$aclaracion_dato_comprador);
            }  else 
            {
                $query->where('aclaracion_dato_comprador',$aclaracion_dato_comprador);
            }
        }
    }	   public function scopeLeyendaEquipo($query,$leyenda_equipo)
    {
        if(trim($leyenda_equipo)!="")
        {
            $arr=explode("*", $leyenda_equipo);
            if(count($arr)>=2)
            {
                $leyenda_equipo=  str_replace("*", "%", $leyenda_equipo);
                $query->where('leyenda_equipo','like',$leyenda_equipo);
            }  else 
            {
                $query->where('leyenda_equipo',$leyenda_equipo);
            }
        }
    }	   public function scopeAcuerdoEquipo($query,$acuerdo_equipo)
    {
        if(trim($acuerdo_equipo)!="")
        {
            $arr=explode("*", $acuerdo_equipo);
            if(count($arr)>=2)
            {
                $acuerdo_equipo=  str_replace("*", "%", $acuerdo_equipo);
                $query->where('acuerdo_equipo','like',$acuerdo_equipo);
            }  else 
            {
                $query->where('acuerdo_equipo',$acuerdo_equipo);
            }
        }
    }	   public function scopeCondicionPago($query,$condicion_pago)
    {
        if(trim($condicion_pago)!="")
        {
            $arr=explode("*", $condicion_pago);
            if(count($arr)>=2)
            {
                $condicion_pago=  str_replace("*", "%", $condicion_pago);
                $query->where('condicion_pago','like',$condicion_pago);
            }  else 
            {
                $query->where('condicion_pago',$condicion_pago);
            }
        }
    }	   
      public function scopeEnganche($query,$enganche)
    {
        if(trim($enganche)!="")
        {
            $arr=explode("*", $enganche);
            if(count($arr)>=2)
            {
                $enganche=  str_replace("*", "%", $enganche);
                $query->where('enganche','like',$enganche);
            }  else 
            {
                $query->where('enganche',$enganche);
            }
        }
    }	   public function scopeFinanciamiento($query,$financiamiento)
    {
        if(trim($financiamiento)!="")
        {
            $arr=explode("*", $financiamiento);
            if(count($arr)>=2)
            {
                $financiamiento=  str_replace("*", "%", $financiamiento);
                $query->where('financiamiento','like',$financiamiento);
            }  else 
            {
                $query->where('financiamiento',$financiamiento);
            }
        }
    }	   public function scopeFormaPago($query,$forma_pago)
    {
        if(trim($forma_pago)!="")
        {
            $arr=explode("*", $forma_pago);
            if(count($arr)>=2)
            {
                $forma_pago=  str_replace("*", "%", $forma_pago);
                $query->where('forma_pago','like',$forma_pago);
            }  else 
            {
                $query->where('forma_pago',$forma_pago);
            }
        }
    }	   public function scopeAclaraciónPago($query,$aclaración_pago)
    {
        if(trim($aclaración_pago)!="")
        {
            $arr=explode("*", $aclaración_pago);
            if(count($arr)>=2)
            {
                $aclaración_pago=  str_replace("*", "%", $aclaración_pago);
                $query->where('aclaración_pago','like',$aclaración_pago);
            }  else 
            {
                $query->where('aclaración_pago',$aclaración_pago);
            }
        }
    }	   public function scopeObligacionComprador($query,$obligacion_comprador)
    {
        if(trim($obligacion_comprador)!="")
        {
            $arr=explode("*", $obligacion_comprador);
            if(count($arr)>=2)
            {
                $obligacion_comprador=  str_replace("*", "%", $obligacion_comprador);
                $query->where('obligacion_comprador','like',$obligacion_comprador);
            }  else 
            {
                $query->where('obligacion_comprador',$obligacion_comprador);
            }
        }
    }	   public function scopeCondicionEntrega($query,$condicion_entrega)
    {
        if(trim($condicion_entrega)!="")
        {
            $arr=explode("*", $condicion_entrega);
            if(count($arr)>=2)
            {
                $condicion_entrega=  str_replace("*", "%", $condicion_entrega);
                $query->where('condicion_entrega','like',$condicion_entrega);
            }  else 
            {
                $query->where('condicion_entrega',$condicion_entrega);
            }
        }
    }	   public function scopeCondicionAdecuacion($query,$condicion_adecuacion)
    {
        if(trim($condicion_adecuacion)!="")
        {
            $arr=explode("*", $condicion_adecuacion);
            if(count($arr)>=2)
            {
                $condicion_adecuacion=  str_replace("*", "%", $condicion_adecuacion);
                $query->where('condicion_adecuacion','like',$condicion_adecuacion);
            }  else 
            {
                $query->where('condicion_adecuacion',$condicion_adecuacion);
            }
        }
    }	   public function scopeCondicionClausula($query,$condicion_clausula)
    {
        if(trim($condicion_clausula)!="")
        {
            $arr=explode("*", $condicion_clausula);
            if(count($arr)>=2)
            {
                $condicion_clausula=  str_replace("*", "%", $condicion_clausula);
                $query->where('condicion_clausula','like',$condicion_clausula);
            }  else 
            {
                $query->where('condicion_clausula',$condicion_clausula);
            }
        }
    }	   public function scopeFecha($query,$fecha)
    {
        if(trim($fecha)!="")
        {
            $arr=explode("*", $fecha);
            if(count($arr)>=2)
            {
                $fecha=  str_replace("*", "%", $fecha);
                $query->where('fecha','like',$fecha);
            }  else 
            {
                $query->where('fecha',$fecha);
            }
        }
    }	   public function scopeAval($query,$aval)
    {
        if(trim($aval)!="")
        {
            $arr=explode("*", $aval);
            if(count($arr)>=2)
            {
                $aval=  str_replace("*", "%", $aval);
                $query->where('aval','like',$aval);
            }  else 
            {
                $query->where('aval',$aval);
            }
        }
    }	   public function scopeCompradorRepresentante($query,$comprador_representante)
    {
        if(trim($comprador_representante)!="")
        {
            $arr=explode("*", $comprador_representante);
            if(count($arr)>=2)
            {
                $comprador_representante=  str_replace("*", "%", $comprador_representante);
                $query->where('comprador_representante','like',$comprador_representante);
            }  else 
            {
                $query->where('comprador_representante',$comprador_representante);
            }
        }
    }
    public function scopeOrganizacion($query,$comprador_representante)
    {
        if(trim($comprador_representante)!="")
        {
            $arr=explode("*", $comprador_representante);
            if(count($arr)>=2)
            {
                $comprador_representante=  str_replace("*", "%", $comprador_representante);
                $query->where('organizacion','like',$comprador_representante);
            }  else 
            {
                $query->where('organizacion',$comprador_representante);
            }
        }
    }
    public function digitalizaciones(){
        return $this->hasMany('App\Digitalizacion','id_foraneo','id');
    }	
}
