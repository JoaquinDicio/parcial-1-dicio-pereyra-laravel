<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // relaciona al comprador con la sub
            $table->foreignId('service_id')->constrained('services'); // crea la relacion con los servicios
            $table->date('contract_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscriptions');
    }
};
