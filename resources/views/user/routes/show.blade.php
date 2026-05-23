<x-app-layout>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 page-section">
        <div class="grid gap-8 lg:grid-cols-2 detail-grid">
            <div>
                @if($route->image)
                    <img src="{{ asset('storage/' . $route->image) }}" alt="{{ $route->name }}" class="w-full h-72 object-cover rounded-2xl">
                @else
                    <div class="w-full h-72 bg-primary/10 rounded-2xl flex items-center justify-center text-primary font-semibold">No image available</div>
                @endif
            </div>
            <div class="detail-panel">
                <h1 class="page-title" style="font-size:32px">{{ $route->name }}</h1>
                <p class="mt-3 text-gray-600">{{ $route->pickup_point }} -> {{ $route->dropoff_point }}</p>
                <div class="mt-4 grid gap-3 text-sm text-gray-600">
                    <div>Price: <span class="font-semibold text-primary">{{ number_format($route->price) }} VND / passenger</span></div>
                    <div>Estimated duration: {{ $route->duration_minutes }} minutes</div>
                </div>
                <p class="mt-4 text-gray-600">{{ $route->description }}</p>
                <div class="mt-6">
                    <a href="{{ route('bookings.create', $route) }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-accent text-white font-semibold hover:bg-accent-light">
                        Book now
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
