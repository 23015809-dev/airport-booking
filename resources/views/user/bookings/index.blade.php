<x-app-layout>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 page-section">
        <div class="toolbar">
            <h1 class="text-2xl font-bold text-gray-800">Booking history</h1>
            <a href="{{ route('routes.index') }}" class="text-sm text-primary hover:underline">Book another route</a>
        </div>

        @if(session('success'))
            <x-ui.alert type="success">{{ session('success') }}</x-ui.alert>
        @endif

        <x-ui.table class="w-full">
            <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-4 py-3">Route</th>
                    <th class="px-4 py-3">Pickup time</th>
                    <th class="px-4 py-3">Passengers</th>
                    <th class="px-4 py-3">Total amount</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                @forelse($bookings as $booking)
                    <tr>
                        <td class="px-4 py-3">{{ $booking->transferRoute->name }}</td>
                        <td class="px-4 py-3">{{ $booking->pickup_time->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3">{{ $booking->num_passengers }}</td>
                        <td class="px-4 py-3 text-primary font-semibold">{{ number_format($booking->total_price) }} VND</td>
                        <td class="px-4 py-3">
                            @php
                                $color = match($booking->status) {
                                    'confirmed' => 'green',
                                    'cancelled' => 'red',
                                    default => 'yellow',
                                };
                            @endphp
                            <x-ui.badge :color="$color">{{ ucfirst($booking->status) }}</x-ui.badge>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-sm text-gray-500">No bookings yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </x-ui.table>

        <div class="mt-6">
            {{ $bookings->links() }}
        </div>
    </section>
</x-app-layout>
