<?php

use Illuminate\Database\Seeder;

class testPlantillaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $recursos=[
	        [
	        'autor'=>347,//id autor
		    'clase'=>'cotizacion.contrato',
		    'nombre'=>'plantilla inicio01',
		    'plantilla'=>'Se realiza cotizacion de contrato de %clase.tipo_servicio% para %clase.nombre_fiscal% a los ___ dias de ___ de 20___,',
		    'observacion'=>''
	        ],
	        [
	        'autor'=>347,//id autor
		    'clase'=>'cotizacion.contrato',
		    'nombre'=>'plantilla inicio01',
		    'plantilla'=>'CARACTERISTICAS DEL SERVICIO:

•	El equipo arriba descrito, estará cubierto por el presente contrato, ubicados en el domicilio del cliente.
•	La cobertura de la presente tendrá vigencia de un año a partir de la firma del contrato
•	El pago se realizará en una sola exhibición, a la firma del contrato
•	Incluye todos los servicios correctivos (previo reporte telefónico)
•	El equipo deberá de estar funcionando al 100% al momento de celebrar el contrato.',
		    'observacion'=>''
	        ],
	        [
	        'autor'=>347,//id autor
		    'clase'=>'cotizacion.contrato',
		    'nombre'=>'plantilla final02',
		    'plantilla'=>'EL SERVICIO INCLUYE:

1.	2 mantenimientos preventivos durante la vigencia del contrato
2.	Atención a todos los servicios correctivos que sean necesarios.
3.	Asesoría telefónica ilimitada durante el período contratado.
4.	Atención a sus reportes de servicio dentro de las 48 horas siguientes a su llamado.
5.	Incluye viáticos del Ingeniero, mano de obra especializada, uso de equipo de medición y kit de limpieza preventiva.
6.	Incluye el suministro de refacciones necesarias del sistema, Excepto elementos al vacío (Detector, Tina de Rayos X y Controladora), accesorios periféricos conectados al equipo (Impresoras, CR, UPS, grabador externo o similar, etc) y consumibles (Colchonetas y posicionadores)',
		    'observacion'=>''
	        ],[
	        'autor'=>347,//id autor
		    'clase'=>'cotizacion.contrato',
		    'nombre'=>'plantilla equipos',
		    'plantilla'=>'__EQUIPO__MODELO__MARCA__CANTIDAD__OBSERVACION__UNIDAD DE MEDIDA
__%clase.equipo%__%clase.modelo%__%clase.marca%__cantidad__obs_unidad__medida',
		    'observacion'=>''
	        ]

        ];
        \DB::table('plantillas')->insert($recursos);   
    }
}
