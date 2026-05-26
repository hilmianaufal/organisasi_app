@extends('layouts.admin')

@section('content')

<section class="px-6 pb-20">

    <div class="max-w-5xl mx-auto">

        <div class="admin-page-header mb-10">
            <p class="text-primary-light font-semibold mb-2">
                Website Settings
            </p>

            <h1 class="text-4xl md:text-5xl font-extrabold">
                General Settings
            </h1>

            <p class="text-silver/70 mt-3 max-w-2xl">
                Kelola identitas website, logo organisasi, hero section,
                kontak, visi misi, dan informasi umum website.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-8 bg-primary/10 border border-primary/20 text-primary-light rounded-3xl p-5">
                {{ session('success') }}
            </div>
        @endif

        <form
            action="{{ route('admin.settings.general.update') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-8">

            @csrf
            @method('PUT')

            {{-- IDENTITAS --}}
            <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-6 md:p-8">

                <h2 class="text-2xl font-extrabold mb-8">
                    Identitas Website
                </h2>

                <div class="space-y-6">

                    <div>
                        <label class="block mb-3 text-silver/80">
                            Nama Website
                        </label>

                        <input
                            type="text"
                            name="site_name"
                            value="{{ old('site_name', $setting->site_name ?? '') }}"
                            class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">
                    </div>

                    <div>
                        <label class="block mb-3 text-silver/80">
                            Deskripsi Website
                        </label>

                        <textarea
                            name="site_description"
                            rows="4"
                            class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">{{ old('site_description', $setting->site_description ?? '') }}</textarea>
                    </div>

                    <div>
                        <label class="block mb-4 text-silver/80">
                            Logo Website
                        </label>

                        <label class="relative flex items-center justify-center w-full h-64 border-2 border-dashed border-primary/20 rounded-[2rem] cursor-pointer overflow-hidden hover:border-primary-light transition">

                            @if($setting && $setting->logo)
                                <img
                                    src="{{ asset($setting->logo) }}"
                                    class="absolute inset-0 w-full h-full object-cover opacity-30">
                            @endif

                            <div class="relative z-10 text-center">
                                <div class="text-6xl mb-4">
                                    🖼️
                                </div>

                                <p class="text-primary-light font-bold text-lg">
                                    Upload Logo
                                </p>
                            </div>

                            <input
                                type="file"
                                name="logo"
                                class="hidden">
                        </label>
                    </div>

                </div>

            </div>

            {{-- KONTAK + VISI --}}
            <div class="grid lg:grid-cols-2 gap-8">

                <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-6 md:p-8 space-y-6">

                    <h2 class="text-2xl font-extrabold">
                        Kontak
                    </h2>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $setting->email ?? '') }}"
                        placeholder="Email"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $setting->phone ?? '') }}"
                        placeholder="WhatsApp"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">

                    <input
                        type="text"
                        name="instagram"
                        value="{{ old('instagram', $setting->instagram ?? '') }}"
                        placeholder="Instagram"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">

                    <textarea
                        name="address"
                        rows="4"
                        placeholder="Alamat"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">{{ old('address', $setting->address ?? '') }}</textarea>

                </div>

                <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-6 md:p-8 space-y-6">

                    <h2 class="text-2xl font-extrabold">
                        Visi & Misi
                    </h2>

                    <textarea
                        name="vision"
                        rows="5"
                        placeholder="Visi"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">{{ old('vision', $setting->vision ?? '') }}</textarea>

                    <textarea
                        name="mission"
                        rows="8"
                        placeholder="Misi"
                        class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">{{ old('mission', $setting->mission ?? '') }}</textarea>

                </div>

            </div>

            <div class="flex justify-end">
                <button
                    type="submit"
                    class="bg-gradient-to-r from-primary-light to-primary text-dark px-10 py-4 rounded-full font-bold shadow-lg shadow-primary/20">
                    Simpan Settings
                </button>
            </div>

        </form>

        {{-- USER ADMIN --}}
        <section class="mt-10">

            <div class="admin-card bg-dark-card/80 border border-primary/10 rounded-[2rem] p-6 md:p-8">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 mb-8">

                    <div>
                        <p class="text-primary-light font-semibold mb-2">
                            Administrator
                        </p>

                        <h2 class="text-3xl font-extrabold">
                            Kelola User Admin
                        </h2>

                        <p class="text-silver/70 mt-2">
                            Tambah atau hapus akun admin website.
                        </p>
                    </div>

                    <button
                        onclick="openUserModal()"
                        type="button"
                        class="bg-gradient-to-r from-primary-light to-primary text-dark px-7 py-4 rounded-full font-bold">

                        + Tambah User

                    </button>

                </div>

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

                    @foreach($users as $user)

                        <div class="bg-dark border border-primary/10 rounded-[2rem] p-6">

                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-primary-light to-primary flex items-center justify-center text-dark text-2xl font-black mb-5">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>

                            <h3 class="text-2xl font-extrabold">
                                {{ $user->name }}
                            </h3>

                            <p class="text-silver/70 mt-2">
                                {{ $user->email }}
                            </p>

                            @if(auth()->id() !== $user->id)

                                <form
                                    action="{{ route('admin.users.destroy', $user->id) }}"
                                    method="POST"
                                    class="mt-6">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="w-full bg-red-500/10 border border-red-500/20 text-red-400 px-5 py-3 rounded-2xl font-semibold">

                                        Hapus User

                                    </button>

                                </form>

                            @else

                                <div class="mt-6 px-5 py-3 rounded-2xl bg-primary/10 border border-primary/20 text-primary-light text-center font-semibold">
                                    Akun Anda
                                </div>

                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

        </section>

    </div>

</section>

{{-- MODAL USER --}}
<div id="userModal"
    class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center z-[999] p-6">

    <div class="bg-dark-card border border-primary/20 rounded-[2rem] max-w-xl w-full p-8 relative">

        <button
            onclick="closeUserModal()"
            type="button"
            class="absolute top-5 right-5 w-12 h-12 rounded-2xl bg-primary/10 text-primary-light text-2xl">

            ×

        </button>

        <h2 class="text-3xl font-extrabold mb-8">
            Tambah User Admin
        </h2>

        <form
            action="{{ route('admin.users.store') }}"
            method="POST"
            class="space-y-6">

            @csrf

            <input
                type="text"
                name="name"
                required
                placeholder="Nama"
                class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">

            <input
                type="email"
                name="email"
                required
                placeholder="Email"
                class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">

            <input
                type="password"
                name="password"
                required
                placeholder="Password"
                class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">

            <input
                type="password"
                name="password_confirmation"
                required
                placeholder="Konfirmasi Password"
                class="w-full bg-dark border border-primary/10 rounded-2xl px-5 py-4 text-white">

            <button
                type="submit"
                class="w-full bg-gradient-to-r from-primary-light to-primary text-dark px-7 py-4 rounded-2xl font-bold">

                Tambah User

            </button>

        </form>

    </div>

</div>

<script>
    function openUserModal() {
        document.getElementById('userModal').classList.remove('hidden');
        document.getElementById('userModal').classList.add('flex');
    }

    function closeUserModal() {
        document.getElementById('userModal').classList.add('hidden');
        document.getElementById('userModal').classList.remove('flex');
    }
</script>

@endsection