@extends('layouts.guest')

@section('content')

<section class="relative pt-36 pb-24 px-6 overflow-hidden">
    <div class="absolute top-20 right-0 w-96 h-96 bg-primary/20 blur-3xl rounded-full hero-glow"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="max-w-3xl section-reveal">
            <p class="text-primary-light font-semibold mb-4">Profil Organisasi</p>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
                {{ $globalSetting->site_name ?? 'Forum Mahasiswa KIP' }}
            </h1>

            <p class="mt-6 text-silver/80 text-lg leading-relaxed">
                {{ $globalSetting->site_description ?? 'Forum Mahasiswa KIP adalah wadah pengembangan mahasiswa penerima KIP Kuliah untuk membangun karakter, prestasi, solidaritas, dan kontribusi nyata.' }}
            </p>
        </div>
    </div>
</section>

<section class="pb-24 px-6">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-8">
        <div class="premium-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-7 md:p-10">
            <p class="text-primary-light font-semibold mb-3">Visi</p>

            <h2 class="text-3xl font-extrabold">
                Arah Besar Organisasi
            </h2>

            <p class="text-silver/80 mt-6 leading-relaxed">
                {{ $setting->vision ?? 'Visi organisasi belum diatur.' }}
            </p>
        </div>

        <div class="premium-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-7 md:p-10">
            <p class="text-primary-light font-semibold mb-3">Misi</p>

            <h2 class="text-3xl font-extrabold">
                Langkah dan Komitmen
            </h2>

            <ul class="text-silver/80 mt-6 space-y-4">
                @if($setting && $setting->mission)
                    @foreach(explode("\n", $setting->mission) as $mission)
                        @if(trim($mission) != '')
                            <li class="flex gap-3">
                                <span class="mt-1 text-primary-light">✦</span>
                                <span>{{ $mission }}</span>
                            </li>
                        @endif
                    @endforeach
                @else
                    <li class="flex gap-3">
                        <span class="mt-1 text-primary-light">✦</span>
                        <span>Misi organisasi belum diatur.</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</section>

<section class="section-reveal py-24 px-6 bg-dark-soft/60 border-y border-primary/10 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <p class="text-primary-light font-semibold mb-3">Struktur Organisasi</p>

            <h2 class="text-3xl md:text-5xl font-extrabold">
                Pengurus Forum
            </h2>

            <p class="text-silver/70 mt-4">
                Data pengurus organisasi yang dikelola langsung dari dashboard admin.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">
            @forelse ($members as $member)
                <div class="premium-card group bg-dark-card/80 border border-primary/10 rounded-[2rem] overflow-hidden text-center hover:border-primary/50 transition duration-500">
                    <div class="overflow-hidden">
                        @if($member->photo)
                            <img src="{{ asset($member->photo) }}"
                                class="w-full h-80 object-cover group-hover:scale-110 transition duration-700">
                        @else
                            <div class="w-full h-80 bg-gradient-to-br from-primary/40 to-dark-soft"></div>
                        @endif
                    </div>

                    <div class="p-7">
                        <p class="text-sm text-primary-light">
                            {{ $member->division ?? 'Pengurus' }}
                        </p>

                        <h3 class="text-2xl font-bold mt-2 group-hover:text-primary-light transition">
                            {{ $member->name }}
                        </h3>

                        <p class="text-silver/80 mt-2">
                            {{ $member->position }}
                        </p>

                        <p class="text-silver/60 mt-4 text-sm line-clamp-3">
                            {{ $member->description }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="lg:col-span-3 text-center text-silver/60 py-20">
                    Belum ada data pengurus.
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection