@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-4xl mx-auto">

        <div class="admin-page-header mb-8">
            <p class="text-emerald-400 font-semibold mb-2">Tambah Pengumuman</p>
            <h1 class="text-4xl font-extrabold">Pengumuman Baru</h1>
            <p class="text-slate-400 mt-2">
                Buat pengumuman penting untuk ditampilkan di website.
            </p>
        </div>

        <div class="admin-card bg-white/10 border border-white/10 rounded-3xl p-8">
            <form action="{{ route('admin.announcements.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block mb-3 text-slate-300">Judul Pengumuman</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0"
                        placeholder="Contoh: Rapat Anggota Forum">

                    @error('title')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Tanggal Publish</label>
                    <input type="date" name="published_at" value="{{ old('published_at') }}"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0">

                    @error('published_at')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Isi Pengumuman</label>
                    <textarea name="content" rows="10"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0"
                        placeholder="Tulis isi pengumuman">{{ old('content') }}</textarea>

                    @error('content')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap gap-4 pt-4">
                    <button type="submit"
                        class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 px-7 py-3 rounded-full font-bold transition">
                        Simpan Pengumuman
                    </button>

                    <a href="{{ route('admin.announcements.index') }}"
                        class="border border-white/20 hover:border-emerald-400 px-7 py-3 rounded-full font-bold transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>

    </div>
</section>

@endsection