<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreBookingRequest;
use App\Models\Booking;
use App\Models\TransferRoute;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('transferRoute')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('user.bookings.index', compact('bookings'));
    }

    public function create(TransferRoute $route)
    {
        abort_unless($route->status === 'active', 404);

        return view('user.bookings.create', compact('route'));
    }

    public function store(StoreBookingRequest $request)
    {
        $route = TransferRoute::findOrFail($request->validated()['transfer_route_id']);
        abort_unless($route->status === 'active', 404);

        $totalPrice = $route->price * $request->validated()['num_passengers'];

        Booking::create([
            'user_id' => auth()->id(),
            'transfer_route_id' => $route->id,
            'passenger_name' => $request->validated()['passenger_name'],
            'passenger_phone' => $request->validated()['passenger_phone'],
            'pickup_time' => $request->validated()['pickup_time'],
            'num_passengers' => $request->validated()['num_passengers'],
            'total_price' => $totalPrice,
            'note' => $request->validated()['note'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Dat ve thanh cong.');
    }
}
