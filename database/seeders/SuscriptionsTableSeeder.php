<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

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
            ],
            [
                'user_id' => '3',
                'service_id' => '1',
                'contract_date' => Carbon::create(2024, 12, 1), 
            ],
            [
                'user_id' => '4',
                'service_id' => '1',
                'contract_date' => Carbon::create(2024, 10, 15), 
            ],
            [
                'user_id' => '5',
                'service_id' => '3',
                'contract_date' => Carbon::create(2024, 11, 20), 
            ],
            [
                'user_id' => '6',
                'service_id' => '1',
                'contract_date' => Carbon::create(2024, 8, 5), 
            ],
        ]);
    }
}
