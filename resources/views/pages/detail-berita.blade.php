@extends('layouts.guest')

@section('content')

<section class="relative pt-36 pb-24 overflow-hidden">
    <div class="absolute top-20 right-0 w-96 h-96 bg-primary/20 blur-3xl rounded-full hero-glow"></div>

    <div class="max-w-5xl mx-auto px-6 relative z-10">

        <div class="section-reveal">

            <a href="/berita"
                class="inline-flex items-center gap-2 text-primary-light hover:text-primary mb-8 font-semibold">
                ← Kembali ke Berita
            </a>

            <p class="text-sm text-primary-light">
                {{ $news->published_at ?? $news->created_at->format('d M Y') }}
            </p>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mt-5">
                {{ $news->title }}
            </h1>

            <p class="mt-6 text-silver/70 text-lg leading-relaxed max-w-3xl">
                {{ $news->excerpt }}
            </p>

        </div>

        @if($news->image)
            <div class="section-reveal mt-14">
                <div class="relative overflow-hidden rounded-[2rem] border border-primary/10">
                    <img src="{{ asset($news->image) }}"
                        class="w-full h-[500px] object-cover hover:scale-105 transition duration-700">
                </div>
            </div>
        @endif

        <div class="section-reveal mt-14">
            <div class="bg-dark-card/80 border border-primary/10 rounded-[2rem] p-7 md:p-10 backdrop-blur-xl">

                <div class="prose prose-invert prose-lg max-w-none
                    prose-headings:text-white
                    prose-p:text-silver/80
                    prose-strong:text-primary-light
                    prose-a:text-primary-light
                    prose-li:text-silver/80">

                    {!! nl2br($news->content) !!}

                </div>

            </div>
        </div>

        <div class="section-reveal mt-14">
            <div class="bg-gradient-to-br from-primary/20 to-white/5 border border-primary/20 rounded-[2rem] p-8 md:p-10">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                    <div>
                        <p class="text-primary-light font-semibold mb-3">
                            Informasi Forum
                        </p>

                        <h2 class="text-3xl md:text-4xl font-extrabold">
                            Ikuti Kegiatan Forum Mahasiswa KIP
                        </h2>

                        <p class="text-silver/80 mt-4 max-w-2xl">
                            Dapatkan informasi terbaru tentang kegiatan,
                            program kerja, dan pengumuman organisasi.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4">
                        <a href="/program"
                            class="bg-gradient-to-r from-primary-light to-primary hover:from-primary hover:to-primary-light text-dark px-7 py-4 rounded-full font-bold transition duration-300">
                            Lihat Program
                        </a>

                        <a href="/pengumuman"
                            class="border border-primary/30 hover:border-primary-light hover:bg-primary/10 text-silver px-7 py-4 rounded-full font-bold transition duration-300">
                            Pengumuman
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>

@endsection