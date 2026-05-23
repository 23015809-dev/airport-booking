<x-app-layout>
    <section class="hero-panel">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="max-w-2xl">
                <h1 class="page-title">Book your airport transfer</h1>
                <p class="page-subtitle">Choose the right route and book in minutes.</p>
            </div>

            <form class="mt-8 grid gap-4 md:grid-cols-3" method="GET" action="{{ route('routes.index') }}">
                <x-ui.input name="pickup_point" label="Pickup point" placeholder="Example: Tan Son Nhat Airport" value="{{ $searchPickup }}" />
                <x-ui.input name="dropoff_point" label="Dropoff point" placeholder="Example: District 1" value="{{ $searchDropoff }}" />
                <div class="flex items-end">
                    <x-ui.button type="submit" variant="accent" class="w-full">Search</x-ui.button>
                </div>
            </form>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 page-section">
        @if(session('success'))
            <x-ui.alert type="success">{{ session('success') }}</x-ui.alert>
        @endif

        <div class="grid-cards">
            @forelse($routes as $route)
                <article class="route-card">
                    @if($route->image)
                        <img src="{{ asset('storage/' . $route->image) }}" alt="{{ $route->name }}" class="h-44 w-full object-cover">
                    @endif
                    <div class="route-card-body">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $route->name }}</h3>
                        <div class="meta-list mt-2">
                            <div>{{ $route->pickup_point }} -> {{ $route->dropoff_point }}</div>
                            <div>Duration: {{ $route->duration_minutes }} minutes</div>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="text-primary font-semibold">{{ number_format($route->price) }} VND</div>
                            <a href="{{ route('routes.show', $route) }}" class="inline-flex items-center justify-center px-3 py-1.5 text-sm font-semibold rounded-lg bg-primary text-white hover:bg-primary-dark">
                                View details
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-state">
                    <p>No routes match your search.</p>
                    <p class="mt-1">Try changing pickup or dropoff keywords.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $routes->links() }}
        </div>
    </section>
</x-app-layout>