<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $suscription = DB::table('suscriptions')->first();

        DB::table('payments')->insert([
            [
                'suscription_id' => $suscription->id,
                'amount' => $faker->randomFloat(2, 10, 100),
                'card_last_four' => $faker->numerify('####'),
                'payment_date' => now(),
            ],
        ]);
    }
}
