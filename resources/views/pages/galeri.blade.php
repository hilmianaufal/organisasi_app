@extends('layouts.guest')

@section('content')

<section class="relative pt-36 pb-24 px-6 overflow-hidden">
    <div class="absolute top-20 right-0 w-96 h-96 bg-primary/20 blur-3xl rounded-full hero-glow"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="max-w-3xl section-reveal">
            <p class="text-primary-light font-semibold mb-4">Galeri Kegiatan</p>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
                Dokumentasi Forum
            </h1>

            <p class="mt-6 text-silver/80 text-lg leading-relaxed">
                Kumpulan dokumentasi kegiatan, program kerja, dan momen kebersamaan Forum Mahasiswa KIP.
            </p>
        </div>
    </div>
</section>

<section class="pb-24 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">

            @forelse ($galleries as $gallery)
                <div class="premium-card group relative h-80 rounded-[2rem] overflow-hidden border border-primary/10 bg-dark-card/80 hover:border-primary/50 transition duration-500">
                    <img src="{{ asset($gallery->image) }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-dark via-dark/50 to-transparent"></div>

                    <div class="absolute bottom-0 left-0 right-0 p-7">
                        <p class="text-sm text-primary-light">
                            {{ $gallery->activity_date ?? 'Dokumentasi' }}
                        </p>

                        <h2 class="text-2xl font-bold mt-2">
                            {{ $gallery->title }}
                        </h2>

                        <p class="text-silver/80 text-sm mt-3 line-clamp-2">
                            {{ $gallery->description }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="lg:col-span-3 text-center text-silver/60 py-20">
                    Belum ada galeri.
                </div>
            @endforelse

        </div>
    </div>
</section>

@endsection