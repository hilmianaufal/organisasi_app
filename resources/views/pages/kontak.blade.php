@extends('layouts.guest')

@section('content')

<section class="relative pt-36 pb-24 px-6 overflow-hidden">
    <div class="absolute top-20 right-0 w-96 h-96 bg-primary/20 blur-3xl rounded-full hero-glow"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="max-w-3xl section-reveal">
            <p class="text-primary-light font-semibold mb-4">Kontak & Aspirasi</p>

            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">
                Hubungi {{ $globalSetting->site_name ?? 'Forum Mahasiswa KIP' }}
            </h1>

            <p class="mt-6 text-silver/80 text-lg leading-relaxed">
                Silakan hubungi kami untuk informasi, kerja sama, atau menyampaikan aspirasi dan saran mahasiswa.
            </p>
        </div>
    </div>
</section>

<section class="pb-24 px-6">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-8">

        <div class="premium-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-7 md:p-10">
            <p class="text-primary-light font-semibold mb-3">Informasi Kontak</p>

            <h2 class="text-3xl font-extrabold mb-8">
                Terhubung Dengan Kami
            </h2>

            <div class="space-y-6">
                <div class="bg-dark/70 border border-primary/10 rounded-3xl p-5">
                    <p class="text-primary-light font-semibold">Alamat</p>
                    <p class="text-silver/80 mt-2">
                        {{ $globalSetting->address ?? 'Kampus UIN SSC' }}
                    </p>
                </div>

                <div class="bg-dark/70 border border-primary/10 rounded-3xl p-5">
                    <p class="text-primary-light font-semibold">Email</p>
                    <p class="text-silver/80 mt-2">
                        {{ $globalSetting->email ?? 'forumkip@uinssc.ac.id' }}
                    </p>
                </div>

                <div class="bg-dark/70 border border-primary/10 rounded-3xl p-5">
                    <p class="text-primary-light font-semibold">Instagram</p>
                    <p class="text-silver/80 mt-2">
                        {{ $globalSetting->instagram ?? '@formkip' }}
                    </p>
                </div>

                <div class="bg-dark/70 border border-primary/10 rounded-3xl p-5">
                    <p class="text-primary-light font-semibold">WhatsApp</p>
                    <p class="text-silver/80 mt-2">
                        {{ $globalSetting->phone ?? '+62 812 3456 7890' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="premium-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-7 md:p-10">
            <p class="text-primary-light font-semibold mb-3">Aspirasi Mahasiswa</p>

            <h2 class="text-3xl font-extrabold mb-8">
                Kirim Aspirasi
            </h2>

            @if(session('success'))
                <div class="mb-6 bg-primary/10 border border-primary/30 text-primary-light rounded-2xl p-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('aspirations.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block mb-3 text-silver/80">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="name"
                        required
                        placeholder="Masukkan nama"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-primary-light focus:ring-0"
                    >

                    @error('name')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-silver/80">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Masukkan email"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-primary-light focus:ring-0"
                    >

                    @error('email')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-silver/80">
                        Aspirasi / Pesan
                    </label>

                    <textarea
                        rows="6"
                        name="message"
                        required
                        placeholder="Tulis aspirasi atau pesan..."
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-primary-light focus:ring-0"
                    ></textarea>

                    @error('message')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-primary-light to-primary hover:from-primary hover:to-primary-light text-dark font-bold py-4 rounded-2xl transition shadow-lg shadow-primary/20"
                >
                    Kirim Aspirasi
                </button>
            </form>
        </div>

    </div>
</section>

@endsection