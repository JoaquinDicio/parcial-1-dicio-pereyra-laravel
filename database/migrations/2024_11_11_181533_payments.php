<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('suscription_id')->constrained('suscriptions')->onDelete('cascade'); // clave foránea con eliminación en cascada
            $table->decimal('amount', 10, 2);
            $table->string('card_last_four', 4);
            $table->date('payment_date');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
