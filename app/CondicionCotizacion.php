<?php

                namespace App;

                use Illuminate\Database\Eloquent\Model;

class CondicionCotizacion extends Model
{
                    //
         
/*protected $fillable=[
	
'precio',
'tiempo_entrega',
'condicion_pago',
'guia_mecanica_salvaguarda_instalacion',
'garantia',
'capacitacion',
'validez',
'reporte',
'anticipo',

	];*/
    public function scopeCondiciones()
    {
        return array(
'precio'=>'En dólares norteamericanos, DDP en Merida. Todos los pagos se realizaran en Dólares o Moneda Nacional, al tipo de cambio vigente del día del pago publicado en el Diario Oficial de la Federación.',
'tiempo_entrega'=>'Máximo 45 días. Estos tiempos están sujetos a confirmación contra la recepción del contrato firmado y anticipo correspondientes por parte de Suministro para uso Médico y Hospitalario, S.A. de C.V. Los equipos serán almacenados en nuestras instalaciones por periodo máximo de 30 días libres de cargo; después de ese plazo todos los gastos de almacenamiento correrán por parte del comprador.',
'condicion_pago'=>'Opción No. 1: Contado Comercial: Anticipo de 50% y resto contra entrega de cajas.
Opción No. 2: Financiamiento a través de SMH: En base a las necesidades del cliente, se anexa esquema de pagos. Sujeto a aprobación de crédito. Se deberá anexar solicitud de crédito de SMH.
Opción No. 3: Financiamiento a través de De Lage Landen: En base a las necesidades del cliente, se anexa esquema de arrendamiento (puro o financiero). De igual forma se anexa solicitud de crédito (Persona física o moral). Sujeto a aprobación de crédito. El expediente con Solicitud de Crédito y Documentos se entregaran a José Luis Ayala o Kenia Martínez, el vendedor es responsable de dar seguimiento hasta completar la información requerida.
Opción No. 4: Financiamiento a través de alguna otra institución financiera: En caso de que el cliente prefiera alguna otra fuente de financiamiento, acudiremos a la institución a solicitar su solicitud de crédito y listado de documentos que esta requiera para su presentación.',
'guia_mecanica_salvaguarda_instalacion'=>'Nuestro departamento de Proyectos les contactará (en caso de que aplique) para la elaboración de las guías mecánicas correspondientes, así como para coordinar la instalación del equipo. Estos se realizan sin cargo para el comprador. Estosprecios no incluyen adecuaciones físicas así como remodelación de las áreas.',
'garantia'=>'Consistirá en 12 meses a partir de la fecha de instalación o 15 meses a partir de que SMH pone a disposición del cliente el equipo, lo que ocurra primero. Esta garantía cubre defectos de fabricación en partes y mano de obra. La misma pierde validez si el equipo recibe intervención por personal no autorizado por SMH.',
'capacitacion'=>'El precio cotizado incluye un curso de capacitación en sus instalaciones para la aplicación de procedimientos y buen manejo de los equipos.',
'validez'=>'LOS PRECIOS Y CONDICIONES ESTABLECIDOS EN LA PRESENTE COTIZACION ESTARAN VIGENTES POR TREINTA DIAS CALENDARIO A PARTIR DE LA FECHA DE ESTE DOCUMENTO. VENCIDO DICHO PLAZO DEBERA SOLICITARSE CONFIRMACION.',
'anticipo'=>'100%',
'mensaje_atencion'=>'CON RELACION A SU SOLICITUD NOS PERMITIMOS PRESENTAR LA SIGUIENTE INFORMACIÓN.',
'tiempo_entrega_consumibles'=>'1-2 DIAS HABILES A PARTIR DE LA FECHA EN QUE SE REALICE SU PEDIDO Y SE CONFIRME SU PAGO. (ENVIO POR ESTAFETA). (EN UN PEDIDO MAXIMO DE 20 PIEZAS).',
'forma_pago_consumibles'=>'DEPOSITO O TRANSFERENCIA DEL 100% A FAVOR DE SUMINISTRO PARA USO MEDICO Y HOSPITALARIO, S.A. DE C.V.
30 DIAS DE CREDITO.',
'vigencia_consumibles'=>'ESTA COTIZACION TIENE VIGENCIA DE 15 (QUINCE) DIAS A PARTIR DE LA FECHA EN QUE LA RECIBA.
ESTA COTIZACION TIENE VIGENCIA HASTA NUEVO AVISO POR ESCRITO.'
            );
        //return "EL PRECIO TOTAL ES: DOS PUNTO$$$$";
    }	
   /* public function scopeTiempoEntrega()
    {
        return "LOS TIEMPS DE ENTREGA";
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
    }	   public function scopeGuiaMecanicaSalvaguardaInstalacion($query,$guia_mecanica_salvaguarda_instalacion)
    {
        if(trim($guia_mecanica_salvaguarda_instalacion)!="")
        {
            $arr=explode("*", $guia_mecanica_salvaguarda_instalacion);
            if(count($arr)>=2)
            {
                $guia_mecanica_salvaguarda_instalacion=  str_replace("*", "%", $guia_mecanica_salvaguarda_instalacion);
                $query->where('guia_mecanica_salvaguarda_instalacion','like',$guia_mecanica_salvaguarda_instalacion);
            }  else 
            {
                $query->where('guia_mecanica_salvaguarda_instalacion',$guia_mecanica_salvaguarda_instalacion);
            }
        }
    }	   public function scopeGarantia($query,$garantia)
    {
        if(trim($garantia)!="")
        {
            $arr=explode("*", $garantia);
            if(count($arr)>=2)
            {
                $garantia=  str_replace("*", "%", $garantia);
                $query->where('garantia','like',$garantia);
            }  else 
            {
                $query->where('garantia',$garantia);
            }
        }
    }	   public function scopeCapacitacion($query,$capacitacion)
    {
        if(trim($capacitacion)!="")
        {
            $arr=explode("*", $capacitacion);
            if(count($arr)>=2)
            {
                $capacitacion=  str_replace("*", "%", $capacitacion);
                $query->where('capacitacion','like',$capacitacion);
            }  else 
            {
                $query->where('capacitacion',$capacitacion);
            }
        }
    }	   public function scopeValidez($query,$validez)
    {
        if(trim($validez)!="")
        {
            $arr=explode("*", $validez);
            if(count($arr)>=2)
            {
                $validez=  str_replace("*", "%", $validez);
                $query->where('validez','like',$validez);
            }  else 
            {
                $query->where('validez',$validez);
            }
        }
    }	   public function scopeReporte($query,$reporte)
    {
        if(trim($reporte)!="")
        {
            $arr=explode("*", $reporte);
            if(count($arr)>=2)
            {
                $reporte=  str_replace("*", "%", $reporte);
                $query->where('reporte','like',$reporte);
            }  else 
            {
                $query->where('reporte',$reporte);
            }
        }
    }	   public function scopeAnticipo($query,$anticipo)
    {
        if(trim($anticipo)!="")
        {
            $arr=explode("*", $anticipo);
            if(count($arr)>=2)
            {
                $anticipo=  str_replace("*", "%", $anticipo);
                $query->where('anticipo','like',$anticipo);
            }  else 
            {
                $query->where('anticipo',$anticipo);
            }
        }
    }	   public function scopeContacto($query,$contacto)
    {
        if(trim($contacto)!="")
        {
            $arr=explode("*", $contacto);
            if(count($arr)>=2)
            {
                $contacto=  str_replace("*", "%", $contacto);
                $query->where('contacto','like',$contacto);
            }  else 
            {
                $query->where('contacto',$contacto);
            }
        }
    }	*/
}