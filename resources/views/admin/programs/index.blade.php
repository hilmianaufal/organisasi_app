@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-7xl mx-auto">

        <div class="admin-page-header flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-10">

            <div>
                <p class="text-primary-light font-semibold mb-2">
                    Manajemen Program
                </p>

                <h1 class="text-4xl md:text-5xl font-extrabold">
                    Program Kerja
                </h1>

                <p class="text-silver/70 mt-3 max-w-2xl">
                    Kelola seluruh program kerja organisasi dengan tampilan modern dan profesional.
                </p>
            </div>

            <a href="{{ route('admin.programs.create') }}"
                class="group inline-flex items-center gap-3 bg-gradient-to-r from-primary-light to-primary text-dark px-7 py-4 rounded-full font-bold shadow-lg shadow-primary/20 hover:scale-105 transition duration-300">

                <span class="text-xl group-hover:rotate-90 transition duration-300">
                    +
                </span>

                Tambah Program
            </a>

        </div>

        @if(session('success'))
            <div class="mb-8 bg-primary/10 border border-primary/20 text-primary-light rounded-3xl p-5">
                {{ session('success') }}
            </div>
        @endif

        @if($programs->count())
            <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-7">

                @foreach($programs as $program)

                    <div class="group relative bg-dark-card/80 border border-primary/10 rounded-[2rem] overflow-hidden hover:border-primary/40 transition duration-500">

                        <div class="absolute top-0 right-0 w-40 h-40 bg-primary/10 blur-3xl rounded-full"></div>

                        <div class="relative overflow-hidden">

                            @if($program->image)
                                <img
                                    src="{{ asset($program->image) }}"
                                    class="w-full h-64 object-cover group-hover:scale-110 transition duration-700"
                                >
                            @else
                                <div class="w-full h-64 bg-gradient-to-br from-primary/30 to-dark-soft flex items-center justify-center text-6xl text-primary-light">
                                    ✦
                                </div>
                            @endif

                            <div class="absolute top-5 left-5">
                                <span class="px-4 py-2 rounded-full bg-dark/70 backdrop-blur-xl border border-primary/20 text-primary-light text-sm font-semibold">
                                    {{ $program->status }}
                                </span>
                            </div>

                        </div>

                        <div class="relative p-7">

                            <div class="flex items-center justify-between gap-4 mb-4">
                                <p class="text-sm text-silver/60">
                                    {{ $program->program_date ?? 'Belum ditentukan' }}
                                </p>

                                <div class="w-10 h-10 rounded-2xl bg-primary/10 text-primary-light flex items-center justify-center">
                                    📌
                                </div>
                            </div>

                            <h2 class="text-2xl font-extrabold leading-snug group-hover:text-primary-light transition">
                                {{ $program->title }}
                            </h2>

                            <p class="text-silver/70 mt-4 leading-relaxed line-clamp-3">
                                {{ $program->description }}
                            </p>

                            <div class="flex items-center gap-3 mt-8">

                                <a href="{{ route('admin.programs.edit', $program->id) }}"
                                    class="flex-1 text-center bg-primary/10 hover:bg-primary/20 border border-primary/20 text-primary-light px-5 py-3 rounded-2xl font-semibold transition">
                                    Edit
                                </a>

                                <form action="{{ route('admin.programs.destroy', $program->id) }}"
                                    method="POST"
                                    class="flex-1"
                                    onsubmit="return confirm('Yakin ingin menghapus program ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="w-full bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 text-red-400 px-5 py-3 rounded-2xl font-semibold transition">
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

                <div class="text-7xl mb-6">
                    📂
                </div>

                <h2 class="text-3xl font-extrabold">
                    Belum Ada Program
                </h2>

                <p class="text-silver/70 mt-4 max-w-lg mx-auto">
                    Tambahkan program kerja organisasi untuk mulai menampilkan kegiatan kepada pengunjung website.
                </p>

                <a href="{{ route('admin.programs.create') }}"
                    class="inline-flex items-center gap-3 mt-8 bg-gradient-to-r from-primary-light to-primary text-dark px-7 py-4 rounded-full font-bold shadow-lg shadow-primary/20">

                    + Tambah Program

                </a>

            </div>

        @endif

    </div>
</section>

@endsection