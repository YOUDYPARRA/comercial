<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('MenusSeeder');
        $this->call('RecursosSeeder');
        $this->call('UsersSeeder');
        $this->call('PermisosSeeder');
        Model::reguard();
    }
}
