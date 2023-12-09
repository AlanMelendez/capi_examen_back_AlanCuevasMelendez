<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserDomicilio;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos los 100 usuarios con sus datos utilizando faker para el llenado de datos:
        $faker = Faker::create();
        for ($i=0; $i < 100; $i++) { 
            $user = User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                //Creamos password encriptada con bcrypt:
                'password' => bcrypt('pruebaalan'), // password
                'remember_token' => Str::random(10),
            ]);

            //Validamos que se haya creado el usuario:
            if($user){
                  //Creamos los datos de domicilio de cada usuario:
                $user->userDomicilio()->create([
                    'user_id' => $user->id,
                    'domicilio' => $faker->streetAddress(),
                    'numero_exterior' => $faker->buildingNumber(),
                    'colonia' => $faker->streetName(),
                    'cp' => $faker->postcode(),
                    'ciudad' => $faker->city(),
                    'fecha_nacimiento' => $faker->date(),
                ]);

            }else{
                //Si no se pudo crear que continue con el siguiente.
                continue;
            }

          
        }

    }
}
