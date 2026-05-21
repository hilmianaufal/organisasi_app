@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-7xl mx-auto">

        <div class="admin-page-header flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-10">
            <div>
                <p class="text-primary-light font-semibold mb-2">Informasi Forum</p>

                <h1 class="text-4xl md:text-5xl font-extrabold">
                    Pengumuman
                </h1>

                <p class="text-silver/70 mt-3 max-w-2xl">
                    Kelola pengumuman, agenda penting, dan informasi resmi organisasi.
                </p>
            </div>

            <a href="{{ route('admin.announcements.create') }}"
                class="group inline-flex items-center gap-3 bg-gradient-to-r from-primary-light to-primary text-dark px-7 py-4 rounded-full font-bold shadow-lg shadow-primary/20 hover:scale-105 transition duration-300">
                <span class="text-xl group-hover:rotate-90 transition duration-300">+</span>
                Tambah Pengumuman
            </a>
        </div>

        @if(session('success'))
            <div class="mb-8 bg-primary/10 border border-primary/20 text-primary-light rounded-3xl p-5">
                {{ session('success') }}
            </div>
        @endif

        @if($announcements->count())
            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-7">
                @foreach($announcements as $announcement)
                    <div class="group relative bg-dark-card/80 border border-primary/10 rounded-[2rem] p-7 overflow-hidden hover:border-primary/40 transition duration-500">

                        <div class="absolute -top-20 -right-20 w-56 h-56 bg-primary/10 blur-3xl rounded-full"></div>

                        <div class="relative z-10">
                            <div class="flex items-start justify-between gap-4 mb-6">
                                <div>
                                    <p class="text-sm text-primary-light">
                                        {{ $announcement->published_at ?? $announcement->created_at->format('d M Y') }}
                                    </p>

                                    <span class="inline-block mt-3 px-4 py-2 rounded-full bg-primary/10 border border-primary/20 text-primary-light text-sm font-semibold">
                                        Pengumuman
                                    </span>
                                </div>

                                <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary-light flex items-center justify-center text-2xl">
                                    📢
                                </div>
                            </div>

                            <h2 class="text-2xl font-extrabold leading-snug group-hover:text-primary-light transition">
                                {{ $announcement->title }}
                            </h2>

                            <p class="text-silver/70 mt-4 leading-relaxed line-clamp-5">
                                {{ $announcement->content }}
                            </p>

                            <div class="flex items-center gap-3 mt-8">
                                <a href="{{ route('admin.announcements.edit', $announcement->id) }}"
                                    class="flex-1 text-center bg-primary/10 hover:bg-primary/20 border border-primary/20 text-primary-light px-5 py-3 rounded-2xl font-semibold transition">
                                    Edit
                                </a>

                                <form action="{{ route('admin.announcements.destroy', $announcement->id) }}"
                                    method="POST"
                                    class="flex-1"
                                    onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="w-full bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 px-5 py-3 rounded-2xl font-semibold transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-dark-card/80 border border-primary/10 rounded-[2rem] p-16 text-center">
                <div class="text-7xl mb-6">📢</div>

                <h2 class="text-3xl font-extrabold">
                    Belum Ada Pengumuman
                </h2>

                <p class="text-silver/70 mt-4 max-w-lg mx-auto">
                    Tambahkan pengumuman resmi agar informasi penting dapat dibaca oleh pengunjung website.
                </p>

                <a href="{{ route('admin.announcements.create') }}"
                    class="inline-flex items-center gap-3 mt-8 bg-gradient-to-r from-primary-light to-primary text-dark px-7 py-4 rounded-full font-bold shadow-lg shadow-primary/20">
                    + Tambah Pengumuman
                </a>
            </div>
        @endif

    </div>
</section>

@endsection