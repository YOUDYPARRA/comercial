<?php

use Illuminate\Database\Seeder;

class MenServicioSeeder extends Seeder
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
                'id'=>'43',
                'menu'=>'ORDEN DE SERVICIO'
            ]
            
        ];
            \DB::table('menus')->insert(
                    $data
                    ); 
    }
}
