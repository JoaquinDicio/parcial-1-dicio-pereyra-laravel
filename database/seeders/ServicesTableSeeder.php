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
                'name' => 'Host re piola',
                'description' => $faker->sentence(),
                'price' => 30000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Host intermedio',
                'description' => $faker->sentence(),
                'price' => 20000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Host re malo',
                'description' => $faker->sentence(),
                'price' => 10000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
