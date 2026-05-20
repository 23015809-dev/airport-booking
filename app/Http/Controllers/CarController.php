<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Hàm hiển thị danh sách xe
    public function index()
    {
        $cars = Car::with('driver')->get(); // Lấy danh sách xe kèm thông tin tài xế của xe đó
        $drivers = Driver::all(); // Lấy danh sách tài xế để chọn khi thêm xe
        return view('cars.index', compact('cars', 'drivers'));
    }

    // Hàm lưu xe mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'driver_id' => 'required|exists:drivers,id',
            'car_name' => 'required|string|max:255',
            'license_plate' => 'required|string|max:20',
            'seats' => 'required|integer|min:4',
        ]);

        Car::create($request->all());

        return redirect()->back()->with('success', 'Thêm xe mới thành công!');
    }
}