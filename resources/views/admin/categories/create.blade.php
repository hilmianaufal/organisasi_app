@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-4xl mx-auto">

        <div class="admin-page-header mb-8">
            <p class="text-primary-light font-semibold mb-2">Tambah Kategori</p>
            <h1 class="text-4xl font-extrabold">Kategori Berita Baru</h1>
            <p class="text-silver/70 mt-2">
                Tambahkan kategori untuk mengelompokkan berita.
            </p>
        </div>

        <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-6 md:p-8">
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block mb-3 text-silver/80">Nama Kategori</label>

                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white focus:border-primary-light focus:ring-0"
                        placeholder="Contoh: Kegiatan">

                    @error('name')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap gap-4 pt-4">
                    <button type="submit"
                        class="bg-gradient-to-r from-primary-light to-primary text-dark px-7 py-3 rounded-full font-bold transition shadow-lg shadow-primary/20">
                        Simpan Kategori
                    </button>

                    <a href="{{ route('admin.categories.index') }}"
                        class="border border-primary/30 hover:border-primary-light px-7 py-3 rounded-full font-bold transition text-silver">
                        Batal
                    </a>
                </div>
            </form>
        </div>

    </div>
</section>

@endsection