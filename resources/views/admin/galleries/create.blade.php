@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-4xl mx-auto">

        <div class="admin-page-header mb-8">
            <p class="text-emerald-400 font-semibold mb-2">Tambah Galeri</p>
            <h1 class="text-4xl font-extrabold">Upload Foto Kegiatan</h1>
            <p class="text-slate-400 mt-2">
                Tambahkan dokumentasi kegiatan organisasi ke halaman galeri.
            </p>
        </div>

        <div class="admin-card bg-white/10 border border-white/10 rounded-3xl p-8">
            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block mb-3 text-slate-300">Judul Foto</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0"
                        placeholder="Contoh: Pelatihan Kepemimpinan">

                    @error('title')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Upload Foto</label>
                    <input type="file" name="image"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white">

                    @error('image')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Tanggal Kegiatan</label>
                    <input type="date" name="activity_date" value="{{ old('activity_date') }}"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0">

                    @error('activity_date')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Deskripsi</label>
                    <textarea name="description" rows="6"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0"
                        placeholder="Tulis deskripsi singkat">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap gap-4 pt-4">
                    <button type="submit"
                        class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 px-7 py-3 rounded-full font-bold transition">
                        Simpan Foto
                    </button>

                    <a href="{{ route('admin.galleries.index') }}"
                        class="border border-white/20 hover:border-emerald-400 px-7 py-3 rounded-full font-bold transition">
                        Batal
                    </a>
                </div>

            </form>
        </div>

    </div>
</section>

@endsection