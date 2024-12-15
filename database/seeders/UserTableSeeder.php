<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$12$NkjQMK5XeYpXYSXjf0b25O1mHR3q9v.Z1WADRCjQzw.mX3hEcWZlO',
                'role_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'usuarioComun',
                'email' => 'usuarioComun@gmail.com',
                'password' => '$2y$12$NkjQMK5XeYpXYSXjf0b25O1mHR3q9v.Z1WADRCjQzw.mX3hEcWZlO',
                'role_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'HernestoCueva',
                'email' => 'HernestoCueva@gmail.com',
                'password' => '$2y$12$NkjQMK5XeYpXYSXjf0b25O1mHR3q9v.Z1WADRCjQzw.mX3hEcWZlO',
                'role_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'FlorIngan',
                'email' => 'FlorIngan@gmail.com',
                'password' => '$2y$12$NkjQMK5XeYpXYSXjf0b25O1mHR3q9v.Z1WADRCjQzw.mX3hEcWZlO',
                'role_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Postro33',
                'email' => 'Postro33@gmail.com',
                'password' => '$2y$12$NkjQMK5XeYpXYSXjf0b25O1mHR3q9v.Z1WADRCjQzw.mX3hEcWZlO',
                'role_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Papur',
                'email' => 'Papur@gmail.com',
                'password' => '$2y$12$NkjQMK5XeYpXYSXjf0b25O1mHR3q9v.Z1WADRCjQzw.mX3hEcWZlO',
                'role_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
