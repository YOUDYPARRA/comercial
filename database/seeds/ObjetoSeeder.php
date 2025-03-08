<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ObjetoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
        $faker= Faker::create();
        // $this->call('UserTableSeeder');

        //Model::reguard();
        $fin =4;
        for ($i=0;$i<=$fin;$i++)
        {
            \DB::table('objetos')->insert(
                    array(
                    'nombre'=>$faker->city,
                    'estado'=>$faker->boolean,
                    'observacion'=>$faker->text 
                    ));   
        }
    }
}
