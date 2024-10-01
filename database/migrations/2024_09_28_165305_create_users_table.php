<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email")->unique();
            $table->string("password");
            $table->foreignId('role_id')->constrained("roles"); //establece la FK en la tabla roles
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => '$2y$12$NkjQMK5XeYpXYSXjf0b25O1mHR3q9v.Z1WADRCjQzw.mX3hEcWZlO', 'role_id' => '1', 'created_at' => now(), 'updated_at' => now()]
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
