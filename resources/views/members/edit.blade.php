@extends('layouts.app')

@section('title', 'Perbarui Data Anggota')

@section('content')
<div class="max-w-3xl mx-auto space-y-12 py-10 animate-in fade-in slide-in-from-bottom duration-700">
    <div class="space-y-3">
        <div class="flex items-center gap-2 mb-1">
            <span class="w-8 h-1 bg-cyan-600 rounded-full"></span>
            <span class="text-[11px] font-black uppercase tracking-[0.3em] text-cyan-600">Administrasi Keanggotaan</span>
        </div>
        <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 leading-tight">Edit Profil <span class="text-cyan-600">Anggota</span></h1>
        <p class="text-slate-500 font-medium max-w-lg">Pastikan data kontak dan alamat tetap relevan untuk koordinasi layanan sirkulasi.</p>
    </div>

    <form action="/members/{{ $member->id }}" method="POST" class="bg-white p-12 rounded-[3.5rem] shadow-[0_48px_96px_-24px_rgba(0,0,0,0.06)] border border-slate-50 space-y-10 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-cyan-500 to-cyan-300 opacity-20"></div>
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-10">
            <div class="space-y-3">
                <label for="name" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Nama Lengkap Identitas</label>
                <input type="text" name="name" id="name" required value="{{ $member->name }}"
                    class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-3">
                    <label for="email" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Email Aktif</label>
                    <input type="email" name="email" id="email" required value="{{ $member->email }}"
                        class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 outline-none">
                </div>

                <div class="space-y-3">
                    <label for="phone" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Nomor Kontak</label>
                    <input type="text" name="phone" id="phone" required value="{{ $member->phone }}"
                        class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 outline-none">
                </div>
            </div>

            <div class="space-y-3">
                <label for="address" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Alamat Domisili</label>
                <textarea name="address" id="address" rows="3"
                    class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 outline-none resize-none">{{ $member->address }}</textarea>
            </div>
        </div>

        <div class="pt-10 flex flex-col md:flex-row items-center justify-end gap-6 border-t border-slate-50">
            <a href="/members" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] hover:text-rose-500 transition-colors">Batalkan Perubahan</a>
            <button type="submit" class="w-full md:w-auto px-12 py-5 bg-slate-900 text-white text-xs font-black rounded-2xl shadow-2xl shadow-slate-200 hover:bg-cyan-600 hover:shadow-cyan-100 transition-all active:scale-[0.98] uppercase tracking-[0.3em]">
                Perbarui Profil Anggota
            </button>
        </div>
    </form>
</div>
@endsection
