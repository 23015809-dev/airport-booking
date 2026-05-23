<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('transfer_route_id')->constrained()->cascadeOnDelete();
            $table->string('passenger_name');
            $table->string('passenger_phone', 20);
            $table->dateTime('pickup_time');
            $table->unsignedTinyInteger('num_passengers');
            $table->decimal('total_price', 10, 2);
            $table->text('note')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
