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
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Modern Styles -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('storage/image/logowates.png') }}">
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="auth-bg">
        <!-- Floating Circles -->
        <div class="auth-circle circle-1"></div>
        <div class="auth-circle circle-2"></div>
        <div class="auth-circle circle-3"></div>

        <div class="container min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 position-relative"
            style="z-index: 2;">
            <div class="fade-in mb-5 text-center">
                <a href="/" class="text-white text-decoration-none d-inline-flex flex-column align-items-center gap-3">
                        <img src="{{ asset('storage/image/logowates.png') }}" alt="Logo Wates"
                            style="width: 180px; height: 180px; object-fit: contain; filter: drop-shadow(0 0 3px white) drop-shadow(0 0 3px white) drop-shadow(0 0 3px white) drop-shadow(0 4px 10px rgba(0,0,0,0.3));">
                    <h1 class="text-white mb-0 display-4 fw-bold"
                        style="font-family: 'Outfit'; letter-spacing: 2px; text-shadow: 0 4px 10px rgba(0,0,0,0.2);">
                        ARSIP AKTE</h1>
                </a>
            </div>

            <div class="w-full sm:max-w-md px-4 py-4 fade-in">
                <div
                    class="glass-card shadow-2xl overflow-hidden sm:rounded-3xl p-8 shadow-primary" style="border: none !important;">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>