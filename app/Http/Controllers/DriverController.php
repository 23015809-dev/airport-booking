<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    // Hàm hiển thị danh sách tài xế
public function index()
{
    $drivers = Driver::all();
    return view('drivers.index', compact('drivers'));
}

    // Hàm lưu tài xế mới vào database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'license_no' => 'required|string|max:50',
        ]);

        Driver::create($request->all());

        return redirect()->back()->with('success', 'Thêm tài xế thành công!');
    }
}