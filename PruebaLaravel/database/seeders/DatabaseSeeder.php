<?php

namespace Database\Seeders;

use App\Models\Companies;
use App\Models\Employes;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //CREACION DEL USUARIO PARA LA PRUEBA
        DB::table('users')->insert([
            'name' => 'administrador del sistema',
            'email' => 'admin@admin.com ',
            'password' => Hash::make('password'),
        ]);

        //FACTORY COMPANIES
        Companies::factory(20)->create();
        //FACTORY EMPLOYES
        Employes::factory(15)->create();
    }
}
