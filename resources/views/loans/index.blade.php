@extends('layouts.app')

@section('content')
<div x-data="{ open: false, action: '', title: '' }" class="space-y-8 animate-in fade-in slide-in-from-bottom duration-500">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="space-y-1">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Loan History</h1>
            <p class="text-sm text-gray-500 leading-relaxed">Manage your current active loans and past history.</p>
        </div>
        <a href="/loans/create" class="flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white text-sm font-bold rounded-2xl hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all active:scale-95 group">
            <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            New Transaction
        </a>
    </div>

    <!-- Loan List Card -->
    <div class="bg-white rounded-3xl shadow-xl shadow-gray-100 border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto ring-1 ring-gray-100">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 uppercase text-[11px] font-bold tracking-[0.1em] text-gray-400">
                        <th class="px-8 py-5">Book Details</th>
                        <th class="px-8 py-5">Member</th>
                        <th class="px-8 py-5">Loan Date</th>
                        <th class="px-8 py-5">Status</th>
                        <th class="px-8 py-5 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 text-sm">
                    @forelse($loans as $loan)
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="px-8 py-4">
                            <div class="flex flex-col">
                                <span class="font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">{{ $loan->book->title }}</span>
                                <span class="text-xs text-gray-400">{{ $loan->book->isbn }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-4">
                            <div class="flex flex-col">
                                <span class="font-semibold text-gray-700">{{ $loan->member->name }}</span>
                                <span class="text-xs text-info">{{ $loan->member->email }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-4">
                            <div class="flex flex-col">
                                <span class="text-gray-600 font-medium">{{ \Carbon\Carbon::parse($loan->loan_date)->toFormattedDateString() }}</span>
                                @if($loan->return_date)
                                    <span class="text-[10px] text-emerald-500 font-bold uppercase tracking-widest mt-0.5">Returned {{ \Carbon\Carbon::parse($loan->return_date)->toFormattedDateString() }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-8 py-4">
                            @if($loan->status === 'borrowed')
                                <span class="px-3.5 py-1.5 bg-amber-50 text-amber-700 text-[11px] font-bold rounded-full border border-amber-100">BORROWED</span>
                            @else
                                <span class="px-3.5 py-1.5 bg-emerald-50 text-emerald-700 text-[11px] font-bold rounded-full border border-emerald-100">RETURNED</span>
                            @endif
                        </td>
                        <td class="px-8 py-4 text-right flex items-center justify-end gap-2">
                            @if($loan->status === 'borrowed')
                                <form action="/loans/{{ $loan->id }}/return" method="POST">
                                    @csrf @method('PUT')
                                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 text-white text-xs font-bold rounded-xl hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-50 active:scale-95">
                                        Return
                                    </button>
                                </form>
                            @endif
                            <button @click="open = true; action = '/loans/{{ $loan->id }}'; title = '{{ $loan->book->title }} for {{ $loan->member->name }}'" 
                                    class="text-rose-600 hover:bg-rose-50 p-2 rounded-xl transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-12 text-center">
                            <div class="flex flex-col items-center justify-center space-y-3 opacity-30">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                <p class="text-sm font-bold tracking-widest uppercase">No loan data available</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modern Confirmation Modal -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[100] flex items-center justify-center p-6 bg-slate-900/60 backdrop-blur-sm" 
         style="display: none;">
        
        <div @click.away="open = false" 
             x-show="open"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="scale-95 translate-y-4 opacity-0"
             x-transition:enter-end="scale-100 translate-y-0 opacity-100"
             class="bg-white rounded-[2.5rem] shadow-2xl shadow-slate-900/20 max-w-sm w-full p-10 text-center space-y-6 border border-slate-100">
            
            <div class="w-20 h-20 bg-rose-50 rounded-3xl flex items-center justify-center text-rose-600 mx-auto shadow-inner">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>

            <div class="space-y-2">
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">Delete Record?</h2>
                <p class="text-slate-400 text-sm font-medium leading-relaxed">Delete borrowing record of <span class="text-slate-900 font-bold" x-text="title"></span>?</p>
            </div>

            <div class="flex flex-col gap-3 pt-2">
                <form :action="action" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full py-4 bg-rose-600 text-white text-sm font-black rounded-2xl shadow-xl shadow-rose-100 hover:bg-rose-700 transition-all uppercase tracking-widest">
                        Yes, Delete Record
                    </button>
                </form>
                <button @click="open = false" class="w-full py-4 bg-slate-50 text-slate-400 text-sm font-black rounded-2xl hover:bg-slate-100 transition-all uppercase tracking-widest">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
