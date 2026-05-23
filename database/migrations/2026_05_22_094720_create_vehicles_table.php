<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('license_plate', 20)->unique();
            $table->unsignedTinyInteger('seats');
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive', 'maintenance'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
