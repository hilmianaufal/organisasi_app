@extends('layouts.guest')

@section('content')

<section
    class="relative pt-36 pb-24 px-6 overflow-hidden"
    x-data="{ selectedCategory: 'Semua' }">

    <div class="absolute top-20 right-0 w-96 h-96 bg-primary/20 blur-3xl rounded-full hero-glow"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="max-w-3xl section-reveal">
            <p class="text-primary-light font-semibold mb-4">Berita & Kegiatan</p>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
                Kabar Terbaru Forum
            </h1>

            <p class="mt-6 text-silver/80 text-lg leading-relaxed">
                Informasi kegiatan, dokumentasi, pengumuman, dan kabar terbaru dari Forum Mahasiswa KIP.
            </p>
        </div>

        <div class="flex flex-wrap gap-3 mt-10">
            <button
                type="button"
                @click="selectedCategory = 'Semua'"
                :class="selectedCategory === 'Semua'
                    ? 'bg-gradient-to-r from-primary-light to-primary text-dark'
                    : 'bg-white/5 text-silver hover:bg-primary/10 hover:text-primary-light'"
                class="px-5 py-3 rounded-full font-bold border border-primary/20 transition">
                Semua
            </button>

            @foreach($categories as $category)
                <button
                    type="button"
                    @click="selectedCategory = '{{ $category->slug }}'"
                    :class="selectedCategory === '{{ $category->slug }}'
                        ? 'bg-gradient-to-r from-primary-light to-primary text-dark'
                        : 'bg-white/5 text-silver hover:bg-primary/10 hover:text-primary-light'"
                    class="px-5 py-3 rounded-full font-bold border border-primary/20 transition">
                    {{ $category->name }}

                    <span class="ml-1 text-xs opacity-70">
                        {{ $category->news_count }}
                    </span>
                </button>
            @endforeach
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7 mt-12">

            @forelse ($news as $item)
                <article
                    x-show="selectedCategory === 'Semua' || selectedCategory === '{{ $item->category->slug ?? 'tanpa-kategori' }}'"
                    x-transition.opacity.duration.300ms
                    class="premium-card group bg-dark-card/80 border border-primary/10 rounded-[2rem] overflow-hidden hover:border-primary/50 transition duration-500">

                    <div class="overflow-hidden relative">
                        @if($item->image)
                            <img src="{{ asset($item->image) }}"
                                class="h-60 w-full object-cover group-hover:scale-110 transition duration-700">
                        @else
                            <div class="h-60 bg-gradient-to-br from-primary/40 to-dark-soft"></div>
                        @endif

                        <div class="absolute top-5 left-5">
                            <span class="px-4 py-2 rounded-full bg-dark/70 backdrop-blur-xl border border-primary/20 text-primary-light text-sm font-semibold">
                                {{ $item->category->name ?? 'Tanpa Kategori' }}
                            </span>
                        </div>
                    </div>

                    <div class="p-7">
                        <p class="text-sm text-primary-light">
                            {{ $item->published_at ?? $item->created_at->format('d M Y') }}
                        </p>

                        <h2 class="text-2xl font-bold mt-3 group-hover:text-primary-light transition">
                            {{ $item->title }}
                        </h2>

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
                <div class="lg:col-span-3 text-center text-silver/60 py-20">
                    Belum ada berita.
                </div>
            @endforelse

        </div>
    </div>
</section>

@endsection