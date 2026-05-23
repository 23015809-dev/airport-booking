<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\TransferRoute;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $totalRevenue = Booking::where('status', 'confirmed')->sum('total_price');
        $activeRoutes = TransferRoute::where('status', 'active')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();

        $fromDate = Carbon::now()->subDays(6)->startOfDay();
        $dailyRevenueRaw = Booking::selectRaw('DATE(created_at) as day, SUM(total_price) as revenue')
            ->where('status', 'confirmed')
            ->where('created_at', '>=', $fromDate)
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('revenue', 'day');

        $dailyRevenue = collect(range(0, 6))->map(function ($offset) use ($dailyRevenueRaw) {
            $date = Carbon::now()->subDays(6 - $offset);
            $key = $date->toDateString();

            return [
                'label' => $date->format('d/m'),
                'value' => (float) ($dailyRevenueRaw[$key] ?? 0),
            ];
        });

        return view('admin.dashboard.index', compact(
            'totalBookings',
            'pendingBookings',
            'totalRevenue',
            'activeRoutes',
            'confirmedBookings',
            'cancelledBookings',
            'dailyRevenue'
        ));
    }
}
