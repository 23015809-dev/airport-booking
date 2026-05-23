<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Airport Transfer') }} - Admin</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('build/assets/app-CEwZte8_.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site.css') }}">
        <script defer src="{{ asset('build/assets/app-BjMeHjpC.js') }}"></script>
    </head>
    <body class="font-sans antialiased bg-surface text-gray-700">
        <div class="min-h-screen flex admin-shell">
            <aside class="w-64 bg-primary text-white admin-sidebar">
                <div class="px-6 py-6 text-lg font-semibold border-b border-white/10">
                    Airport Transfer
                </div>
                <nav class="flex-1 px-4 py-6 space-y-2 text-sm">
                    <div class="sidebar-label">Overview</div>
                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-white/10 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>

                    <div class="sidebar-label">Management</div>
                    <a href="{{ route('admin.routes.index') }}" class="block px-4 py-2 rounded-lg hover:bg-white/10 {{ request()->routeIs('admin.routes.*') ? 'active' : '' }}">Routes</a>
                    <a href="{{ route('admin.vehicles.index') }}" class="block px-4 py-2 rounded-lg hover:bg-white/10 {{ request()->routeIs('admin.vehicles.*') ? 'active' : '' }}">Vehicles</a>
                    <a href="{{ route('admin.drivers.index') }}" class="block px-4 py-2 rounded-lg hover:bg-white/10 {{ request()->routeIs('admin.drivers.*') ? 'active' : '' }}">Drivers</a>
                    <a href="{{ route('admin.bookings.index') }}" class="block px-4 py-2 rounded-lg hover:bg-white/10 {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">Bookings</a>

                    <div class="sidebar-label">Account</div>
                    <a href="{{ route('home') }}" class="block px-4 py-2 rounded-lg hover:bg-white/10">User Site</a>
                </nav>
                <div class="px-6 py-4 border-t border-white/10 text-xs text-white/70">
                    © {{ date('Y') }} Airport Transfer
                </div>
            </aside>

            <div class="flex-1 flex flex-col admin-main">
                <header class="bg-white border-b border-gray-200">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                        <div class="text-lg font-semibold text-primary">Admin Panel</div>
                        <div class="flex items-center gap-3 text-sm">
                            <span class="text-gray-500">{{ auth()->user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-ui.button type="submit" variant="outline" size="sm">Log out</x-ui.button>
                            </form>
                        </div>
                    </div>
                </header>

                <main class="flex-1">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
