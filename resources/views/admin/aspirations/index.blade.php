@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-7xl mx-auto">

        <div class="admin-page-header mb-10">
            <p class="text-primary-light font-semibold mb-2">
                Aspirasi Mahasiswa
            </p>

            <h1 class="text-4xl md:text-5xl font-extrabold">
                Pesan & Aspirasi
            </h1>

            <p class="text-silver/70 mt-3 max-w-2xl">
                Daftar pesan, kritik, saran, dan aspirasi mahasiswa yang masuk melalui website.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-8 bg-primary/10 border border-primary/20 text-primary-light rounded-3xl p-5">
                {{ session('success') }}
            </div>
        @endif

        @if($aspirations->count())

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-7">

                @foreach($aspirations as $aspiration)

                    <div class="group relative bg-dark-card/80 border border-primary/10 rounded-[2rem] p-7 overflow-hidden hover:border-primary/40 transition duration-500">

                        <div class="absolute -top-20 -right-20 w-56 h-56 bg-primary/10 blur-3xl rounded-full"></div>

                        <div class="relative z-10">

                            <div class="flex items-start justify-between gap-4 mb-6">

                                <div>
                                    <p class="text-sm text-primary-light">
                                        {{ $aspiration->created_at->format('d M Y') }}
                                    </p>

                                    <span class="inline-block mt-3 px-4 py-2 rounded-full bg-primary/10 border border-primary/20 text-primary-light text-sm font-semibold">
                                        Aspirasi
                                    </span>
                                </div>

                                <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary-light flex items-center justify-center text-2xl">
                                    💬
                                </div>

                            </div>

                            <h2 class="text-2xl font-extrabold leading-snug">
                                {{ $aspiration->name }}
                            </h2>

                            <p class="text-primary-light text-sm mt-2">
                                {{ $aspiration->email ?? 'Tanpa Email' }}
                            </p>

                            <p class="text-silver/70 mt-5 leading-relaxed line-clamp-6">
                                {{ $aspiration->message }}
                            </p>

                            <div class="flex items-center gap-3 mt-8">

                                <button
                                    onclick="openModal(
                                        '{{ $aspiration->name }}',
                                        '{{ $aspiration->email }}',
                                        `{{ $aspiration->message }}`
                                    )"
                                    class="flex-1 text-center bg-primary/10 hover:bg-primary/20 border border-primary/20 text-primary-light px-5 py-3 rounded-2xl font-semibold transition">
                                    Lihat
                                </button>

                                <form action="{{ route('admin.aspirations.destroy', $aspiration->id) }}"
                                    method="POST"
                                    class="flex-1"
                                    onsubmit="return confirm('Yakin ingin menghapus aspirasi ini?')">

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
                    💬
                </div>

                <h2 class="text-3xl font-extrabold">
                    Belum Ada Aspirasi
                </h2>

                <p class="text-silver/70 mt-4 max-w-lg mx-auto">
                    Aspirasi mahasiswa yang dikirim dari halaman kontak akan muncul di sini.
                </p>

            </div>

        @endif

    </div>
</section>

<div id="aspirationModal"
    class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center z-[999] p-6">

    <div class="bg-dark-card border border-primary/20 rounded-[2rem] max-w-2xl w-full p-8 relative">

        <button onclick="closeModal()"
            class="absolute top-5 right-5 w-12 h-12 rounded-2xl bg-primary/10 text-primary-light text-2xl">
            ×
        </button>

        <p class="text-primary-light font-semibold mb-3">
            Detail Aspirasi
        </p>

        <h2 id="modalName"
            class="text-3xl font-extrabold">
        </h2>

        <p id="modalEmail"
            class="text-silver/60 mt-2">
        </p>

        <div class="mt-8 bg-dark/80 border border-primary/10 rounded-3xl p-6">
            <p id="modalMessage"
                class="text-silver/80 leading-relaxed whitespace-pre-line">
            </p>
        </div>

    </div>

</div>

<script>
    function openModal(name, email, message) {
        document.getElementById('modalName').innerText = name;
        document.getElementById('modalEmail').innerText = email ?? '-';
        document.getElementById('modalMessage').innerText = message;

        document.getElementById('aspirationModal')
            .classList.remove('hidden');

        document.getElementById('aspirationModal')
            .classList.add('flex');
    }

    function closeModal() {
        document.getElementById('aspirationModal')
            .classList.add('hidden');

        document.getElementById('aspirationModal')
            .classList.remove('flex');
    }
</script>

@endsection