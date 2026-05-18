<x-guest-layout>
    <div class="text-center mb-5">
        <h2 class="text-3xl font-bold text-white mb-2" style="font-family: 'Outfit'; letter-spacing: -1px;">Selamat
            Datang Kembali</h2>
        <p class="text-white opacity-75 small fw-medium">Silakan masuk untuk mengelola arsip akte bayi</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-white fw-bold" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email"
                class="form-label fw-bold small text-uppercase tracking-wider text-white opacity-80 mb-2">Email
                Address</label>
            <div class="input-group">
                <span class="input-group-text glass-input border-end-0">
                    <i class="fas fa-envelope opacity-75"></i>
                </span>
                <input id="email"
                    class="form-control glass-input border-start-0 py-3 @error('email') is-invalid @enderror"
                    type="email" name="email" :value="old('email')" placeholder="nama@email.com" required autofocus
                    autocomplete="username">
            </div>
            @error('email')
                <div class="text-white bg-danger bg-opacity-50 rounded px-2 py-1 small mt-2"><i
                        class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password"
                class="form-label fw-bold small text-uppercase tracking-wider text-white opacity-80 mb-2">Password</label>
            <div class="input-group">
                <span class="input-group-text glass-input border-end-0">
                    <i class="fas fa-lock opacity-75"></i>
                </span>
                <input id="password"
                    class="form-control glass-input border-start-0 py-3 @error('password') is-invalid @enderror"
                    type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
            </div>
            @error('password')
                <div class="text-white bg-danger bg-opacity-50 rounded px-2 py-1 small mt-2"><i
                        class="fas fa-exclamation-circle me-1"></i>{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me & Forgot Password -->
        <!-- <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input id="remember_me" type="checkbox"
                    class="form-check-input bg-transparent border-white border-opacity-30" name="remember">
                <label for="remember_me" class="form-check-label text-sm text-white opacity-80">Ingat saya</label>
            </div>
            @if (Route::has('password.request'))
                <a class="text-sm text-white opacity-80 hover:opacity-100 text-decoration-none small transition-all"
                    href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div> -->

        <div class="text-center mt-5">
            <button type="submit"
                class="btn px-5 py-3 shadow-lg border-0 text-uppercase tracking-widest fw-bold transition-all hover-scale rounded-pill"
                style="background: white; color: #e73c7e; font-size: 0.9rem; min-width: 200px;">
                <i class="fas fa-sign-in-alt me-2"></i> Masuk Sekarang
            </button>
        </div>

        <!-- @if (Route::has('register'))
            <div class="text-center mt-4 pt-4 border-top border-white border-opacity-10">
                <p class="text-sm text-white opacity-70 mb-0">
                    Belum punya akun?
                    <a href="{{ route('register') }}"
                        class="text-white text-decoration-none fw-bold hover-scale d-inline-block ms-1">
                        Daftar Gratis <i class="fas fa-arrow-right ms-1 small"></i>
                    </a>
                </p>
            </div>
        @endif -->
    </form>

    <style>
        .hover-scale {
            transition: all 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }

        .glass-input::placeholder {
            color: rgba(255, 255, 255, 0.45) !important;
        }
    </style>
</x-guest-layout>