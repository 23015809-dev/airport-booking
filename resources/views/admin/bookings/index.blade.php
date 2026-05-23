<x-admin-layout>
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Booking management</h1>
        <form method="GET" class="flex items-center gap-3">
            <select name="status" class="rounded-lg border-gray-300 focus:border-primary focus:ring-primary text-sm">
                <option value="">All statuses</option>
                <option value="pending" @selected($status === 'pending')>pending</option>
                <option value="confirmed" @selected($status === 'confirmed')>confirmed</option>
                <option value="cancelled" @selected($status === 'cancelled')>cancelled</option>
            </select>
            <x-ui.button type="submit" size="sm" variant="outline">Filter</x-ui.button>
        </form>
    </div>

    @if(session('success'))
        <x-ui.alert type="success">{{ session('success') }}</x-ui.alert>
    @endif
    @if(session('error'))
        <x-ui.alert type="error">{{ session('error') }}</x-ui.alert>
    @endif

    <x-ui.table class="w-full">
        <thead class="bg-gray-50 text-left text-xs uppercase text-gray-500">
            <tr>
                <th class="px-4 py-3">Customer</th>
                <th class="px-4 py-3">Route</th>
                <th class="px-4 py-3">Pickup time</th>
                <th class="px-4 py-3">Total amount</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 bg-white">
            @foreach($bookings as $booking)
                <tr>
                    <td class="px-4 py-3">{{ $booking->user->name }}</td>
                    <td class="px-4 py-3">{{ $booking->transferRoute->name }}</td>
                    <td class="px-4 py-3">{{ $booking->pickup_time->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-3">{{ number_format($booking->total_price) }} VND</td>
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
                    <td class="px-4 py-3 text-right">
                        <a href="{{ route('admin.bookings.show', $booking) }}" class="text-primary hover:underline">Details</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-ui.table>

    <div class="mt-6">
        {{ $bookings->links() }}
    </div>
</x-admin-layout>
