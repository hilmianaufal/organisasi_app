@extends('layouts.guest')

@section('content')

<section class="relative pt-36 pb-24 px-6 overflow-hidden">
    <div class="absolute top-20 right-0 w-96 h-96 bg-primary/20 blur-3xl rounded-full hero-glow"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="max-w-3xl section-reveal">
            <p class="text-primary-light font-semibold mb-4">Program Kerja</p>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
                Program Forum Mahasiswa KIP
            </h1>

            <p class="mt-6 text-silver/80 text-lg leading-relaxed">
                Program kerja organisasi untuk mendukung pengembangan akademik,
                kepemimpinan, sosial, dan kreativitas mahasiswa.
            </p>
        </div>
    </div>
</section>

<section class="pb-24 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">
            @forelse ($programs as $program)
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

                        <h2 class="text-2xl font-bold mt-5 group-hover:text-primary-light transition">
                            {{ $program->title }}
                        </h2>

                        <p class="text-silver/70 mt-3 line-clamp-4">
                            {{ $program->description }}
                        </p>

                        <p class="text-sm text-silver/50 mt-5">
                            {{ $program->program_date ?? 'Tanggal belum ditentukan' }}
                        </p>
                    </div>
                </article>
            @empty
                <div class="lg:col-span-3 text-center text-silver/60 py-20">
                    Belum ada program.
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection