<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - FORMKIP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark text-white" x-data="{ adminMenuOpen: false }">

@php
    $adminMenus = [
        ['label' => 'Dashboard', 'route' => '/dashboard', 'icon' => '⌂', 'active' => request()->is('dashboard')],
        [
                'label' => 'Kategori',
                'route' => route('admin.categories.index'),
                'icon' => '🏷️',
                'active' => request()->is('admin/categories*')
            ],
        ['label' => 'Berita', 'route' => route('admin.news.index'), 'icon' => '📰', 'active' => request()->is('admin/news*')],
        ['label' => 'Program', 'route' => route('admin.programs.index'), 'icon' => '📌', 'active' => request()->is('admin/programs*')],
        ['label' => 'Galeri', 'route' => route('admin.galleries.index'), 'icon' => '🖼️', 'active' => request()->is('admin/galleries*')],
        ['label' => 'Pengurus', 'route' => route('admin.members.index'), 'icon' => '👥', 'active' => request()->is('admin/members*')],
        ['label' => 'Pengumuman', 'route' => route('admin.announcements.index'), 'icon' => '📢', 'active' => request()->is('admin/announcements*')],
        ['label' => 'Aspirasi', 'route' => route('admin.aspirations.index'), 'icon' => '💬', 'active' => request()->is('admin/aspirations*')],
        ['label' => 'Settings', 'route' => route('admin.settings.general'), 'icon' => '⚙️', 'active' => request()->is('admin/settings*')],
    ];
@endphp

<nav class="admin-navbar fixed top-0 left-0 w-full z-[9998]">
    <div class="absolute inset-0 bg-dark/90 backdrop-blur-2xl border-b border-primary/20"></div>
    <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-primary-light/60 to-transparent"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-3">
        <div class="flex items-center justify-between gap-4">

            <a href="/dashboard" class="group flex items-center gap-3 font-bold min-w-0">
                <div class="relative">
                    <div class="absolute inset-0 bg-primary/30 blur-xl rounded-2xl group-hover:scale-125 transition duration-500"></div>

                    @if($globalSetting && $globalSetting->logo)
                        <img src="{{ asset($globalSetting->logo) }}"
                            class="relative w-11 h-11 rounded-2xl object-cover bg-black ring-1 ring-primary/30 group-hover:rotate-3 transition duration-500">
                    @else
                        <div class="relative w-11 h-11 rounded-2xl bg-gradient-to-br from-primary-light to-primary flex items-center justify-center text-dark font-black ring-1 ring-primary/30 group-hover:rotate-3 transition duration-500">
                            A
                        </div>
                    @endif
                </div>

                <div class="min-w-0">
                    <p class="text-lg font-black truncate">Admin</p>
                    <p class="hidden sm:block text-[11px] text-primary-light tracking-[0.25em] uppercase">
                        FORMAKIP
                    </p>
                </div>
            </a>

