@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-4xl mx-auto">

        <div class="admin-page-header mb-8">
            <p class="text-emerald-400 font-semibold mb-2">Tambah Program</p>
            <h1 class="text-4xl font-extrabold">Program Baru</h1>
            <p class="text-slate-400 mt-2">
                Tambahkan program kerja organisasi.
            </p>
        </div>

        <div class="admin-card bg-white/10 border border-white/10 rounded-3xl p-8">
            <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block mb-3 text-slate-300">Nama Program</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0"
                        placeholder="Contoh: Pelatihan Kepemimpinan">

                    @error('title')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Gambar Program</label>
                    <input type="file" name="image"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white">

                    @error('image')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Status</label>
                    <select name="status"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0">
                        <option value="Aktif">Aktif</option>
                        <option value="Rencana">Rencana</option>
                        <option value="Selesai">Selesai</option>
                    </select>

                    @error('status')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Tanggal Program</label>
                    <input type="date" name="program_date" value="{{ old('program_date') }}"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0">

                    @error('program_date')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Deskripsi Program</label>
                    <textarea name="description" rows="8"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0"
                        placeholder="Tulis deskripsi program">{{ old('description') }}</textarea>

                    @error('description')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap gap-4 pt-4">
                    <button type="submit"
                        class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 px-7 py-3 rounded-full font-bold transition">
                        Simpan Program
                    </button>

                    <a href="{{ route('admin.programs.index') }}"
                        class="border border-white/20 hover:border-emerald-400 px-7 py-3 rounded-full font-bold transition">
                        Batal
                    </a>
                </div>

            </form>
        </div>

    </div>
</section>

@endsection