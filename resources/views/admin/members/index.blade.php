@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-7xl mx-auto">

        <div class="admin-page-header flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-10">
            <div>
                <p class="text-primary-light font-semibold mb-2">Struktur Organisasi</p>

                <h1 class="text-4xl md:text-5xl font-extrabold">
                    Pengurus Forum
                </h1>

                <p class="text-silver/70 mt-3 max-w-2xl">
                    Kelola data pengurus, jabatan, divisi, dan foto struktur organisasi.
                </p>
            </div>

            <a href="{{ route('admin.members.create') }}"
                class="group inline-flex items-center gap-3 bg-gradient-to-r from-primary-light to-primary text-dark px-7 py-4 rounded-full font-bold shadow-lg shadow-primary/20 hover:scale-105 transition duration-300">
                <span class="text-xl group-hover:rotate-90 transition duration-300">+</span>
                Tambah Pengurus
            </a>
        </div>

        @if(session('success'))
            <div class="mb-8 bg-primary/10 border border-primary/20 text-primary-light rounded-3xl p-5">
                {{ session('success') }}
            </div>
        @endif

        @if($members->count())
            <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-7">
                @foreach($members as $member)
                    <div class="group relative bg-dark-card/80 border border-primary/10 rounded-[2rem] overflow-hidden hover:border-primary/40 transition duration-500">

                        <div class="relative overflow-hidden">
                            @if($member->photo)
                                <img src="{{ asset($member->photo) }}"
                                    class="w-full h-80 object-cover group-hover:scale-110 transition duration-700">
                            @else
                                <div class="w-full h-80 bg-gradient-to-br from-primary/30 to-dark-soft flex items-center justify-center text-6xl text-primary-light">
                                    👤
                                </div>
                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-dark via-dark/30 to-transparent"></div>

                            <div class="absolute top-5 left-5">
                                <span class="px-4 py-2 rounded-full bg-dark/70 backdrop-blur-xl border border-primary/20 text-primary-light text-sm font-semibold">
                                    {{ $member->division ?? 'Pengurus' }}
                                </span>
                            </div>

                            <div class="absolute bottom-5 left-5 right-5">
                                <h2 class="text-2xl font-extrabold leading-snug">
                                    {{ $member->name }}
                                </h2>

                                <p class="text-primary-light mt-1">
                                    {{ $member->position }}
                                </p>
                            </div>
                        </div>

                        <div class="relative p-7">
                            <p class="text-silver/70 leading-relaxed line-clamp-3">
                                {{ $member->description ?? 'Belum ada deskripsi.' }}
                            </p>

                            <div class="flex items-center gap-3 mt-8">
                                <a href="{{ route('admin.members.edit', $member->id) }}"
                                    class="flex-1 text-center bg-primary/10 hover:bg-primary/20 border border-primary/20 text-primary-light px-5 py-3 rounded-2xl font-semibold transition">
                                    Edit
                                </a>

                                <form action="{{ route('admin.members.destroy', $member->id) }}"
                                    method="POST"
                                    class="flex-1"
                                    onsubmit="return confirm('Yakin ingin menghapus pengurus ini?')">
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
                <div class="text-7xl mb-6">👥</div>

                <h2 class="text-3xl font-extrabold">
                    Belum Ada Pengurus
                </h2>

                <p class="text-silver/70 mt-4 max-w-lg mx-auto">
                    Tambahkan data pengurus agar struktur organisasi bisa tampil di halaman profil.
                </p>

                <a href="{{ route('admin.members.create') }}"
                    class="inline-flex items-center gap-3 mt-8 bg-gradient-to-r from-primary-light to-primary text-dark px-7 py-4 rounded-full font-bold shadow-lg shadow-primary/20">
                    + Tambah Pengurus
                </a>
            </div>
        @endif

    </div>
</section>

@endsection