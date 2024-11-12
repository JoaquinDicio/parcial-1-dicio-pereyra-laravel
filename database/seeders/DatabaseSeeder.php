<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ServicesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SuscriptionsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
    }
}
