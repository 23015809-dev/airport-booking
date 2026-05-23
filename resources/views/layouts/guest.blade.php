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
    <body class="font-sans text-gray-800 antialiased bg-surface">
        <div class="min-h-screen flex flex-col justify-center items-center px-4">
            <a href="{{ route('routes.index') }}" class="mb-6 flex items-center gap-2 text-primary font-semibold">
                <span class="h-10 w-10 rounded-lg bg-primary/10 flex items-center justify-center">AT</span>
                Airport Transfer
            </a>

            <div class="w-full sm:max-w-md px-6 py-6 bg-white shadow-lg rounded-2xl border border-gray-100">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
