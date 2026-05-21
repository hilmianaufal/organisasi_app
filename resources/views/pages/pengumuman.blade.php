@extends('layouts.guest')

@section('content')

<section class="relative pt-36 pb-20 px-6 overflow-hidden">
    <div class="absolute top-20 right-0 w-96 h-96 bg-primary/20 blur-3xl rounded-full hero-glow"></div>

    <div class="max-w-5xl mx-auto text-center relative z-10 section-reveal">
        <p class="text-primary-light font-semibold mb-4">Pengumuman</p>

        <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
            Informasi Penting Forum
        </h1>

        <p class="mt-6 text-silver/80 text-lg leading-relaxed max-w-2xl mx-auto">
            Daftar pengumuman, agenda, dan informasi penting Forum Mahasiswa KIP.
        </p>
    </div>
</section>

<section class="pb-24 px-6">
    <div class="max-w-4xl mx-auto space-y-6">
        @forelse ($announcements as $announcement)
            <article class="premium-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-6 md:p-8 hover:border-primary/50 transition duration-500">
                <p class="text-sm text-primary-light">
                    {{ $announcement->published_at ?? $announcement->created_at->format('d M Y') }}
                </p>

                <h2 class="text-2xl md:text-3xl font-bold mt-3">
                    {{ $announcement->title }}
                </h2>

                <p class="text-silver/80 mt-5 leading-relaxed">
                    {!! nl2br(e($announcement->content)) !!}
                </p>
            </article>
        @empty
            <div class="text-center text-silver/60 py-20">
                Belum ada pengumuman.
            </div>
        @endforelse
    </div>
</section>

@endsection