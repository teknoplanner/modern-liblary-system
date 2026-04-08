@extends('layouts.app')

@section('title', 'Laporan Analisis')

@section('content')
<div class="space-y-12 animate-in fade-in slide-in-from-bottom duration-700">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-2">
            <div class="flex items-center gap-2 mb-1">
                <span class="w-8 h-1 bg-cyan-600 rounded-full"></span>
                <span class="text-[11px] font-black uppercase tracking-[0.3em] text-cyan-600">Laporan Digital</span>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 leading-tight">Ikhtisar <span class="text-cyan-600">Sirkulasi</span></h1>
            <p class="text-slate-500 font-medium max-w-lg">Monitoring harian terhadap seluruh koleksi yang sedang berada dalam masa peminjaman.</p>
        </div>
        <div class="flex items-center gap-6 bg-white shadow-2xl shadow-slate-200/50 p-6 rounded-[2rem] border border-slate-50">
            <div class="flex flex-col">
                <span class="text-[10px] text-slate-400 font-black uppercase tracking-[0.2em] leading-none mb-2">Total Aktif</span>
                <span class="text-3xl font-black text-cyan-600 leading-tight">{{ $loans->count() }}</span>
            </div>
            <div class="w-px h-10 bg-slate-100"></div>
            <div class="flex flex-col">
                <span class="text-[10px] text-slate-400 font-black uppercase tracking-[0.2em] leading-none mb-2">Pembaruan</span>
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-xs text-slate-600 font-bold">{{ date('d M Y') }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Minimalist Cards List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($loans as $loan)
        <div class="group bg-white rounded-[3rem] p-10 shadow-[0_32px_64px_-16px_rgba(0,0,0,0.04)] hover:shadow-cyan-100/40 border border-slate-50 transition-all hover:-translate-y-2 duration-500">
            <div class="flex items-start justify-between mb-8">
                <div class="w-16 h-16 bg-cyan-50 rounded-[1.5rem] flex items-center justify-center text-cyan-600 shadow-sm border border-cyan-100/50 group-hover:bg-cyan-600 group-hover:text-white transition-all duration-500 shadow-cyan-100">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <span class="inline-flex items-center gap-1.5 px-4 py-2 bg-amber-50 text-amber-600 text-[10px] font-black uppercase tracking-widest rounded-full border border-amber-100 shadow-sm shadow-amber-50">
                    DIPINJAM
                </span>
            </div>

            <div class="space-y-3">
                <h3 class="text-xl font-extrabold text-slate-900 group-hover:text-cyan-700 transition-colors leading-tight">{{ $loan->book->title }}</h3>
                <div class="flex items-center gap-2 text-xs font-bold text-slate-400 bg-slate-50 self-start px-3 py-1.5 rounded-xl border border-slate-100/50">
                    <svg class="w-4 h-4 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    {{ $loan->member->name }}
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-slate-50 flex items-center justify-between">
                <div class="flex flex-col gap-1">
                    <span class="text-slate-300 font-black uppercase tracking-widest text-[9px]">Tanggal Pinjam</span>
                    <span class="text-slate-600 font-bold text-xs">{{ \Carbon\Carbon::parse($loan->loan_date)->translatedFormat('d F Y') }}</span>
                </div>
                <div class="w-12 h-12 rounded-2xl border border-slate-100 flex items-center justify-center text-slate-200 group-hover:border-cyan-100 group-hover:text-cyan-200 transition-all duration-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full py-40 text-center select-none">
            <div class="flex flex-col items-center gap-8 grayscale opacity-20">
                <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <div class="space-y-2">
                    <p class="text-2xl font-black uppercase tracking-[0.3em] text-slate-900 leading-none">Status Nihil</p>
                    <p class="text-sm font-bold text-slate-500">Seluruh koleksi saat ini tersedia dalam rak perpustakaan.</p>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
