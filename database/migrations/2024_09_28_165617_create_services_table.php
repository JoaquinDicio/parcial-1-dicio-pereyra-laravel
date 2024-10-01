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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description");
            $table->decimal("price", 10, 2); // para que tenga comas asi mas como moneda
            $table->timestamps();
        });

        DB::table('services')->insert([
            ['name' => 'Host re piola', 'description' => 'Descripcion de Host re piola', 'price' => '30000', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Host re malo', 'description' => 'Descripcion de Host re malo pero re mal, una cagada', 'price' => '10000', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
