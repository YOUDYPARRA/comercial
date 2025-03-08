<?php

use Illuminate\Database\Seeder;

class MenPrestamoSeeder extends Seeder
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
                'id'=>'44',
                'menu'=>'REQ. PIEZA'
            ]
            
        ];
            \DB::table('menus')->insert(
                    $data
                    );  
    
    }
}
