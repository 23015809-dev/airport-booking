<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');

        $bookings = Booking::with(['user', 'transferRoute'])
            ->when($status, fn ($query) => $query->where('status', $status))
            ->latest()
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings', 'status'));
    }

    public function show(Booking $booking)
    {
        $booking->load(['user', 'transferRoute']);

        return view('admin.bookings.show', compact('booking'));
    }

    public function confirm(Booking $booking): RedirectResponse
    {
        if ($booking->status !== 'pending') {
            return redirect()->back()->with('error', 'Chi ho tro don dang cho xu ly.');
        }

        $booking->update(['status' => 'confirmed']);

        return redirect()->back()->with('success', 'Da xac nhan don dat ve.');
    }

    public function cancel(Booking $booking): RedirectResponse
    {
        if ($booking->status !== 'pending') {
            return redirect()->back()->with('error', 'Chi ho tro don dang cho xu ly.');
        }

        $booking->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Da huy don dat ve.');
    }
}
