@extends('layouts.app')

@section('title', 'Koleksi Buku')

@section('content')
<div x-data="{ }" class="space-y-10 animate-in fade-in slide-in-from-bottom duration-700">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-2">
            <div class="flex items-center gap-2 mb-1">
                <span class="w-8 h-1 bg-cyan-600 rounded-full"></span>
                <span class="text-[11px] font-black uppercase tracking-[0.3em] text-cyan-600">Inventory</span>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight text-slate-900">Koleksi Buku</h1>
            <p class="text-slate-500 font-medium max-w-lg">Kelola setiap detail literasi dan pantau ketersediaan stok secara terpusat.</p>
        </div>
        <a href="/books/create" class="inline-flex items-center justify-center gap-3 px-8 py-5 bg-slate-900 text-white text-sm font-black rounded-[2rem] hover:bg-cyan-600 shadow-2xl shadow-slate-200 hover:shadow-cyan-100 transition-all active:scale-95 group uppercase tracking-widest leading-none">
            <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
            Tambah Buku Baru
        </a>
    </div>

    <!-- Data Table Card -->
    <div class="bg-white rounded-[3rem] shadow-[0_40px_80px_-20px_rgba(0,0,0,0.04)] border border-slate-50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100 uppercase text-[11px] font-black tracking-[0.2em] text-slate-400">
                        <th class="px-10 py-7">Informasi Judul</th>
                        <th class="px-10 py-7">Kode ISBN</th>
                        <th class="px-10 py-7 text-center">Stok Unit</th>
                        <th class="px-10 py-7 text-right">Opsi Pengaturan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-sm">
                    @forelse($books as $book)
                    <tr class="hover:bg-slate-50/30 transition-all group">
                        <td class="px-10 py-6">
                            <div class="flex flex-col">
                                <span class="font-extrabold text-slate-900 text-lg leading-tight group-hover:text-cyan-700 transition-colors">{{ $book->title }}</span>
                                <span class="text-[10px] font-bold text-slate-300 uppercase tracking-widest mt-1">Literatur Terverifikasi</span>
                            </div>
                        </td>
                        <td class="px-10 py-6 font-mono text-[11px] text-slate-400 font-bold uppercase tracking-tighter">{{ $book->isbn }}</td>
                        <td class="px-10 py-6 text-center">
                            @if($book->stock <= 0)
                                <span class="px-3 py-1 bg-rose-50 text-rose-600 rounded-full font-black text-[10px] uppercase tracking-widest ring-1 ring-rose-100/50">Stok Habis</span>
                            @else
                                <div class="inline-flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></span>
                                    <span class="font-black text-slate-900 text-base">{{ $book->stock }}</span>
                                </div>
                            @endif
                        </td>
                        <td class="px-10 py-6">
                            <div class="flex items-center justify-end gap-3 transition-all duration-300">
                                <a href="/books/{{ $book->id }}/edit" class="flex items-center justify-center p-3 bg-cyan-50 text-cyan-600 rounded-2xl hover:bg-cyan-600 hover:text-white transition-all shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5M17.14 3.37a2.22 2.22 0 013.13 3.13L11.82 14.95l-3.32.83.83-3.32 8.45-8.45z"></path></svg>
                                </a>
                                <button @click="$dispatch('open-delete-modal', { action: '/books/{{ $book->id }}', title: '{{ $book->title }}' })" 
                                        class="flex items-center justify-center p-3 bg-rose-50 text-rose-500 rounded-2xl hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-10 py-24 text-center">
                            <div class="flex flex-col items-center gap-4 grayscale opacity-20">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <p class="text-sm font-black uppercase tracking-[0.3em]">Belum ada data koleksi tersedia</p>
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
                <p class="text-slate-400 text-sm font-medium leading-relaxed">Anda yakin ingin menghapus <span class="text-slate-900 font-bold" x-text="title"></span>? Tindakan ini bersifat permanen.</p>
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
