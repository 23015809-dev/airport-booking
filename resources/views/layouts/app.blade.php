<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('build/assets/app-CEwZte8_.css') }}">
        <link rel="stylesheet" href="{{ asset('css/site.css') }}">
        <script defer src="{{ asset('build/assets/app-BjMeHjpC.js') }}"></script>
    </head>
    <body class="font-sans antialiased bg-surface text-gray-700">
        <div class="min-h-screen flex flex-col">
            <header class="sticky top-0 z-40 bg-white/90 backdrop-blur border-b border-gray-200 app-header">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16 app-header-row">
                        <a href="{{ route('routes.index') }}" class="flex items-center gap-2 font-semibold text-primary">
                            <span class="h-9 w-9 rounded-lg bg-primary/10 flex items-center justify-center text-primary">AT</span>
                            <span>Airport Transfer</span>
                        </a>
                        <nav class="main-nav items-center gap-6 text-sm font-medium">
                            <a href="{{ route('routes.index') }}" class="hover:text-primary">Routes</a>
                            <a href="{{ route('bookings.index') }}" class="hover:text-primary">Booking history</a>
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="text-accent hover:text-accent-light">Admin</a>
                                @endif
                            @endauth
                        </nav>
                        <div class="header-actions flex items-center gap-3 text-sm">
                            @auth
                                <span class="user-name text-gray-500">{{ auth()->user()->name }}</span>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-ui.button type="submit" variant="outline" size="sm">Log out</x-ui.button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="hover:text-primary">Log in</a>
                                <a href="{{ route('register') }}" class="text-white bg-primary hover:bg-primary-dark px-3 py-1.5 rounded-lg">Register</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1">
                {{ $slot }}
            </main>

            <footer class="border-t border-gray-200 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-sm text-gray-500">
                    © {{ date('Y') }} Airport Transfer. All rights reserved.
                </div>
            </footer>
        </div>
    </body>
</html>
