<?php

use Illuminate\Database\Seeder;

class RecCotizacionContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data=[
            
            [
                'id_menu'=>'29',
                'recurso'=>'cotizacion_contrato.create',
                'etiqueta'=>'CREAR COTIZACION CONTRATO',
                'observacion'=>''
            ],[
                'id_menu'=>'29',
                'recurso'=>'cotizacion_contrato.edit',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'29',
                'recurso'=>'cotizacion_contrato.index',
                'etiqueta'=>'VER COTIZACION CONTRATO',
                'observacion'=>''
            ],[
                'id_menu'=>'29',
                'recurso'=>'cotizacion_contrato.destroy',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'29',
                'recurso'=>'cotizacion_contrato.store',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'29',
                'recurso'=>'cotizacion_contrato.update',
                'etiqueta'=>'',
                'observacion'=>''
            ]
            
        ];
            \DB::table('recursos')->insert($data);
    
    }
}
