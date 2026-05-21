@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-7xl mx-auto">

        <div class="dashboard-hero relative overflow-hidden rounded-[2rem] bg-dark-card/80 border border-primary/20 p-8 md:p-12 mb-8">
            <div class="absolute right-0 top-0 w-96 h-96 bg-primary/20 blur-3xl rounded-full hero-glow"></div>

            <div class="relative z-10">
                <p class="dashboard-badge text-primary-light font-semibold mb-3">
                    Dashboard Admin
                </p>

                <h1 class="dashboard-title text-4xl md:text-6xl font-extrabold leading-tight">
                    Selamat Datang,
                    <span class="text-primary-light">{{ Auth::user()->name }}</span>
                </h1>

                <p class="dashboard-text mt-5 text-silver/80 max-w-2xl">
                    Kelola berita, program kerja, galeri, pengurus, pengumuman, aspirasi,
                    dan settings website dari satu dashboard.
                </p>
            </div>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-6">
                <p class="text-silver/70">Total Berita</p>
                <h2 class="text-4xl font-black mt-3 text-primary-light">{{ $totalNews ?? 0 }}</h2>
            </div>

            <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-6">
                <p class="text-silver/70">Program</p>
                <h2 class="text-4xl font-black mt-3 text-primary-light">{{ $totalPrograms ?? 0 }}</h2>
            </div>

            <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-6">
                <p class="text-silver/70">Galeri</p>
                <h2 class="text-4xl font-black mt-3 text-silver">{{ $totalGalleries ?? 0 }}</h2>
            </div>

            <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-6">
                <p class="text-silver/70">Aspirasi</p>
                <h2 class="text-4xl font-black mt-3 text-silver">{{ $totalAspirations ?? 0 }}</h2>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <a href="{{ route('admin.news.index') }}"
                class="admin-card group bg-dark-card/80 border border-primary/10 rounded-[2rem] p-8 hover:border-primary/50 transition">
                <div class="w-14 h-14 rounded-2xl bg-primary/20 text-primary-light flex items-center justify-center text-2xl mb-6">
                    📰
                </div>
                <h3 class="text-2xl font-bold group-hover:text-primary-light">Kelola Berita</h3>
                <p class="text-silver/70 mt-3">Tambah, edit, hapus, dan upload gambar berita kegiatan.</p>
            </a>

            <a href="{{ route('admin.programs.index') }}"
                class="admin-card group bg-dark-card/80 border border-primary/10 rounded-[2rem] p-8 hover:border-primary/50 transition">
                <div class="w-14 h-14 rounded-2xl bg-primary/20 text-primary-light flex items-center justify-center text-2xl mb-6">
                    📌
                </div>
                <h3 class="text-2xl font-bold group-hover:text-primary-light">Kelola Program</h3>
                <p class="text-silver/70 mt-3">Atur program kerja, status kegiatan, dan deskripsi program.</p>
            </a>

            <a href="{{ route('admin.galleries.index') }}"
                class="admin-card group bg-dark-card/80 border border-primary/10 rounded-[2rem] p-8 hover:border-primary/50 transition">
                <div class="w-14 h-14 rounded-2xl bg-primary/20 text-primary-light flex items-center justify-center text-2xl mb-6">
                    🖼️
                </div>
                <h3 class="text-2xl font-bold group-hover:text-primary-light">Kelola Galeri</h3>
                <p class="text-silver/70 mt-3">Upload dokumentasi kegiatan organisasi ke halaman galeri.</p>
            </a>

            <a href="{{ route('admin.members.index') }}"
                class="admin-card group bg-dark-card/80 border border-primary/10 rounded-[2rem] p-8 hover:border-primary/50 transition">
                <div class="w-14 h-14 rounded-2xl bg-primary/20 text-primary-light flex items-center justify-center text-2xl mb-6">
                    👥
                </div>
                <h3 class="text-2xl font-bold group-hover:text-primary-light">Kelola Pengurus</h3>
                <p class="text-silver/70 mt-3">Atur struktur organisasi dan data pengurus forum.</p>
            </a>

            <a href="{{ route('admin.announcements.index') }}"
                class="admin-card group bg-dark-card/80 border border-primary/10 rounded-[2rem] p-8 hover:border-primary/50 transition">
                <div class="w-14 h-14 rounded-2xl bg-primary/20 text-primary-light flex items-center justify-center text-2xl mb-6">
                    📢
                </div>
                <h3 class="text-2xl font-bold group-hover:text-primary-light">Pengumuman</h3>
                <p class="text-silver/70 mt-3">Buat dan kelola informasi penting organisasi.</p>
            </a>

            <a href="{{ route('admin.settings.general') }}"
                class="admin-card group bg-dark-card/80 border border-primary/10 rounded-[2rem] p-8 hover:border-primary/50 transition">
                <div class="w-14 h-14 rounded-2xl bg-primary/20 text-primary-light flex items-center justify-center text-2xl mb-6">
                    ⚙️
                </div>
                <h3 class="text-2xl font-bold group-hover:text-primary-light">Settings</h3>
                <p class="text-silver/70 mt-3">Atur logo, identitas website, visi misi, dan kontak.</p>
            </a>
        </div>

    </div>
</section>

@endsection