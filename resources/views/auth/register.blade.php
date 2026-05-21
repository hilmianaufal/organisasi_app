@extends('layouts.guest')

@section('content')

<div class="min-h-screen flex items-center justify-center px-6 py-20">

    <div class="w-full max-w-md bg-white/10 backdrop-blur-xl border border-white/10 rounded-3xl p-8 shadow-2xl">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold">
                Register Admin
            </h1>

            <p class="text-slate-300 mt-2">
                Forum Mahasiswa KIP UIN SSC
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- NAME -->
            <div class="mb-5">
                <label class="block mb-2 text-sm">
                    Nama Lengkap
                </label>

                <input type="text"
                    name="name"
                    required
                    autofocus
                    class="w-full rounded-2xl bg-slate-900 border border-white/10 text-white px-5 py-3 focus:border-emerald-400 focus:ring-0">
            </div>

            <!-- EMAIL -->
            <div class="mb-5">
                <label class="block mb-2 text-sm">
                    Email
                </label>

                <input type="email"
                    name="email"
                    required
                    class="w-full rounded-2xl bg-slate-900 border border-white/10 text-white px-5 py-3 focus:border-emerald-400 focus:ring-0">
            </div>

            <!-- PASSWORD -->
            <div class="mb-5">
                <label class="block mb-2 text-sm">
                    Password
                </label>

                <input type="password"
                    name="password"
                    required
                    class="w-full rounded-2xl bg-slate-900 border border-white/10 text-white px-5 py-3 focus:border-emerald-400 focus:ring-0">
            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="mb-6">
                <label class="block mb-2 text-sm">
                    Konfirmasi Password
                </label>

                <input type="password"
                    name="password_confirmation"
                    required
                    class="w-full rounded-2xl bg-slate-900 border border-white/10 text-white px-5 py-3 focus:border-emerald-400 focus:ring-0">
            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold py-3 rounded-2xl transition duration-300">
                Register
            </button>

            <p class="text-center text-sm text-slate-300 mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}"
                    class="text-emerald-400 hover:text-emerald-300">
                    Login
                </a>
            </p>

        </form>

    </div>

</div>

@endsection