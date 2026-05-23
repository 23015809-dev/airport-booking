<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\TransferRoute;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    
    public function run(): void
    {
        $vehicles = collect([
            ['name' => 'Ford Transit', 'license_plate' => '51A-12345', 'seats' => 16, 'status' => 'active'],
            ['name' => 'Toyota Hiace', 'license_plate' => '51A-23456', 'seats' => 12, 'status' => 'active'],
            ['name' => 'Hyundai Solati', 'license_plate' => '51A-34567', 'seats' => 16, 'status' => 'maintenance'],
            ['name' => 'Mercedes Sprinter', 'license_plate' => '51A-45678', 'seats' => 19, 'status' => 'active'],
            ['name' => 'Kia Carnival', 'license_plate' => '51A-56789', 'seats' => 7, 'status' => 'inactive'],
        ])->map(fn ($data) => Vehicle::create($data));

        $drivers = collect([
            ['name' => 'Alex Nguyen', 'phone' => '0901000001', 'license_number' => 'DL-001', 'status' => 'active'],
            ['name' => 'Brian Tran', 'phone' => '0901000002', 'license_number' => 'DL-002', 'status' => 'active'],
            ['name' => 'Chris Le', 'phone' => '0901000003', 'license_number' => 'DL-003', 'status' => 'inactive'],
            ['name' => 'Diana Pham', 'phone' => '0901000004', 'license_number' => 'DL-004', 'status' => 'active'],
            ['name' => 'Ethan Vo', 'phone' => '0901000005', 'license_number' => 'DL-005', 'status' => 'active'],
        ])->map(fn ($data) => Driver::create($data));

        $routes = [
            ['name' => 'Tan Son Nhat Airport - District 1', 'pickup_point' => 'Tan Son Nhat Airport', 'dropoff_point' => 'District 1', 'price' => 250000, 'duration_minutes' => 45, 'status' => 'active'],
            ['name' => 'Tan Son Nhat Airport - Vung Tau', 'pickup_point' => 'Tan Son Nhat Airport', 'dropoff_point' => 'Vung Tau', 'price' => 850000, 'duration_minutes' => 150, 'status' => 'active'],
            ['name' => 'Mien Dong Bus Station - Da Lat', 'pickup_point' => 'Mien Dong Bus Station', 'dropoff_point' => 'Da Lat', 'price' => 1200000, 'duration_minutes' => 360, 'status' => 'active'],
            ['name' => 'District 3 Hotel - Tan Son Nhat Airport', 'pickup_point' => 'District 3', 'dropoff_point' => 'Tan Son Nhat Airport', 'price' => 220000, 'duration_minutes' => 35, 'status' => 'inactive'],
            ['name' => 'Tan Son Nhat Airport - Can Tho', 'pickup_point' => 'Tan Son Nhat Airport', 'dropoff_point' => 'Can Tho', 'price' => 950000, 'duration_minutes' => 180, 'status' => 'active'],
        ];

        foreach ($routes as $index => $route) {
            TransferRoute::create(array_merge($route, [
                'description' => 'Reliable and safe transfer service.',
                'vehicle_id' => $vehicles[$index % $vehicles->count()]->id,
                'driver_id' => $drivers[$index % $drivers->count()]->id,
            ]));
        }
    }
}