@extends('layouts.guest')

@section('content')

<section class="relative min-h-screen flex items-center pt-28 pb-20 overflow-hidden">
    <div class="absolute top-20 right-0 w-96 h-96 bg-primary/20 blur-3xl rounded-full hero-glow"></div>
    <div class="absolute bottom-10 left-0 w-96 h-96 bg-primary-light/10 blur-3xl rounded-full parallax-soft"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(250,204,21,0.12),transparent_35%),radial-gradient(circle_at_bottom_left,rgba(212,160,23,0.08),transparent_35%)]"></div>

    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-14 items-center relative z-10">
        <div>
            <p class="hero-badge inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-full bg-primary/10 text-primary-light border border-primary/20 text-sm">
                <span class="w-2 h-2 bg-primary-light rounded-full animate-pulse"></span>
                {{ $globalSetting->site_name ?? 'FORMKIP' }}
            </p>

            <h1 class="hero-title text-4xl sm:text-5xl md:text-7xl font-extrabold leading-tight">
                {{ $globalSetting->hero_title ?? 'Bergerak Bersama,' }}
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-primary-light via-primary to-silver">
                    Bertumbuh Berdampak.
                </span>
            </h1>

            <p class="hero-text mt-7 text-silver/80 text-lg leading-relaxed max-w-xl">
                {{ $globalSetting->hero_subtitle ?? $globalSetting->site_description ?? 'Website resmi Forum Mahasiswa KIP sebagai pusat informasi organisasi, program kerja, berita kegiatan, galeri, dan aspirasi mahasiswa.' }}
            </p>

            <div class="hero-actions mt-9 flex flex-wrap gap-4">
                <a href="{{ $globalSetting->hero_button_link ?? '/program' }}"
                    class="group bg-gradient-to-r from-primary-light to-primary hover:from-primary hover:to-primary-light text-dark px-7 py-4 rounded-full font-bold transition duration-300 shadow-lg shadow-primary/20">
                    {{ $globalSetting->hero_button_text ?? 'Lihat Program' }}
                    <span class="inline-block group-hover:translate-x-1 transition">→</span>
                </a>

                <a href="/profil"
                    class="border border-primary/30 hover:border-primary-light hover:bg-primary/10 px-7 py-4 rounded-full font-bold transition duration-300 text-silver">
                    Tentang Kami
                </a>
            </div>
        </div>

        <div class="relative">
            <div class="absolute inset-0 bg-primary/20 blur-3xl rounded-full hero-glow"></div>

            <div class="hero-card relative bg-dark-card/80 border border-primary/20 rounded-[2rem] p-6 sm:p-8 backdrop-blur-xl shadow-2xl">
                @if($globalSetting && $globalSetting->hero_image)
                    <img src="{{ asset($globalSetting->hero_image) }}"
                        class="w-full h-64 object-cover rounded-3xl mb-6 border border-primary/20">
                @endif

                <div class="flex items-center justify-between mb-8">
                    <div>
                        <p class="text-silver/60 text-sm">Ringkasan Organisasi</p>
                        <h2 class="text-2xl font-bold text-primary-light">
                            {{ $globalSetting->site_name ?? 'FORMKIP' }}
                        </h2>
                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-primary/20 flex items-center justify-center text-2xl text-primary-light">
                        ✦
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="premium-card bg-dark/80 p-5 rounded-3xl border border-primary/10">
                        <p class="text-3xl font-extrabold text-primary-light">{{ $totalPrograms ?? 0 }}+</p>
                        <p class="text-silver/70 text-sm mt-1">Program</p>
                    </div>

                    <div class="premium-card bg-dark/80 p-5 rounded-3xl border border-primary/10">
                        <p class="text-3xl font-extrabold text-primary-light">{{ $totalNews ?? 0 }}+</p>
                        <p class="text-silver/70 text-sm mt-1">Berita</p>
                    </div>

                    <div class="premium-card bg-dark/80 p-5 rounded-3xl border border-primary/10">
                        <p class="text-3xl font-extrabold text-silver">{{ $totalGalleries ?? 0 }}+</p>
                        <p class="text-silver/70 text-sm mt-1">Galeri</p>
                    </div>

                    <div class="premium-card bg-dark/80 p-5 rounded-3xl border border-primary/10">
                        <p class="text-3xl font-extrabold text-silver">{{ $totalMembers ?? 0 }}+</p>
                        <p class="text-silver/70 text-sm mt-1">Pengurus</p>
                    </div>
                </div>

                <div class="mt-6 bg-dark/80 p-5 rounded-3xl border border-primary/10">
                    <p class="text-primary-light font-bold">Aspirasi Mahasiswa</p>
                    <p class="text-silver/70 text-sm mt-1">
                        Ruang terbuka untuk menyampaikan saran, masukan, dan ide.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-reveal py-24 bg-dark-soft/60 overflow-hidden border-y border-primary/10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-14 items-center">
            <div>
                <p class="text-primary-light font-semibold mb-3">Tentang Organisasi</p>

                <h2 class="text-3xl md:text-5xl font-extrabold leading-tight">
                    Wadah Kolaborasi Mahasiswa KIP yang Aktif dan Berprestasi
                </h2>

                <p class="mt-6 text-silver/80 leading-relaxed">
                    Forum Mahasiswa KIP hadir sebagai ruang pengembangan diri,
                    solidaritas, kepemimpinan, dan kontribusi nyata bagi kampus serta masyarakat.
                </p>

                <a href="/profil"
                    class="inline-block mt-8 text-primary-light font-semibold hover:text-primary">
                    Lihat Profil Organisasi →
                </a>
            </div>

            <div class="grid sm:grid-cols-2 gap-5">
                <div class="premium-card bg-dark-card/80 border border-primary/10 rounded-3xl p-7">
                    <h3 class="text-4xl font-extrabold text-primary-light">{{ $totalMembers ?? 0 }}+</h3>
                    <p class="text-silver/80 mt-2">Pengurus</p>
                </div>

                <div class="premium-card bg-dark-card/80 border border-primary/10 rounded-3xl p-7">
                    <h3 class="text-4xl font-extrabold text-primary-light">{{ $totalPrograms ?? 0 }}+</h3>
                    <p class="text-silver/80 mt-2">Program Kerja</p>
                </div>

                <div class="premium-card bg-dark-card/80 border border-primary/10 rounded-3xl p-7">
                    <h3 class="text-4xl font-extrabold text-silver">{{ $totalGalleries ?? 0 }}+</h3>
                    <p class="text-silver/80 mt-2">Dokumentasi</p>
                </div>

                <div class="premium-card bg-dark-card/80 border border-primary/10 rounded-3xl p-7">
                    <h3 class="text-4xl font-extrabold text-silver">{{ $totalNews ?? 0 }}+</h3>
                    <p class="text-silver/80 mt-2">Berita</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-reveal py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-14">
            <div>
                <p class="text-primary-light font-semibold mb-3">Program Unggulan</p>
                <h2 class="text-3xl md:text-5xl font-extrabold">
                    Program Terbaru Forum
                </h2>
                <p class="text-silver/70 mt-4 max-w-2xl">
                    Agenda dan kegiatan terbaru untuk mendukung pengembangan mahasiswa.
                </p>
            </div>

            <a href="/program" class="text-primary-light font-semibold hover:text-primary">
                Lihat Semua Program →
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">
            @forelse ($latestPrograms as $program)
                <article class="premium-card group bg-dark-card/80 border border-primary/10 rounded-[2rem] overflow-hidden hover:border-primary/50 transition duration-500">
                    <div class="overflow-hidden">
                        @if($program->image)
                            <img src="{{ asset($program->image) }}"
                                class="h-60 w-full object-cover group-hover:scale-110 transition duration-700">
                        @else
                            <div class="h-60 bg-gradient-to-br from-primary/40 to-dark-soft"></div>
                        @endif
                    </div>

                    <div class="p-7">
                        <span class="inline-block px-3 py-1 rounded-full text-sm bg-primary/10 text-primary-light border border-primary/20">
                            {{ $program->status }}
                        </span>

                        <h3 class="text-2xl font-bold mt-5 group-hover:text-primary-light transition">
                            {{ $program->title }}
                        </h3>

                        <p class="text-silver/70 mt-3 line-clamp-3">
                            {{ $program->description }}
                        </p>

                        <p class="text-sm text-silver/50 mt-5">
                            {{ $program->program_date ?? 'Tanggal belum ditentukan' }}
                        </p>
                    </div>
                </article>
            @empty
                <div class="lg:col-span-3 text-center text-silver/60 py-16">
                    Belum ada program.
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="section-reveal py-24 bg-dark-soft/60 overflow-hidden border-y border-primary/10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-14">
            <div>
                <p class="text-primary-light font-semibold mb-3">Berita Terbaru</p>
                <h2 class="text-3xl md:text-5xl font-extrabold">
                    Kabar & Kegiatan Forum
                </h2>
                <p class="text-silver/70 mt-4 max-w-2xl">
                    Informasi terbaru seputar kegiatan dan dokumentasi organisasi.
                </p>
            </div>

            <a href="/berita" class="text-primary-light font-semibold hover:text-primary">
                Lihat Semua Berita →
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">
            @forelse ($latestNews as $item)
                <article class="premium-card group bg-dark-card/80 border border-primary/10 rounded-[2rem] overflow-hidden hover:border-primary/50 transition duration-500">
                    <div class="overflow-hidden">
                        @if($item->image)
                            <img src="{{ asset($item->image) }}"
                                class="h-60 w-full object-cover group-hover:scale-110 transition duration-700">
                        @else
                            <div class="h-60 bg-gradient-to-br from-primary/40 to-dark-soft"></div>
                        @endif
                    </div>

                    <div class="p-7">
                        <p class="text-sm text-primary-light">
                            {{ $item->published_at ?? $item->created_at->format('d M Y') }}
                        </p>

                        <h3 class="text-2xl font-bold mt-3 group-hover:text-primary-light transition">
                            {{ $item->title }}
                        </h3>

                        <p class="text-silver/70 mt-3 line-clamp-3">
                            {{ $item->excerpt }}
                        </p>

                        <a href="/berita/{{ $item->slug }}"
                            class="inline-block mt-6 text-primary-light font-semibold hover:text-primary">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>
            @empty
                <div class="lg:col-span-3 text-center text-silver/60 py-16">
                    Belum ada berita.
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="section-reveal py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="relative rounded-[2rem] bg-gradient-to-br from-primary/20 to-white/5 border border-primary/20 p-8 md:p-12 overflow-hidden">
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-primary/20 blur-3xl rounded-full hero-glow"></div>

            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
                <div>
                    <p class="text-primary-light font-semibold mb-3">Aspirasi Mahasiswa</p>
                    <h2 class="text-3xl md:text-5xl font-extrabold">
                        Punya Saran untuk Forum?
                    </h2>
                    <p class="text-silver/80 mt-4 max-w-2xl">
                        Kirim aspirasi, kritik, saran, atau ide kegiatan untuk pengembangan forum.
                    </p>
                </div>

                <a href="/kontak"
                    class="bg-gradient-to-r from-primary-light to-primary hover:from-primary hover:to-primary-light text-dark px-8 py-4 rounded-full font-bold transition duration-300 text-center">
                    Kirim Aspirasi
                </a>
            </div>
        </div>
    </div>
</section>

@endsection