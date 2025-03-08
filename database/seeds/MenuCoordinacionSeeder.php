<?php

use Illuminate\Database\Seeder;

class MenuCoordinacionSeeder extends Seeder
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
                'id'=>'40',
                'menu'=>'COORDINACION'
            ]
            
        ];
            \DB::table('menus')->insert(
                    $data
                    ); 
    }
}