<div class="hidden xl:flex items-center gap-2">

    {{-- MENU UTAMA --}}
    <div class="flex items-center gap-1 rounded-full bg-white/5 border border-primary/20 p-1 shadow-2xl">

        <a href="/dashboard"
            class="group relative flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold transition duration-300
            {{ request()->is('dashboard')
                ? 'bg-gradient-to-r from-primary-light to-primary text-dark shadow-lg shadow-primary/20'
                : 'text-silver hover:bg-primary/10 hover:text-primary-light' }}">

            <span>⌂</span>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.news.index') }}"
            class="group relative flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold transition duration-300
            {{ request()->is('admin/news*')
                ? 'bg-gradient-to-r from-primary-light to-primary text-dark shadow-lg shadow-primary/20'
                : 'text-silver hover:bg-primary/10 hover:text-primary-light' }}">

            <span>📰</span>
            <span>Berita</span>
        </a>

        <a href="{{ route('admin.programs.index') }}"
            class="group relative flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold transition duration-300
            {{ request()->is('admin/programs*')
                ? 'bg-gradient-to-r from-primary-light to-primary text-dark shadow-lg shadow-primary/20'
                : 'text-silver hover:bg-primary/10 hover:text-primary-light' }}">

            <span>📌</span>
            <span>Program</span>
        </a>

    </div>

    {{-- DROPDOWN KONTEN --}}
    <div class="relative" x-data="{ open: false }">

        <button
            @click="open = !open"
            class="flex items-center gap-2 px-5 py-3 rounded-full bg-white/5 border border-primary/20 text-silver hover:text-primary-light transition">

            📂 Konten
            <span>⌄</span>
        </button>

        <div
            x-show="open"
            @click.outside="open = false"
            x-transition
            x-cloak
            class="absolute right-0 mt-3 w-64 rounded-[2rem] bg-dark-card/95 backdrop-blur-2xl border border-primary/20 shadow-2xl overflow-hidden z-[9999]">

            <div class="p-3 space-y-2">

                <a href="{{ route('admin.categories.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-primary/10 transition">
                    🏷️ Kategori
                </a>

                <a href="{{ route('admin.galleries.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-primary/10 transition">
                    🖼️ Galeri
                </a>

                <a href="{{ route('admin.announcements.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-primary/10 transition">
                    📢 Pengumuman
                </a>

                <a href="{{ route('admin.aspirations.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-primary/10 transition">
                    💬 Aspirasi
                </a>

            </div>

        </div>

    </div>

    {{-- DROPDOWN ORGANISASI --}}
    <div class="relative" x-data="{ open: false }">

        <button
            @click="open = !open"
            class="flex items-center gap-2 px-5 py-3 rounded-full bg-white/5 border border-primary/20 text-silver hover:text-primary-light transition">

            ⚙️ Organisasi
            <span>⌄</span>
        </button>

        <div
            x-show="open"
            @click.outside="open = false"
            x-transition
            x-cloak
            class="absolute right-0 mt-3 w-64 rounded-[2rem] bg-dark-card/95 backdrop-blur-2xl border border-primary/20 shadow-2xl overflow-hidden z-[9999]">

            <div class="p-3 space-y-2">

                <a href="{{ route('admin.members.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-primary/10 transition">
                    👥 Pengurus
                </a>

                <a href="{{ route('admin.settings.general') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl hover:bg-primary/10 transition">
                    ⚙️ Settings
                </a>

            </div>

        </div>

    </div>

</div>

            <div class="hidden xl:flex items-center gap-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="bg-gradient-to-r from-red-500 to-red-600 text-white px-5 py-2.5 rounded-full font-bold">
                        Logout
                    </button>
                </form>
            </div>

            <button
                @click="adminMenuOpen = !adminMenuOpen"
                type="button"
                class="xl:hidden w-12 h-12 rounded-2xl bg-white/10 border border-primary/20 flex items-center justify-center">

                <span x-show="!adminMenuOpen" class="text-2xl text-primary-light">☰</span>
                <span x-show="adminMenuOpen" x-cloak class="text-3xl text-primary-light">×</span>
            </button>

        </div>
    </div>
</nav>

<div
    x-show="adminMenuOpen"
    x-transition.opacity.duration.200ms
    @click="adminMenuOpen = false"
    x-cloak
    class="xl:hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-[9998]">
</div>

<div
    x-show="adminMenuOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-5 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 -translate-y-5 scale-95"
    x-cloak
    class="xl:hidden fixed left-4 right-4 top-24 max-h-[75vh] overflow-y-auto rounded-[2rem] bg-dark/95 backdrop-blur-2xl border border-primary/20 shadow-2xl z-[9999]">

    <div class="absolute inset-0 bg-gradient-to-br from-primary/15 via-transparent to-white/5"></div>

    <div class="relative p-4 grid gap-2">
        @foreach($adminMenus as $menu)
            <a href="{{ $menu['route'] }}"
                class="flex items-center gap-3 px-4 py-4 rounded-2xl transition duration-300
                {{ $menu['active']
                    ? 'bg-gradient-to-r from-primary-light to-primary text-dark'
                    : 'bg-white/5 text-silver hover:bg-primary/10 hover:text-primary-light' }}">

                <span class="w-10 h-10 rounded-xl flex items-center justify-center
                    {{ $menu['active']
                        ? 'bg-dark/10'
                        : 'bg-primary/10 text-primary-light' }}">
                    {{ $menu['icon'] }}
                </span>

                <span class="font-semibold">{{ $menu['label'] }}</span>
            </a>
        @endforeach

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full flex items-center justify-center gap-2 bg-red-500 text-white px-5 py-4 rounded-2xl font-bold">
                🚪 Logout
            </button>
        </form>
    </div>
</div>

<main class="pt-28">
    @yield('content')
</main>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>