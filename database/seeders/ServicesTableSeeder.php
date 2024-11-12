<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::table('services')->insert([
            [
                'name' => 'Host avanzado',
                'description' => 'Perfecto para negocios grandes, con almacenamiento en la nube y soporte 24/7',
                'price' => 30000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Host intermedio',
                'description' => 'Perfecto para entusiastas que quieren llevar su sitio al siguiente nivel',
                'price' => 20000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Host básico',
                'description' => 'Sirve para experimentar lo que es tener presencia en linea',
                'price' => 10000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
