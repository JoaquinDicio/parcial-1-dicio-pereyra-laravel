<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SuscriptionsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::table('suscriptions')->insert([
            [
                'user_id' => '2',
                'service_id' => '2',
                'contract_date' => now(),
            ]
        ]);
    }
}
