<?php

                namespace App;

                use Illuminate\Database\Eloquent\Model;
                use Illuminate\Database\Eloquent\SoftDeletes;

                class CatalogoCalculo extends Model
                {
                    //
                use SoftDeletes;
                protected $dates = ['deleted_at'];
                protected $table='catalogos_calculo';
                protected $fillable=[
                'modelo',
                'flete',
                'fraccion_arancelaria',
                'igi_ige',
                'dta',
                'h_agente_aduanal',
                'porcentaje_impuesto_importacion',
                'iva',
                'costo_hora',
                'tiempo_instalacion_total',
                'tiempo_viaje_instalacion',
                'costo_visita_proyectos',
                'costo_instalacion',
                'costo_parte',
                'gasto_importacion_partes',
                'mano_obra_garantia_hrs',
                'mano_obra_garantia_usd',
                'impuesto_importacion_refacciones',
                'costos_garantia',
                'total_costo_instalacion_garantia',
                'tiempo_preventivo',
                'preventivo_anual',
                'ingeniero_instalacion',
                'tiempo_instalacion',
                'usuario',
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
    }   public function scopeActualizadoEl($query,$actualizado_el)
    {
        if(trim($actualizado_el)!="")
        {
            $arr=explode("*", $actualizado_el);
            if(count($arr)>=2)
            {
                $update_at=  str_replace("*", "%", $actualizado_el);
                $query->where('id','like',$actualizado_el);
            }  else 
            {
                $query->where('update_at',$actualizado_el);
            }
        }
    }	   public function scopeModelo($query,$modelo)
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
    }	   public function scopeFlete($query,$flete)
    {
        if(trim($flete)!="")
        {
            $arr=explode("*", $flete);
            if(count($arr)>=2)
            {
                $flete=  str_replace("*", "%", $flete);
                $query->where('flete','like',$flete);
            }  else 
            {
                $query->where('flete',$flete);
            }
        }
    }	   public function scopeFraccionArancelaria($query,$fraccion_arancelaria)
    {
        if(trim($fraccion_arancelaria)!="")
        {
            $arr=explode("*", $fraccion_arancelaria);
            if(count($arr)>=2)
            {
                $fraccion_arancelaria=  str_replace("*", "%", $fraccion_arancelaria);
                $query->where('fraccion_arancelaria','like',$fraccion_arancelaria);
            }  else 
            {
                $query->where('fraccion_arancelaria',$fraccion_arancelaria);
            }
        }
    }	   public function scopeIgiIge($query,$igi_ige)
    {
        if(trim($igi_ige)!="")
        {
            $arr=explode("*", $igi_ige);
            if(count($arr)>=2)
            {
                $igi_ige=  str_replace("*", "%", $igi_ige);
                $query->where('igi_ige','like',$igi_ige);
            }  else 
            {
                $query->where('igi_ige',$igi_ige);
            }
        }
    }	   public function scopeDta($query,$dta)
    {
        if(trim($dta)!="")
        {
            $arr=explode("*", $dta);
            if(count($arr)>=2)
            {
                $dta=  str_replace("*", "%", $dta);
                $query->where('dta','like',$dta);
            }  else 
            {
                $query->where('dta',$dta);
            }
        }
    }	   public function scopeHAgenteAduanal($query,$h_agente_aduanal)
    {
        if(trim($h_agente_aduanal)!="")
        {
            $arr=explode("*", $h_agente_aduanal);
            if(count($arr)>=2)
            {
                $h_agente_aduanal=  str_replace("*", "%", $h_agente_aduanal);
                $query->where('h_agente_aduanal','like',$h_agente_aduanal);
            }  else 
            {
                $query->where('h_agente_aduanal',$h_agente_aduanal);
            }
        }
    }	   public function scopePorcentajeImpuestoImportacion($query,$porcentaje_impuesto_importacion)
    {
        if(trim($porcentaje_impuesto_importacion)!="")
        {
            $arr=explode("*", $porcentaje_impuesto_importacion);
            if(count($arr)>=2)
            {
                $porcentaje_impuesto_importacion=  str_replace("*", "%", $porcentaje_impuesto_importacion);
                $query->where('porcentaje_impuesto_importacion','like',$porcentaje_impuesto_importacion);
            }  else 
            {
                $query->where('porcentaje_impuesto_importacion',$porcentaje_impuesto_importacion);
            }
        }
    }	   public function scopeIva($query,$iva)
    {
        if(trim($iva)!="")
        {
            $arr=explode("*", $iva);
            if(count($arr)>=2)
            {
                $iva=  str_replace("*", "%", $iva);
                $query->where('iva','like',$iva);
            }  else 
            {
                $query->where('iva',$iva);
            }
        }
    }	   public function scopeCostoHora($query,$costo_hora)
    {
        if(trim($costo_hora)!="")
        {
            $arr=explode("*", $costo_hora);
            if(count($arr)>=2)
            {
                $costo_hora=  str_replace("*", "%", $costo_hora);
                $query->where('costo_hora','like',$costo_hora);
            }  else 
            {
                $query->where('costo_hora',$costo_hora);
            }
        }
    }	   public function scopeTiempoInstalacionTotal($query,$tiempo_instalacion_total)
    {
        if(trim($tiempo_instalacion_total)!="")
        {
            $arr=explode("*", $tiempo_instalacion_total);
            if(count($arr)>=2)
            {
                $tiempo_instalacion_total=  str_replace("*", "%", $tiempo_instalacion_total);
                $query->where('tiempo_instalacion_total','like',$tiempo_instalacion_total);
            }  else 
            {
                $query->where('tiempo_instalacion_total',$tiempo_instalacion_total);
            }
        }
    }	   public function scopeTiempoViajeInstalacion($query,$tiempo_viaje_instalacion)
    {
        if(trim($tiempo_viaje_instalacion)!="")
        {
            $arr=explode("*", $tiempo_viaje_instalacion);
            if(count($arr)>=2)
            {
                $tiempo_viaje_instalacion=  str_replace("*", "%", $tiempo_viaje_instalacion);
                $query->where('tiempo_viaje_instalacion','like',$tiempo_viaje_instalacion);
            }  else 
            {
                $query->where('tiempo_viaje_instalacion',$tiempo_viaje_instalacion);
            }
        }
    }	   public function scopeCostoVisitaProyectos($query,$costo_visita_proyectos)
    {
        if(trim($costo_visita_proyectos)!="")
        {
            $arr=explode("*", $costo_visita_proyectos);
            if(count($arr)>=2)
            {
                $costo_visita_proyectos=  str_replace("*", "%", $costo_visita_proyectos);
                $query->where('costo_visita_proyectos','like',$costo_visita_proyectos);
            }  else 
            {
                $query->where('costo_visita_proyectos',$costo_visita_proyectos);
            }
        }
    }	   public function scopeCostoInstalacion($query,$costo_instalacion)
    {
        if(trim($costo_instalacion)!="")
        {
            $arr=explode("*", $costo_instalacion);
            if(count($arr)>=2)
            {
                $costo_instalacion=  str_replace("*", "%", $costo_instalacion);
                $query->where('costo_instalacion','like',$costo_instalacion);
            }  else 
            {
                $query->where('costo_instalacion',$costo_instalacion);
            }
        }
    }	   public function scopeCostoParte($query,$costo_parte)
    {
        if(trim($costo_parte)!="")
        {
            $arr=explode("*", $costo_parte);
            if(count($arr)>=2)
            {
                $costo_parte=  str_replace("*", "%", $costo_parte);
                $query->where('costo_parte','like',$costo_parte);
            }  else 
            {
                $query->where('costo_parte',$costo_parte);
            }
        }
    }	   public function scopeGastoImportacionPartes($query,$gasto_importacion_partes)
    {
        if(trim($gasto_importacion_partes)!="")
        {
            $arr=explode("*", $gasto_importacion_partes);
            if(count($arr)>=2)
            {
                $gasto_importacion_partes=  str_replace("*", "%", $gasto_importacion_partes);
                $query->where('gasto_importacion_partes','like',$gasto_importacion_partes);
            }  else 
            {
                $query->where('gasto_importacion_partes',$gasto_importacion_partes);
            }
        }
    }	   public function scopeManoObraGarantiaHrs($query,$mano_obra_garantia_hrs)
    {
        if(trim($mano_obra_garantia_hrs)!="")
        {
            $arr=explode("*", $mano_obra_garantia_hrs);
            if(count($arr)>=2)
            {
                $mano_obra_garantia_hrs=  str_replace("*", "%", $mano_obra_garantia_hrs);
                $query->where('mano_obra_garantia_hrs','like',$mano_obra_garantia_hrs);
            }  else 
            {
                $query->where('mano_obra_garantia_hrs',$mano_obra_garantia_hrs);
            }
        }
    }	   public function scopeManoObraGarantiaUsd($query,$mano_obra_garantia_usd)
    {
        if(trim($mano_obra_garantia_usd)!="")
        {
            $arr=explode("*", $mano_obra_garantia_usd);
            if(count($arr)>=2)
            {
                $mano_obra_garantia_usd=  str_replace("*", "%", $mano_obra_garantia_usd);
                $query->where('mano_obra_garantia_usd','like',$mano_obra_garantia_usd);
            }  else 
            {
                $query->where('mano_obra_garantia_usd',$mano_obra_garantia_usd);
            }
        }
    }	   public function scopeImpuestoImportacionRefacciones($query,$impuesto_importacion_refacciones)
    {
        if(trim($impuesto_importacion_refacciones)!="")
        {
            $arr=explode("*", $impuesto_importacion_refacciones);
            if(count($arr)>=2)
            {
                $impuesto_importacion_refacciones=  str_replace("*", "%", $impuesto_importacion_refacciones);
                $query->where('impuesto_importacion_refacciones','like',$impuesto_importacion_refacciones);
            }  else 
            {
                $query->where('impuesto_importacion_refacciones',$impuesto_importacion_refacciones);
            }
        }
    }	   public function scopeCostosGarantia($query,$costos_garantia)
    {
        if(trim($costos_garantia)!="")
        {
            $arr=explode("*", $costos_garantia);
            if(count($arr)>=2)
            {
                $costos_garantia=  str_replace("*", "%", $costos_garantia);
                $query->where('costos_garantia','like',$costos_garantia);
            }  else 
            {
                $query->where('costos_garantia',$costos_garantia);
            }
        }
    }	   public function scopeTotalCostoInstalacionGarantia($query,$total_costo_instalacion_garantia)
    {
        if(trim($total_costo_instalacion_garantia)!="")
        {
            $arr=explode("*", $total_costo_instalacion_garantia);
            if(count($arr)>=2)
            {
                $total_costo_instalacion_garantia=  str_replace("*", "%", $total_costo_instalacion_garantia);
                $query->where('total_costo_instalacion_garantia','like',$total_costo_instalacion_garantia);
            }  else 
            {
                $query->where('total_costo_instalacion_garantia',$total_costo_instalacion_garantia);
            }
        }
    }	   public function scopeTiempoPreventivo($query,$tiempo_preventivo)
    {
        if(trim($tiempo_preventivo)!="")
        {
            $arr=explode("*", $tiempo_preventivo);
            if(count($arr)>=2)
            {
                $tiempo_preventivo=  str_replace("*", "%", $tiempo_preventivo);
                $query->where('tiempo_preventivo','like',$tiempo_preventivo);
            }  else 
            {
                $query->where('tiempo_preventivo',$tiempo_preventivo);
            }
        }
    }	   public function scopePreventivoAnual($query,$preventivo_anual)
    {
        if(trim($preventivo_anual)!="")
        {
            $arr=explode("*", $preventivo_anual);
            if(count($arr)>=2)
            {
                $preventivo_anual=  str_replace("*", "%", $preventivo_anual);
                $query->where('preventivo_anual','like',$preventivo_anual);
            }  else 
            {
                $query->where('preventivo_anual',$preventivo_anual);
            }
        }
    }	   public function scopeIngenieroInstalacion($query,$ingeniero_instalacion)
    {
        if(trim($ingeniero_instalacion)!="")
        {
            $arr=explode("*", $ingeniero_instalacion);
            if(count($arr)>=2)
            {
                $ingeniero_instalacion=  str_replace("*", "%", $ingeniero_instalacion);
                $query->where('ingeniero_instalacion','like',$ingeniero_instalacion);
            }  else 
            {
                $query->where('ingeniero_instalacion',$ingeniero_instalacion);
            }
        }
    }	   public function scopeTiempoInstalacion($query,$tiempo_instalacion)
    {
        if(trim($tiempo_instalacion)!="")
        {
            $arr=explode("*", $tiempo_instalacion);
            if(count($arr)>=2)
            {
                $tiempo_instalacion=  str_replace("*", "%", $tiempo_instalacion);
                $query->where('tiempo_instalacion','like',$tiempo_instalacion);
            }  else 
            {
                $query->where('tiempo_instalacion',$tiempo_instalacion);
            }
        }
    }	   public function scopeUsuario($query,$usuario)
    {
        if(trim($usuario)!="")
        {
            $arr=explode("*", $usuario);
            if(count($arr)>=2)
            {
                $usuario=  str_replace("*", "%", $usuario);
                $query->where('usuario','like',$usuario);
            }  else 
            {
                $query->where('usuario',$usuario);
            }
        }
    }	
}
