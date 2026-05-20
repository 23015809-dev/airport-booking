<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// Nhớ thêm 2 dòng khai báo Controller này lên trên đầu nhé bạn
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// === DÁN ĐOẠN CODE MỚI CỦA BẠN VÀO ĐÂY ===
Route::middleware(['auth'])->group(function () {
    // Đường dẫn quản lý tài xế
    Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
    Route::post('/drivers', [DriverController::class, 'store'])->name('drivers.store');

    // Đường dẫn quản lý xe
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
});