<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $globalSetting->site_name ?? 'FORMAKIP' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark text-white">

@if(!Request::is('login') && !Request::is('register'))

@php
    $menus = [
        ['label' => 'Beranda', 'url' => '/', 'icon' => '⌂', 'active' => request()->is('/')],
        ['label' => 'Profil', 'url' => '/profil', 'icon' => '◈', 'active' => request()->is('profil')],
        ['label' => 'Program', 'url' => '/program', 'icon' => '✦', 'active' => request()->is('program')],
        ['label' => 'Berita', 'url' => '/berita', 'icon' => '✧', 'active' => request()->is('berita*')],
        ['label' => 'Galeri', 'url' => '/galeri', 'icon' => '▣', 'active' => request()->is('galeri')],
        ['label' => 'Pengumuman', 'url' => '/pengumuman', 'icon' => '◉', 'active' => request()->is('pengumuman')],
        ['label' => 'Kontak', 'url' => '/kontak', 'icon' => '✉', 'active' => request()->is('kontak')],
    ];
@endphp

<nav class="navbar-premium fixed top-0 left-0 w-full z-50">
    <div class="absolute inset-0 bg-dark/80 backdrop-blur-2xl border-b border-primary/20"></div>
    <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-primary-light/60 to-transparent"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-3">
        <div class="flex items-center justify-between gap-4">

            <a href="/" class="group flex items-center gap-3 min-w-0">
                <div class="relative">
                    <div class="absolute inset-0 bg-primary/30 blur-xl rounded-2xl group-hover:scale-125 transition duration-500"></div>

                    @if($globalSetting && $globalSetting->logo)
                        <img src="{{ asset($globalSetting->logo) }}"
                            class="relative w-12 h-12 rounded-2xl object-cover bg-black ring-1 ring-primary/30 group-hover:rotate-3 transition duration-500">
                    @else
                        <div class="relative w-12 h-12 rounded-2xl bg-gradient-to-br from-primary-light to-primary-dark flex items-center justify-center text-dark font-black">
                            F
                        </div>
                    @endif
                </div>

                <div class="min-w-0">
                    <p class="text-base sm:text-lg font-black tracking-tight truncate">
                        {{ $globalSetting->site_name ?? 'FORMAKIP' }}
                    </p>
                    <p class="hidden sm:block text-[11px] text-primary-light tracking-[0.25em] uppercase">
                        Student Forum
                    </p>
                </div>
            </a>

            <div class="hidden lg:flex items-center gap-1 rounded-full bg-white/5 border border-primary/20 p-1 shadow-2xl">
                @foreach($menus as $menu)
                    <a href="{{ $menu['url'] }}"
                        class="group relative flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold transition duration-300
                        {{ $menu['active']
                            ? 'text-dark bg-gradient-to-r from-primary-light to-primary shadow-lg shadow-primary/20'
                            : 'text-silver hover:text-white hover:bg-primary/10' }}">
                        <span class="transition duration-300 group-hover:scale-125">
                            {{ $menu['icon'] }}
                        </span>
                        <span>{{ $menu['label'] }}</span>
                    </a>
                @endforeach
            </div>

            <a href="/login"
                class="hidden lg:inline-block bg-gradient-to-r from-primary-light to-primary hover:from-primary hover:to-primary-light text-dark px-5 py-2.5 rounded-full font-bold transition duration-300 shadow-lg shadow-primary/20">
                Login Admin
            </a>

            <button id="menuButton"
                class="lg:hidden w-12 h-12 rounded-2xl bg-white/10 border border-primary/20 flex items-center justify-center">
                <span id="menuIconOpen" class="text-2xl text-primary-light">☰</span>
                <span id="menuIconClose" class="hidden text-3xl text-primary-light">×</span>
            </button>
        </div>
    </div>

    <div id="mobileMenu"
        class="hidden lg:hidden absolute left-4 right-4 top-[76px] rounded-[2rem] overflow-hidden bg-dark/95 backdrop-blur-2xl border border-primary/20 shadow-2xl">

        <div class="absolute inset-0 bg-gradient-to-br from-primary/15 via-transparent to-white/5"></div>

        <div class="relative p-4">
            <div class="grid gap-2">
                @foreach($menus as $menu)
                    <a href="{{ $menu['url'] }}"
                        class="mobile-link flex items-center gap-3 px-4 py-4 rounded-2xl font-semibold transition duration-300
                        {{ $menu['active']
                            ? 'bg-gradient-to-r from-primary-light to-primary text-dark'
                            : 'bg-white/5 text-silver hover:bg-primary/10 hover:text-white' }}">

                        <span class="w-10 h-10 rounded-xl flex items-center justify-center
                            {{ $menu['active'] ? 'bg-dark/10' : 'bg-primary/10 text-primary-light' }}">
                            {{ $menu['icon'] }}
                        </span>

                        <span>{{ $menu['label'] }}</span>
                    </a>
                @endforeach
            </div>

            <a href="/login"
                class="mt-4 flex items-center justify-center gap-2 bg-gradient-to-r from-primary-light to-primary text-dark px-5 py-4 rounded-2xl font-bold transition">
                ⚡ Login Admin
            </a>
        </div>
    </div>
</nav>
@endif
<main>
    @yield('content')
</main>
@if(!Request::is('login') && !Request::is('register'))




<footer class="bg-dark border-t border-primary/20">
    <div class="max-w-7xl mx-auto px-6 py-14 grid md:grid-cols-4 gap-10">
        <div class="md:col-span-2">
            <h2 class="text-2xl font-black text-primary-light">
                {{ $globalSetting->site_name ?? 'FORMAKIP' }}
            </h2>

            <p class="text-silver/80 mt-4 max-w-md">
                {{ $globalSetting->site_description ?? 'Website resmi Forum Mahasiswa KIP sebagai pusat informasi, program kerja, berita, dan aspirasi mahasiswa.' }}
            </p>
        </div>

        <div>
            <h3 class="font-bold mb-4 text-white">Menu</h3>
            <div class="flex flex-col gap-3 text-silver/80">
                <a href="/profil" class="hover:text-primary-light">Profil</a>
                <a href="/program" class="hover:text-primary-light">Program</a>
                <a href="/berita" class="hover:text-primary-light">Berita</a>
                <a href="/galeri" class="hover:text-primary-light">Galeri</a>
                <a href="/pengumuman" class="hover:text-primary-light">Pengumuman</a>
            </div>
        </div>

        <div>
            <h3 class="font-bold mb-4 text-white">Kontak</h3>
            <div class="flex flex-col gap-3 text-silver/80">
                <p>{{ $globalSetting->address ?? 'UIN SSC' }}</p>
                <p>{{ $globalSetting->email ?? 'forumkip@uinssc.ac.id' }}</p>
                <p>{{ $globalSetting->instagram ?? '@formkip' }}</p>
            </div>
        </div>
    </div>

    <div class="border-t border-primary/20 py-5 text-center text-silver/50 text-sm">
        © {{ date('Y') }} {{ $globalSetting->site_name ?? 'FORMAKIP' }}. All rights reserved.
    </div>
</footer>

@endif
<script>
    const menuButton = document.getElementById('menuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIconOpen = document.getElementById('menuIconOpen');
    const menuIconClose = document.getElementById('menuIconClose');

    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIconOpen.classList.toggle('hidden');
            menuIconClose.classList.toggle('hidden');
        });
    }
</script>

</body>
</html>