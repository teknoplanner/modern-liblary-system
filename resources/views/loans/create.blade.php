@extends('layouts.app')

@section('title', 'Transaksi Pinjam Baru')

@section('content')
<div class="max-w-3xl mx-auto space-y-12 py-10 animate-in fade-in slide-in-from-bottom duration-700">
    <div class="space-y-3">
        <div class="flex items-center gap-2 mb-1">
            <span class="w-8 h-1 bg-cyan-600 rounded-full"></span>
            <span class="text-[11px] font-black uppercase tracking-[0.3em] text-cyan-600">Sirkulasi Koleksi</span>
        </div>
        <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 leading-tight">Transaksi <span class="text-cyan-600">Peminjaman Baru</span></h1>
        <p class="text-slate-500 font-medium max-w-lg">Pastikan ketersediaan stok buku mencukupi sebelum memproses transaksi ini.</p>
    </div>

    <form action="/loans" method="POST" class="bg-white p-12 rounded-[3.5rem] shadow-[0_48px_96px_-24px_rgba(0,0,0,0.06)] border border-slate-50 space-y-10 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-cyan-500 to-cyan-300 opacity-20"></div>
        @csrf
        <div class="grid grid-cols-1 gap-10">
            <div class="space-y-3">
                <label for="member_id" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Nama Anggota Peminjam</label>
                <div class="relative">
                    <select name="member_id" id="member_id" required
                        class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all appearance-none cursor-pointer text-sm font-bold text-slate-700 outline-none">
                        <option value="" disabled selected>-- Pilih Anggota --</option>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->email }})</option>
                        @endforeach
                    </select>
                    <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-slate-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <label for="book_id" class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-1">Koleksi Buku yang Dipinjam</label>
                <div class="relative">
                    <select name="book_id" id="book_id" required
                        class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all appearance-none cursor-pointer text-sm font-bold text-slate-700 outline-none">
                        <option value="" disabled selected>-- Pilih Buku --</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}" {{ $book->stock <= 0 ? 'disabled' : '' }}>
                                {{ $book->title }} (Stok: {{ $book->stock }})
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute right-6 top-1/2 -translate-y-1/2 pointer-events-none text-slate-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <div class="space-y-3 uppercase tracking-widest font-black text-[11px] text-slate-400">
                <label for="loan_date" class="ml-1">Tanggal Transaksi Peminjaman</label>
                <input type="date" name="loan_date" id="loan_date" required value="{{ date('Y-m-d') }}"
                    class="w-full px-8 py-5 bg-slate-50 border border-slate-100 rounded-3xl focus:ring-4 focus:ring-cyan-50 focus:border-cyan-600 focus:bg-white transition-all text-sm font-bold text-slate-700 outline-none">
            </div>
        </div>

        <div class="pt-10 border-t border-slate-50 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-2 text-amber-600 bg-amber-50 px-5 py-2.5 rounded-2xl text-[10px] font-black uppercase tracking-[0.2em]">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                Sinkronisasi Stok Otomatis
            </div>
            <div class="flex items-center gap-6">
                <a href="/loans" class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] hover:text-rose-500 transition-colors">Batal</a>
                <button type="submit" class="px-12 py-5 bg-slate-900 text-white text-xs font-black rounded-2xl shadow-2xl shadow-slate-200 hover:bg-cyan-600 hover:shadow-cyan-100 transition-all active:scale-[0.98] uppercase tracking-[0.3em]">
                    Buat Transaksi
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
