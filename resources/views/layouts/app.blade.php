<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Arsip Akte Bayi') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Modern Styles -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('storage/image/logowates.png') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <!-- <img src="{{ asset('storage/image/logowates.png') }}" alt="Logo" class="me-2"
                    style="height: 40px; width: auto;"> -->
                <span class="fw-bold" style="font-family: 'Outfit';">Arsip Akte Bayi</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        <li class="nav-item me-3">
                            <button id="theme-toggle" class="btn btn-link nav-link border-0 text-white p-2 d-flex align-items-center gap-2">
                                <span id="theme-toggle-text" class="small fw-medium">Mode Malam</span>
                                <i class="fas fa-moon fa-lg" id="theme-toggle-dark-icon"></i>
                                <i class="fas fa-sun fa-lg d-none" id="theme-toggle-light-icon"></i>
                            </button>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link {{ request()->routeIs('akte-bayi.index') ? 'active fw-bold' : '' }}"
                                href="{{ route('akte-bayi.index') }}">
                                <i class="fas fa-th-large me-1"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn btn-link nav-link dropdown-toggle border-0 d-flex align-items-center"
                                    type="button" data-bs-toggle="dropdown">
                                    <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center me-2"
                                        style="width: 32px; height: 32px;">
                                        <i class="fas fa-user-circle fa-lg"></i>
                                    </div>
                                    <span class="text-white">{{ Auth::user()->name ?? 'User' }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2 rounded-3">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger py-2">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item me-2">
                            <button id="theme-toggle" class="btn btn-link nav-link border-0 text-white p-2">
                                <i class="fas fa-moon fa-lg" id="theme-toggle-dark-icon"></i>
                                <i class="fas fa-sun fa-lg d-none" id="theme-toggle-light-icon"></i>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Theme Toggle Script -->
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        const themeToggleText = document.getElementById('theme-toggle-text');

        function updateThemeUI(theme) {
            if (theme === 'dark') {
                document.documentElement.setAttribute('data-bs-theme', 'dark');
                themeToggleLightIcon.classList.remove('d-none');
                themeToggleDarkIcon.classList.add('d-none');
                themeToggleText.textContent = 'Mode Siang';
            } else {
                document.documentElement.setAttribute('data-bs-theme', 'light');
                themeToggleLightIcon.classList.add('d-none');
                themeToggleDarkIcon.classList.remove('d-none');
                themeToggleText.textContent = 'Mode Malam';
            }
        }

        // Check for saved theme in localStorage
        const savedTheme = localStorage.getItem('color-theme');
        const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
            updateThemeUI('dark');
        } else {
            updateThemeUI('light');
        }

        themeToggleBtn.addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            updateThemeUI(newTheme);
            localStorage.setItem('color-theme', newTheme);
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>