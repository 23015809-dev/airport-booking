<x-admin-layout>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Booking details</h1>
        <a href="{{ route('admin.bookings.index') }}" class="text-sm text-gray-500 hover:text-primary">Back</a>
    </div>

    @if(session('success'))
        <x-ui.alert type="success">{{ session('success') }}</x-ui.alert>
    @endif
    @if(session('error'))
        <x-ui.alert type="error">{{ session('error') }}</x-ui.alert>
    @endif

    <x-ui.card>
        <div class="grid gap-4 md:grid-cols-2 text-sm text-gray-600 detail-panel">
            <div>
                <div class="font-semibold text-gray-800">Customer</div>
                <div>{{ $booking->user->name }} - {{ $booking->user->email }}</div>
            </div>
            <div>
                <div class="font-semibold text-gray-800">Route</div>
                <div>{{ $booking->transferRoute->name }}</div>
            </div>
            <div>
                <div class="font-semibold text-gray-800">Pickup time</div>
                <div>{{ $booking->pickup_time->format('d/m/Y H:i') }}</div>
            </div>
            <div>
                <div class="font-semibold text-gray-800">Passengers</div>
                <div>{{ $booking->num_passengers }}</div>
            </div>
            <div>
                <div class="font-semibold text-gray-800">Total amount</div>
                <div class="text-primary font-semibold">{{ number_format($booking->total_price) }} VND</div>
            </div>
            <div>
                <div class="font-semibold text-gray-800">Status</div>
                <x-ui.badge :color="$booking->status === 'confirmed' ? 'green' : ($booking->status === 'cancelled' ? 'red' : 'yellow')">
                    {{ ucfirst($booking->status) }}
                </x-ui.badge>
            </div>
            @if($booking->note)
                <div class="md:col-span-2">
                    <div class="font-semibold text-gray-800">Note</div>
                    <div>{{ $booking->note }}</div>
                </div>
            @endif
        </div>

        <div class="mt-6 flex gap-3">
            @if($booking->status === 'pending')
                <form method="POST" action="{{ route('admin.bookings.confirm', $booking) }}">
                    @csrf
                    @method('PATCH')
                    <x-ui.button type="submit" variant="primary">Confirm</x-ui.button>
                </form>
                <form method="POST" action="{{ route('admin.bookings.cancel', $booking) }}">
                    @csrf
                    @method('PATCH')
                    <x-ui.button type="submit" variant="danger">Cancel booking</x-ui.button>
                </form>
            @endif
        </div>
    </x-ui.card>
</x-admin-layout>
