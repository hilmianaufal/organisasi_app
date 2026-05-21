@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-4xl mx-auto">

        <div class="admin-page-header mb-8">
            <p class="text-primary-light font-semibold mb-2">Edit Konten</p>
            <h1 class="text-4xl font-extrabold">Edit Berita</h1>
            <p class="text-silver/70 mt-2">Perbarui data berita yang sudah dibuat.</p>
        </div>

        <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-6 md:p-8">
            <form action="{{ route('admin.news.update', $news->id) }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6">

                @csrf
                @method('PUT')

                <div>
                    <label class="block mb-3 text-silver/80">Judul Berita</label>
                    <input type="text" name="title" value="{{ old('title', $news->title) }}"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white focus:border-primary-light focus:ring-0">

                    @error('title')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-silver/80">Gambar Berita</label>

                    @if($news->image)
                        <img src="{{ asset($news->image) }}"
                            class="w-full h-64 object-cover rounded-3xl mb-4 border border-primary/10">
                    @endif

                    <input type="file" name="image"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-silver/80">

                    @error('image')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-silver/80">Ringkasan</label>
                    <textarea name="excerpt" rows="3"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white focus:border-primary-light focus:ring-0">{{ old('excerpt', $news->excerpt) }}</textarea>
                </div>

                <div>
                    <label class="block mb-3 text-silver/80">Isi Berita</label>
                    <textarea name="content" rows="10"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white focus:border-primary-light focus:ring-0">{{ old('content', $news->content) }}</textarea>

                    @error('content')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-3 text-silver/80">Tanggal Publish</label>
                    <input type="date" name="published_at"
                        value="{{ old('published_at', $news->published_at) }}"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white focus:border-primary-light focus:ring-0">
                </div>

                <div class="flex flex-wrap gap-4 pt-4">
                    <button type="submit"
                        class="bg-gradient-to-r from-primary-light to-primary text-dark px-7 py-3 rounded-full font-bold transition shadow-lg shadow-primary/20">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('admin.news.index') }}"
                        class="border border-primary/30 hover:border-primary-light px-7 py-3 rounded-full font-bold transition text-silver">
                        Batal
                    </a>
                </div>
            </form>
        </div>

    </div>
</section>

@endsection