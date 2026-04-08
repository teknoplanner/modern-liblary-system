@extends('layouts.app')

@section('title', 'Registrasi Petugas')

@section('content')
<div class="max-w-md mx-auto py-16 animate-in fade-in slide-in-from-bottom duration-700">
    <div class="text-center space-y-3 mb-12">
        <div class="w-20 h-20 bg-cyan-600 rounded-[2rem] flex items-center justify-center text-white mx-auto shadow-2xl shadow-cyan-100 mb-8 border-4 border-cyan-50">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
        </div>
        <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Daftar Akun</h1>
        <p class="text-slate-400 text-sm font-medium">Lengkapi data untuk akses manajemen perpustakaan</p>
    </div>

    @if ($errors->any())
        <div class="mb-8 bg-rose-50 border border-rose-100 text-rose-700 px-6 py-4 rounded-2xl text-[11px] font-bold uppercase tracking-wider">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/register" method="POST" class="space-y-6 bg-white p-12 rounded-[3.5rem] shadow-[0_48px_96px_-24px_rgba(0,0,0,0.06)] border border-slate-50 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-cyan-500 to-cyan-300"></div>
        @csrf
        <div class="space-y-2">
            <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Nama Lengkap</label>
            <input type="text" name="name" placeholder="Masukkan nama" required value="{{ old('name') }}"
                class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all outline-none text-sm font-bold text-slate-700 placeholder:text-slate-300">
        </div>

        <div class="space-y-2">
            <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Alamat Email Resmi</label>
            <input type="email" name="email" placeholder="admin@lumina.lib" required value="{{ old('email') }}"
                class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all outline-none text-sm font-bold text-slate-700 placeholder:text-slate-300">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="space-y-2">
                <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Kata Sandi</label>
                <input type="password" name="password" placeholder="••••••••" required
                    class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all outline-none text-sm font-bold text-slate-700 placeholder:text-slate-300">
            </div>
            <div class="space-y-2">
                <label class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Konfirmasi</label>
                <input type="password" name="password_confirmation" placeholder="••••••••" required
                    class="w-full px-6 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all outline-none text-sm font-bold text-slate-700 placeholder:text-slate-300">
            </div>
        </div>

        <div class="pt-8 flex flex-col gap-6">
            <button type="submit" class="w-full py-5 bg-slate-900 text-white text-xs font-black rounded-2xl shadow-2xl shadow-slate-200 hover:bg-cyan-600 hover:shadow-cyan-100 transition-all active:scale-[0.98] uppercase tracking-[0.3em]">
                Daftar Sekarang
            </button>
            <p class="text-center text-[10px] text-slate-400 font-black uppercase tracking-[0.2em]">
                Sudah memiliki akun? <a href="/login" class="text-cyan-600 hover:text-cyan-700 transition-colors">Masuk Disini</a>
            </p>
        </div>
    </form>
</div>
@endsection
