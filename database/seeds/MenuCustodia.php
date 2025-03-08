<?php

use Illuminate\Database\Seeder;

class MenuCustodia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        //DB::table('menus')->delete();
        //Model::unguard();
//        $faker= Faker::create();
        // $this->call('UserTableSeeder');

        //Model::reguard();
        $data=[
            [
                'id'=>'39',
                'menu'=>'RECEPCION EQUIPO'
            ]
            
        ];
            \DB::table('menus')->insert(
                    $data
                    );   
    
    }
}
