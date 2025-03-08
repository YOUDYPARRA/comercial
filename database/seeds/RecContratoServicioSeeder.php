<?php

use Illuminate\Database\Seeder;

class RecContratoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //

        $data=[
            [
                'id_menu'=>'15',
                'recurso'=>'contratos.cancelar',
                'etiqueta'=>'',
                'observacion'=>''
            ],
            [
                'id_menu'=>'15',
                'recurso'=>'contratos.archivar',
                'etiqueta'=>'',
                'observacion'=>''
            ],
            [
                'id_menu'=>'15',
                'recurso'=>'contratos.digitalizar',
                'etiqueta'=>'',
                'observacion'=>''
            ],
            [
                'id_menu'=>'15',
                'recurso'=>'contratos.digital',
                'etiqueta'=>'',
                'observacion'=>''
            ],
            [
                'id_menu'=>'15',
                'recurso'=>'contratos.show',
                'etiqueta'=>'',
                'observacion'=>''
            ],
            [
                'id_menu'=>'15',
                'recurso'=>'contratos.create',
                'etiqueta'=>'CREAR CONTRATO SERV.',
                'observacion'=>''
            ],[
                'id_menu'=>'15',
                'recurso'=>'contratos.eliminados',
                'etiqueta'=>'SERV. ELIMINADOS',
                'observacion'=>''
            ],[
                'id_menu'=>'15',
                'recurso'=>'contratos.edit',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'15',
                'recurso'=>'contratos.index',
                'etiqueta'=>'VER CONTRATO SERV.',
                'observacion'=>''
            ],[
                'id_menu'=>'15',
                'recurso'=>'contratos.destroy',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'15',
                'recurso'=>'contratos.store',
                'etiqueta'=>'',
                'observacion'=>''
            ],[
                'id_menu'=>'15',
                'recurso'=>'contratos.update',
                'etiqueta'=>'',
                'observacion'=>''
            ]
            
        ];
            \DB::table('recursos')->insert(
                    $data
                    );  
    
    }
}
