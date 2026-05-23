@extends('layouts.guest')

@section('content')

<section class="auth-page relative min-h-screen flex items-center justify-center px-6 py-20 overflow-hidden">

    {{-- BACKGROUND EFFECT --}}
    <div class="absolute inset-0 overflow-hidden">

        <div class="hero-glow absolute top-0 right-0 w-[500px] h-[500px] bg-primary/20 blur-3xl rounded-full"></div>

        <div class="parallax-soft absolute bottom-0 left-0 w-[500px] h-[500px] bg-primary-light/10 blur-3xl rounded-full"></div>

        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.08),transparent_30%)]"></div>

    </div>

    <div class="relative z-10 w-full max-w-6xl grid lg:grid-cols-2 gap-12 items-center">

        {{-- LEFT CONTENT --}}
        <div class="hidden lg:block">

            <p class="auth-badge text-primary-light font-semibold mb-4 tracking-[0.2em] uppercase">
                Administrator Access
            </p>

            <h1 class="auth-heading text-5xl xl:text-6xl font-black leading-tight">
                Dashboard
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-primary-light to-primary">
                    {{ $globalSetting->site_name ?? 'FORMAKIP' }}
                </span>
            </h1>

            <p class="auth-description text-silver/70 mt-8 text-lg leading-relaxed max-w-xl">
                Kelola berita, pengumuman, galeri, program kerja,
                pengurus organisasi, aspirasi mahasiswa,
                dan pengaturan website dalam satu dashboard modern.
            </p>

        </div>

        {{-- LOGIN CARD --}}
        <div class="w-full max-w-md mx-auto">

            <div class="auth-card relative bg-dark-card/80 backdrop-blur-2xl border border-primary/20 rounded-[2.5rem] p-7 md:p-9 shadow-[0_20px_80px_rgba(0,0,0,0.45)] overflow-hidden">

                {{-- glow --}}
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary/20 blur-3xl rounded-full"></div>

                <div class="relative z-10">

                    {{-- LOGO --}}
                    <div class="flex flex-col items-center text-center mb-10">

                        <div class="auth-logo relative mb-6">

                            <div class="absolute inset-0 bg-primary/30 blur-2xl rounded-full scale-110"></div>

                            @if($globalSetting && $globalSetting->logo)

                                <img
                                    src="{{ asset($globalSetting->logo) }}"
                                    alt="Logo"
                                    class="relative w-28 h-28 object-cover rounded-[2rem] border border-primary/30 bg-dark shadow-2xl">

                            @else

                                <div class="relative w-28 h-28 rounded-[2rem] bg-gradient-to-br from-primary-light to-primary flex items-center justify-center text-dark text-5xl font-black shadow-2xl">
                                    F
                                </div>

                            @endif

                        </div>

                        <h2 class="auth-title text-4xl font-black">
                            Login Admin
                        </h2>

                        <p class="auth-subtitle text-silver/70 mt-3">
                            {{ $globalSetting->site_name ?? 'FORMAKIP' }}
                        </p>

                    </div>

                    {{-- ERROR --}}
                    @if ($errors->any())
                        <div class="mb-6 bg-red-500/10 border border-red-500/20 text-red-400 rounded-2xl p-4 text-sm">
                            Email atau password tidak sesuai.
                        </div>
                    @endif

                    {{-- FORM --}}
                    <form method="POST"
                        action="{{ route('login') }}"
                        class="auth-form space-y-5">

                        @csrf

                        {{-- EMAIL --}}
                        <div class="auth-input">

                            <label class="block mb-3 text-silver/80">
                                Email
                            </label>

                            <div class="relative">

                                <span class="absolute left-5 top-1/2 -translate-y-1/2 text-primary-light text-lg">
                                    ✉
                                </span>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    placeholder="Masukkan email"
                                    class="w-full bg-dark border border-primary/10 rounded-2xl pl-14 pr-5 py-4 text-white placeholder:text-silver/40 focus:border-primary-light focus:ring-0 transition duration-300">

                            </div>

                        </div>

                        {{-- PASSWORD --}}
                        <div class="auth-input">

                            <label class="block mb-3 text-silver/80">
                                Password
                            </label>

                            <div class="relative">

                                <span class="absolute left-5 top-1/2 -translate-y-1/2 text-primary-light text-lg">
                                    🔒
                                </span>

                                <input
                                    type="password"
                                    name="password"
                                    required
                                    placeholder="Masukkan password"
                                    class="w-full bg-dark border border-primary/10 rounded-2xl pl-14 pr-5 py-4 text-white placeholder:text-silver/40 focus:border-primary-light focus:ring-0 transition duration-300">

                            </div>

                        </div>

                        {{-- OPTIONS --}}
                        <div class="auth-input flex items-center justify-between gap-4 text-sm">

                            <label class="flex items-center gap-2 text-silver/70">

                                <input
                                    type="checkbox"
                                    name="remember"
                                    class="rounded bg-dark border-primary/20 text-primary focus:ring-primary">

                                Remember me

                            </label>

                            @if (Route::has('password.request'))

                                <a href="{{ route('password.request') }}"
                                    class="text-primary-light hover:text-primary font-semibold transition">

                                    Lupa Password?

                                </a>

                            @endif

                        </div>

                        {{-- BUTTON --}}
                        <button
                            type="submit"
                            class="auth-button group relative w-full overflow-hidden bg-gradient-to-r from-primary-light to-primary hover:from-primary hover:to-primary-light text-dark font-black py-4 rounded-2xl transition duration-500 shadow-[0_10px_40px_rgba(255,215,0,0.2)]">

                            <span class="relative z-10 flex items-center justify-center gap-3">

                                <span class="group-hover:translate-x-1 transition duration-300">
                                    Login Dashboard
                                </span>

                                <span class="group-hover:translate-x-1 transition duration-300">
                                    →
                                </span>

                            </span>

                            <div class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition duration-500"></div>

                        </button>

                        {{-- REGISTER --}}
                        <p class="auth-input text-center text-sm text-silver/70 pt-2">

                            Belum punya akun?

                        </p>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>