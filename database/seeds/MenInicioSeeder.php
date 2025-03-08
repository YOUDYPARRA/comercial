<?php

use Illuminate\Database\Seeder;

class MenInicioSeeder extends Seeder
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
                'id'=>'45',
                'menu'=>'INICIO'
            ]
            
        ];
            \DB::table('menus')->insert(
                    $data
                    );   
    
    }
}
