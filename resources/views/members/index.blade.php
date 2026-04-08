@extends('layouts.app')

@section('title', 'Database Anggota')

@section('content')
<div x-data="{ }" class="space-y-12 animate-in fade-in slide-in-from-bottom duration-700">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-2">
            <div class="flex items-center gap-2 mb-1">
                <span class="w-8 h-1 bg-cyan-600 rounded-full"></span>
                <span class="text-[11px] font-black uppercase tracking-[0.3em] text-cyan-600">Direktori Anggota</span>
            </div>
            <h1 class="text-4xl font-extrabold tracking-tight text-slate-900">Database Anggota</h1>
            <p class="text-slate-500 font-medium max-w-lg">Pantau profil dan aktivitas literasi seluruh anggota dalam ekosistem perpustakaan.</p>
        </div>
        <a href="/members/create" class="inline-flex items-center justify-center gap-3 px-8 py-5 bg-slate-900 text-white text-sm font-black rounded-[2rem] hover:bg-cyan-600 shadow-2xl shadow-slate-200 hover:shadow-cyan-100 transition-all active:scale-95 group uppercase tracking-widest leading-none">
            <svg class="w-5 h-5 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            Registrasi Anggota
        </a>
    </div>

    <!-- Members Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($members as $member)
        <div class="bg-white p-8 rounded-[3rem] shadow-[0_32px_64px_-16px_rgba(0,0,0,0.04)] border border-slate-50 hover:border-cyan-100 transition-all group relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-cyan-500/5 blur-3xl rounded-full -mr-10 -mt-10 group-hover:bg-cyan-500/10 transition-colors"></div>
            
            <div class="flex items-center gap-5 relative z-10">
                <div class="w-16 h-16 bg-cyan-50 rounded-[1.5rem] flex items-center justify-center text-cyan-600 font-extrabold text-2xl group-hover:bg-cyan-600 group-hover:text-white group-hover:rotate-3 transition-all duration-500 shadow-sm shadow-cyan-100">
                    {{ substr($member->name, 0, 1) }}
                </div>
                <div class="flex flex-col">
                    <h3 class="font-extrabold text-slate-900 text-lg leading-tight group-hover:text-cyan-700 transition-colors">{{ $member->name }}</h3>
                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mt-0.5">{{ $member->email }}</span>
                </div>
            </div>
            
            <div class="pt-6 mt-6 border-t border-slate-50 flex items-center justify-between relative z-10">
                <div class="flex items-center gap-3">
                    <a href="/members/{{ $member->id }}/edit" class="flex items-center justify-center p-3 bg-cyan-50 text-cyan-600 rounded-2xl hover:bg-cyan-600 hover:text-white transition-all shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5M17.14 3.37a2.22 2.22 0 013.13 3.13L11.82 14.95l-3.32.83.83-3.32 8.45-8.45z"></path></svg>
                    </a>
                    <button @click="$dispatch('open-delete-modal', { action: '/members/{{ $member->id }}', title: '{{ $member->name }}' })" 
                            class="flex items-center justify-center p-3 bg-rose-50 text-rose-500 rounded-2xl hover:bg-rose-500 hover:text-white transition-all shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </div>
                <div class="flex flex-col items-end">
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-cyan-600">UID Anggota</span>
                    <span class="font-mono text-xs font-bold text-slate-300">#{{ str_pad($member->id, 5, '0', STR_PAD_LEFT) }}</span>
                </div>
            </div>

            @if($member->address)
            <div class="mt-4 p-4 bg-slate-50/50 rounded-2xl border border-slate-100 group-hover:bg-cyan-50/30 transition-colors">
                <p class="text-[11px] text-slate-500 font-medium italic leading-relaxed">
                    {{ $member->address }}
                </p>
            </div>
            @endif
        </div>
        @empty
        <div class="col-span-full py-32 text-center">
            <div class="flex flex-col items-center gap-6 grayscale opacity-20">
                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                <p class="text-sm font-black uppercase tracking-[0.3em]">Belum ada anggota terdaftar</p>
            </div>
        </div>
        @endforelse
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
