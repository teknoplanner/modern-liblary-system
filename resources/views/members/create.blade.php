@extends('layouts.app')

@section('title', 'Registrasi Anggota Baru')

@section('content')
<div class="max-w-3xl mx-auto space-y-12 py-10 animate-in fade-in slide-in-from-bottom duration-700">
    <div class="space-y-3 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-cyan-50 text-cyan-600 rounded-full text-[10px] font-black uppercase tracking-[0.3em] border border-cyan-100/50 mb-4">Administrasi Keanggotaan</div>
        <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 leading-tight">Pendaftaran <span class="text-cyan-600">Anggota Baru</span></h1>
        <p class="text-slate-500 font-medium max-w-lg mx-auto">Daftarkan profil anggota untuk membuka akses ke seluruh koleksi literatur kami.</p>
    </div>

    <form action="/members" method="POST" class="bg-white p-12 rounded-[3.5rem] shadow-[0_48px_96px_-24px_rgba(0,0,0,0.06)] border border-slate-50 space-y-10 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-cyan-500 to-cyan-300 opacity-20"></div>
        @csrf
        <div class="grid grid-cols-1 gap-10">
            <div class="space-y-3">
                <label for="name" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Nama Lengkap Identitas</label>
                <input type="text" name="name" id="name" required placeholder="Contoh: Ahmad Subarjo"
                    class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 placeholder:text-slate-300 outline-none">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-3">
                    <label for="email" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Email Aktif</label>
                    <input type="email" name="email" id="email" required placeholder="ahmad@email.co"
                        class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 placeholder:text-slate-300 outline-none">
                </div>

                <div class="space-y-3">
                    <label for="phone" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Nomor Kontak WhatsApp</label>
                    <input type="text" name="phone" id="phone" required placeholder="+62 8..."
                        class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 placeholder:text-slate-300 outline-none">
                </div>
            </div>

            <div class="space-y-3">
                <label for="address" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Alamat Domisili Lengkap</label>
                <textarea name="address" id="address" rows="3" placeholder="Masukkan detail jalan, RT/RW, dan kota"
                    class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 placeholder:text-slate-300 outline-none resize-none"></textarea>
            </div>
        </div>

        <div class="pt-10 flex flex-col gap-6">
            <button type="submit" class="w-full py-6 bg-slate-900 text-white text-xs font-black rounded-3xl shadow-2xl shadow-slate-200 hover:bg-cyan-600 hover:shadow-cyan-100 transition-all active:scale-[0.98] uppercase tracking-[0.4em]">
                Selesaikan Registrasi Anggota
            </button>
            <a href="/members" class="text-center text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] hover:text-rose-500 transition-colors">Batalkan & Kembali</a>
        </div>
    </form>
</div>
@endsection
