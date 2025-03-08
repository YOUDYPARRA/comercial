<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        //Model::unguard();
//        $faker= Faker::create();
        // $this->call('UserTableSeeder');

        //Model::reguard();
        $users=[
            [
                'id'=>'1',
                'name'=>'ADMINISTRADOR',
                'iniciales'=>'ADMON',
                'email'=>'admon@admon',
                'password'=>'$2y$10$OBXH8zKIjQThAunXQQ3cqO1EyNfnUHYyFBEp0K2Jj98HLv5h0W1bO',
                'tipo_usuario'=>'ADMINISTRADOR',
            ],
            
            
        ];
            \DB::table('users')->insert(
                    $users
                    );
    }
}
