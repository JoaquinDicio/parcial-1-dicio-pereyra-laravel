<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $payments = [
            [
                'suscription_id' => 1,
                'amount' => 20000,
                'payment_date' => Carbon::create(2024, 12, 2),
                'card_last_four' => $faker->numerify('####'),
            ],
            [
                'suscription_id' => 2,
                'amount' => 30000,
                'payment_date' => Carbon::create(2024, 12, 2),
                'card_last_four' => $faker->numerify('####'),
            ],
            [
                'suscription_id' => 3,
                'amount' => 30000,
                'payment_date' => Carbon::create(2024, 10, 15),
                'card_last_four' => $faker->numerify('####'),
            ],
            [
                'suscription_id' => 4,
                'amount' => 10000,
                'payment_date' => Carbon::create(2024, 11, 20),
                'card_last_four' => $faker->numerify('####'),
            ],
            [
                'suscription_id' => 5,
                'amount' => 30000,
                'payment_date' => Carbon::create(2024, 8, 5),
                'card_last_four' => $faker->numerify('####'),
            ],
        ];
        

        DB::table('payments')->insert($payments);
    }
}
