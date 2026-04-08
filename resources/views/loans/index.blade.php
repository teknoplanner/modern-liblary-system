@extends('layouts.app')

@section('title', 'Riwayat Peminjaman')

@section('content')
<div x-data="{ }" class="space-y-12 animate-in fade-in slide-in-from-bottom duration-700">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-2">
            <div class="flex items-center gap-2 mb-1">
                <span class="w-8 h-1 bg-cyan-600 rounded-full"></span>
                <span class="text-[11px] font-black uppercase tracking-[0.3em] text-cyan-600">Log Aktivitas</span>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight text-slate-900">Riwayat Peminjaman</h1>
            <p class="text-slate-500 font-medium max-w-lg">Kelola sirkulasi buku dan pantau status pengembalian secara real-time.</p>
        </div>
        <a href="/loans/create" class="inline-flex items-center justify-center gap-3 px-8 py-5 bg-slate-900 text-white text-sm font-black rounded-[2rem] hover:bg-cyan-600 shadow-2xl shadow-slate-200 hover:shadow-cyan-100 transition-all active:scale-95 group uppercase tracking-widest leading-none">
            <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
            Transaksi Baru
        </a>
    </div>

    <!-- Loan List Card -->
    <div class="bg-white rounded-[3rem] shadow-[0_40px_80px_-20px_rgba(0,0,0,0.04)] border border-slate-50 overflow-hidden">
        <div class="overflow-x-auto ring-1 ring-slate-100/50">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 uppercase text-[11px] font-black tracking-[0.2em] text-slate-400">
                        <th class="px-10 py-7">Informasi Koleksi</th>
                        <th class="px-10 py-7">Identitas Anggota</th>
                        <th class="px-10 py-7">Periode Pinjam</th>
                        <th class="px-10 py-7">Status</th>
                        <th class="px-10 py-7 text-right">Manajemen</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-sm">
                    @forelse($loans as $loan)
                    <tr class="hover:bg-slate-50/30 transition-all group">
                        <td class="px-10 py-6">
                            <div class="flex flex-col">
                                <span class="font-extrabold text-slate-900 text-lg leading-tight group-hover:text-cyan-700 transition-colors">{{ $loan->book->title }}</span>
                                <span class="text-[10px] font-bold text-slate-300 uppercase tracking-widest mt-1">ISBN: {{ $loan->book->isbn }}</span>
                            </div>
                        </td>
                        <td class="px-10 py-6">
                            <div class="flex flex-col">
                                <span class="font-bold text-slate-800">{{ $loan->member->name }}</span>
                                <span class="text-[10px] font-bold text-slate-400">{{ $member->email ?? 'N/A' }}</span>
                            </div>
                        </td>
                        <td class="px-10 py-6">
                            <div class="flex flex-col">
                                <span class="text-slate-600 font-bold">{{ \Carbon\Carbon::parse($loan->loan_date)->translatedFormat('d M Y') }}</span>
                                @if($loan->return_date)
                                    <span class="text-[9px] text-emerald-500 font-black uppercase tracking-widest mt-1 bg-emerald-50 px-2 py-0.5 rounded-full self-start">Kembali: {{ \Carbon\Carbon::parse($loan->return_date)->translatedFormat('d M Y') }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-10 py-6">
                            @if($loan->status === 'borrowed')
                                <span class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-amber-50 text-amber-700 text-[10px] font-black rounded-full ring-1 ring-amber-100/50 uppercase tracking-widest">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                    DIPINJAM
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-emerald-50 text-emerald-700 text-[10px] font-black rounded-full ring-1 ring-emerald-100/50 uppercase tracking-widest">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    DIKEMBALIKAN
                                </span>
                            @endif
                        </td>
                        <td class="px-10 py-6">
                            <div class="flex items-center justify-end gap-3 transition-all duration-300">
                                @if($loan->status === 'borrowed')
                                    <form action="/loans/{{ $loan->id }}/return" method="POST">
                                        @csrf @method('PUT')
                                        <button type="submit" class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-500 text-white text-[10px] font-black rounded-2xl hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-100 active:scale-95 uppercase tracking-widest">
                                            Pengembalian
                                        </button>
                                    </form>
                                @endif
                                <button @click="$dispatch('open-delete-modal', { action: '/loans/{{ $loan->id }}', title: '{{ $loan->book->title }}' })" 
                                        class="flex items-center justify-center p-3 bg-rose-50 text-rose-500 rounded-2xl hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-10 py-24 text-center">
                            <div class="flex flex-col items-center gap-6 grayscale opacity-20">
                                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                <p class="text-sm font-black uppercase tracking-[0.3em]">Tidak ada riwayat transaksi tersedia</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('modals')
    <!-- Global Delete Modal Listening for Events -->
    <div x-data="{ open: false, action: '', title: '' }" 
         @open-delete-modal.window="open = true; action = $event.detail.action; title = $event.detail.title"
         x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[9999] flex items-center justify-center p-6 bg-slate-950/60 backdrop-blur-md" 
         style="display: none;">
        
        <div @click.away="open = false" 
             x-show="open"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="scale-95 translate-y-10 opacity-0"
             x-transition:enter-end="scale-100 translate-y-0 opacity-100"
             class="bg-white rounded-[3rem] shadow-2xl shadow-slate-950/20 max-w-sm w-full p-12 text-center space-y-8 border border-slate-100">
            
            <div class="w-24 h-24 bg-rose-50 rounded-[2rem] flex items-center justify-center text-rose-500 mx-auto shadow-inner ring-4 ring-rose-50/50">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </div>

            <div class="space-y-3">
                <h2 class="text-3xl font-black text-slate-900 tracking-tight">Hapus Data?</h2>
                <p class="text-slate-400 text-sm font-medium leading-relaxed">Anda yakin ingin menghapus catatan <span class="text-slate-900 font-bold" x-text="title"></span>? Tindakan ini bersifat permanen.</p>
            </div>

            <div class="flex flex-col gap-4 pt-4">
                <form :action="action" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full py-5 bg-rose-600 text-white text-xs font-black rounded-2xl shadow-xl shadow-rose-200 hover:bg-rose-700 transition-all uppercase tracking-[0.2em]">
                        Ya, Hapus Data
                    </button>
                </form>
                <button @click="open = false" class="w-full py-5 bg-slate-50 text-slate-400 text-xs font-black rounded-2xl hover:bg-slate-100 transition-all uppercase tracking-[0.2em]">
                    Batalkan
                </button>
            </div>
        </div>
    </div>
@endpush
