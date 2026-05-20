<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            // Khóa ngoại liên kết trực tiếp tới bảng drivers ở trên
            $table->foreignId('driver_id')->constrained()->onDelete('cascade'); 
            $table->string('car_name');     // Tên loại xe (Ví dụ: Toyota Vios, Mitsubishi Xpander...)
            $table->string('license_plate');// Biển số xe
            $table->integer('seats');       // Số chỗ ngồi (4, 7, 16 chỗ...)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
