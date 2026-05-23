<x-app-layout>
    <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 page-section">
        <x-ui.card title="Book a ride">
            <div class="mb-6 text-sm text-gray-600">
                <div class="font-semibold text-gray-800">{{ $route->name }}</div>
                <div>{{ $route->pickup_point }} -> {{ $route->dropoff_point }}</div>
                <div class="text-primary font-semibold mt-2">Price: {{ number_format($route->price) }} VND / passenger</div>
            </div>

            <form method="POST" action="{{ route('bookings.store') }}" class="grid gap-4 md:grid-cols-2">
                @csrf
                <input type="hidden" name="transfer_route_id" value="{{ $route->id }}">

                <x-ui.input name="passenger_name" label="Passenger name" />
                <x-ui.input name="passenger_phone" label="Phone number" />
                <x-ui.input name="pickup_time" type="datetime-local" label="Pickup time" />
                <x-ui.input name="num_passengers" type="number" label="Passengers" id="num_passengers" />

                <label class="block text-sm font-medium text-gray-700 md:col-span-2">
                    <span class="mb-1 inline-block">Note</span>
                    <textarea name="note" rows="4" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">{{ old('note') }}</textarea>
                    @error('note')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </label>

                <div class="mt-4 flex items-center justify-between md:col-span-2">
                    <div class="text-sm text-gray-500">Total amount: <span id="total_price" class="font-semibold text-primary">0 VND</span></div>
                    <x-ui.button type="submit" variant="accent">Confirm booking</x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </section>

    <script>
        const pricePerSeat = {{ (int) $route->price }};
        const seatsInput = document.getElementById('num_passengers');
        const totalEl = document.getElementById('total_price');

        const formatMoney = (value) => new Intl.NumberFormat('en-US').format(value) + ' VND';
        const updateTotal = () => {
            const seats = Number(seatsInput.value || 0);
            totalEl.textContent = formatMoney(seats * pricePerSeat);
        };

        seatsInput.addEventListener('input', updateTotal);
        updateTotal();
    </script>
</x-app-layout>
