@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-4xl mx-auto">

        <div class="admin-page-header mb-8">
            <p class="text-emerald-400 font-semibold mb-2">Tambah Pengurus</p>
            <h1 class="text-4xl font-extrabold">Data Pengurus Baru</h1>
            <p class="text-slate-400 mt-2">
                Tambahkan data pengurus ke struktur organisasi.
            </p>
        </div>

        <div class="admin-card bg-white/10 border border-white/10 rounded-3xl p-8">
            <form action="{{ route('admin.members.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block mb-3 text-slate-300">Nama Pengurus</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0"
                        placeholder="Masukkan nama pengurus">

                    @error('name')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Jabatan</label>
                    <input type="text" name="position" value="{{ old('position') }}"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0"
                        placeholder="Contoh: Ketua Umum">

                    @error('position')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Divisi</label>
                    <input type="text" name="division" value="{{ old('division') }}"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0"
                        placeholder="Contoh: Inti / Media / Humas">

                    @error('division')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Foto Pengurus</label>
                    <input type="file" name="photo"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white">

                    @error('photo')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Deskripsi Singkat</label>
                    <textarea name="description" rows="5"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0"
                        placeholder="Tulis deskripsi singkat">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap gap-4 pt-4">
                    <button type="submit"
                        class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 px-7 py-3 rounded-full font-bold transition">
                        Simpan Pengurus
                    </button>

                    <a href="{{ route('admin.members.index') }}"
                        class="border border-white/20 hover:border-emerald-400 px-7 py-3 rounded-full font-bold transition">
                        Batal
                    </a>
                </div>

            </form>
        </div>

    </div>
</section>

@endsection