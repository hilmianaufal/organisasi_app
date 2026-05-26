@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-7xl mx-auto">

        <div class="admin-page-header flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-10">
            <div>
                <p class="text-primary-light font-semibold mb-2">Manajemen Berita</p>
                <h1 class="text-4xl md:text-5xl font-extrabold">Kategori Berita</h1>
                <p class="text-silver/70 mt-3 max-w-2xl">
                    Kelola kategori berita agar konten lebih rapi dan mudah difilter.
                </p>
            </div>

            <a href="{{ route('admin.categories.create') }}"
                class="inline-flex items-center gap-3 bg-gradient-to-r from-primary-light to-primary text-dark px-7 py-4 rounded-full font-bold shadow-lg shadow-primary/20">
                + Tambah Kategori
            </a>
        </div>

        @if(session('success'))
            <div class="mb-8 bg-primary/10 border border-primary/20 text-primary-light rounded-3xl p-5">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-primary/10 text-silver">
                        <tr>
                            <th class="px-6 py-4">Nama Kategori</th>
                            <th class="px-6 py-4">Slug</th>
                            <th class="px-6 py-4">Jumlah Berita</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-primary/10">
                        @forelse($categories as $category)
                            <tr class="hover:bg-primary/5 transition">
                                <td class="px-6 py-4 font-bold">
                                    {{ $category->name }}
                                </td>

                                <td class="px-6 py-4 text-silver/70">
                                    {{ $category->slug }}
                                </td>

                                <td class="px-6 py-4">
                                    <span class="px-4 py-2 rounded-full bg-primary/10 text-primary-light text-sm font-semibold">
                                        {{ $category->news_count }} berita
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                            class="px-4 py-2 rounded-full bg-primary/10 text-primary-light hover:bg-primary/20">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kategori ini? Berita tidak ikut terhapus.')">
                                            @csrf
                                            @method('DELETE')

                                            <button class="px-4 py-2 rounded-full bg-red-500/20 text-red-400 hover:bg-red-500/30">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-silver/60">
                                    Belum ada kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

@endsection