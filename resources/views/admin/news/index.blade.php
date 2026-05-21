@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">
    <div class="max-w-7xl mx-auto">

        <div class="admin-page-header flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-8">
            <div>
                <p class="text-primary-light font-semibold mb-2">Manajemen Konten</p>
                <h1 class="text-4xl font-extrabold">Kelola Berita</h1>
                <p class="text-silver/70 mt-2">Tambah, edit, hapus, dan upload berita kegiatan organisasi.</p>
            </div>

            <a href="{{ route('admin.news.create') }}"
                class="bg-gradient-to-r from-primary-light to-primary text-dark px-6 py-3 rounded-full font-bold transition shadow-lg shadow-primary/20">
                + Tambah Berita
            </a>
        </div>

        @if (session('success'))
            <div class="admin-card mb-6 bg-primary/10 border border-primary/30 text-primary-light rounded-2xl p-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-primary/10 text-silver">
                        <tr>
                            <th class="px-6 py-4">Berita</th>
                            <th class="px-6 py-4">Tanggal</th>
                            <th class="px-6 py-4">Dibuat</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-primary/10">
                        @forelse ($news as $item)
                            <tr class="hover:bg-primary/5 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        @if($item->image)
                                            <img src="{{ asset($item->image) }}"
                                                class="w-16 h-16 rounded-2xl object-cover">
                                        @else
                                            <div class="w-16 h-16 rounded-2xl bg-primary/20"></div>
                                        @endif

                                        <div>
                                            <div class="font-bold">{{ $item->title }}</div>
                                            <div class="text-sm text-silver/60 line-clamp-1">{{ $item->excerpt }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-silver/70">
                                    {{ $item->published_at ?? '-' }}
                                </td>

                                <td class="px-6 py-4 text-silver/70">
                                    {{ $item->created_at->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('admin.news.edit', $item->id) }}"
                                            class="px-4 py-2 rounded-full bg-primary/10 text-primary-light hover:bg-primary/20">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.news.destroy', $item->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
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
                                    Belum ada berita.
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