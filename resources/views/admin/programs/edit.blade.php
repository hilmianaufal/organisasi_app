@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-4xl mx-auto">

        <div class="admin-page-header mb-8">
            <p class="text-emerald-400 font-semibold mb-2">Edit Program</p>
            <h1 class="text-4xl font-extrabold">Edit Data Program</h1>
            <p class="text-slate-400 mt-2">
                Perbarui informasi program kerja organisasi.
            </p>
        </div>

        <div class="admin-card bg-white/10 border border-white/10 rounded-3xl p-8">
            <form action="{{ route('admin.programs.update', $program->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block mb-3 text-slate-300">Nama Program</label>
                    <input type="text" name="title" value="{{ old('title', $program->title) }}"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0">

                    @error('title')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Gambar Program</label>

                    @if($program->image)
                        <img src="{{ asset($program->image) }}"
                            class="w-full h-64 object-cover rounded-2xl mb-4">
                    @endif

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
                        <option value="Aktif" {{ $program->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Rencana" {{ $program->status == 'Rencana' ? 'selected' : '' }}>Rencana</option>
                        <option value="Selesai" {{ $program->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>

                    @error('status')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Tanggal Program</label>
                    <input type="date" name="program_date" value="{{ old('program_date', $program->program_date) }}"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0">

                    @error('program_date')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-slate-300">Deskripsi Program</label>
                    <textarea name="description" rows="8"
                        class="w-full bg-slate-900 border border-white/10 rounded-2xl px-5 py-4 text-white focus:border-emerald-400 focus:ring-0">{{ old('description', $program->description) }}</textarea>

                    @error('description')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap gap-4 pt-4">
                    <button type="submit"
                        class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 px-7 py-3 rounded-full font-bold transition">
                        Simpan Perubahan
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