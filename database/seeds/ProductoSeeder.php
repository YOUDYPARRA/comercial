<?php

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('productos')->delete();
        $data=[
        ['nombre'=>'ULTRASONIDO'],
        ['nombre'=>'MASTOGRAFÍA'],
        ['nombre'=>'RAYOS X'],
        ['nombre'=>'DENSITOMETRÍA'],
        ['nombre'=>'TOMOGRAFÍA'],
        ['nombre'=>'RESONANCIA MAGNÉTICA'],
        ['nombre'=>'FLUOROSCOPÍA'],
        ['nombre'=>'HIT'],
        ['nombre'=>'THINPREP'],
        ['nombre'=>'ACCESORIOS'],
        ['nombre'=>'SERVICIOS']
        ];
        \DB::table('productos')->insert(
                    $data
                    );  
    }
}
