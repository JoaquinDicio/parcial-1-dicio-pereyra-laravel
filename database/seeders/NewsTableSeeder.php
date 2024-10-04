<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        DB::table('news')->insert([
            [
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(3, true),
                'img' => 'uploads/gatito1.jpg',
                'summary' => $faker->text(100),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(3, true),
                'img' => 'uploads/gatito2.jpg',
                'summary' => $faker->text(100),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(3, true),
                'img' => 'uploads/gatito3.jpg',
                'summary' => $faker->text(100),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(3, true),
                'img' => 'uploads/gatito4.jpg',
                'summary' => $faker->text(100),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(3, true),
                'img' => 'uploads/gatito5.jpg',
                'summary' => $faker->text(100),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(3, true),
                'img' => 'uploads/gatito6.jpg',
                'summary' => $faker->text(100),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(3, true),
                'img' => 'uploads/gatito7.jpg',
                'summary' => $faker->text(100),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(3, true),
                'img' => 'uploads/gatito8.jpg',
                'summary' => $faker->text(100),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(3, true),
                'img' => 'uploads/gatito9.jpg',
                'summary' => $faker->text(100),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => $faker->sentence(),
                'content' => $faker->paragraphs(3, true),
                'img' => 'uploads/gatito10.jpg',
                'summary' => $faker->text(100),
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}


