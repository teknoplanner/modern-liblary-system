@extends('layouts.app')

@section('content')
<div x-data="{ open: false, action: '', title: '' }" class="space-y-8 animate-in fade-in slide-in-from-bottom duration-500">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="space-y-1">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Book Collection</h1>
            <p class="text-sm text-gray-500 leading-relaxed">Manage your library's physical inventory and stock levels.</p>
        </div>
        <a href="/books/create" class="flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white text-sm font-bold rounded-2xl hover:bg-indigo-700 shadow-xl shadow-indigo-100 transition-all active:scale-95 group">
            <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add New Book
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-xl shadow-gray-100 border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100 uppercase text-[11px] font-bold tracking-[0.1em] text-gray-400">
                        <th class="px-8 py-5">Title</th>
                        <th class="px-8 py-5">ISBN</th>
                        <th class="px-8 py-5 text-center">Stock</th>
                        <th class="px-8 py-5">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 text-sm">
                    @forelse($books as $book)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-8 py-4 font-bold text-gray-900">{{ $book->title }}</td>
                        <td class="px-8 py-4 text-gray-500 font-mono text-xs">{{ $book->isbn }}</td>
                        <td class="px-8 py-4 text-center">
                            @if($book->stock <= 0)
                                <span class="px-2 py-1 bg-rose-50 text-rose-600 rounded-lg font-bold text-xs ring-1 ring-rose-100">Out of Stock</span>
                            @else
                                <span class="font-black text-indigo-600">{{ $book->stock }}</span>
                            @endif
                        </td>
                        <td class="px-8 py-4 flex items-center gap-2">
                            <a href="/books/{{ $book->id }}/edit" class="text-indigo-600 hover:text-indigo-900 font-bold p-2 bg-indigo-50 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-5M17.14 3.37a2.22 2.22 0 013.13 3.13L11.82 14.95l-3.32.83.83-3.32 8.45-8.45z"></path></svg>
                            </a>
                            <button @click="open = true; action = '/books/{{ $book->id }}'; title = '{{ $book->title }}'" 
                                    class="text-rose-600 hover:text-rose-900 font-bold p-2 bg-rose-50 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-12 text-center text-gray-300 italic">No books in collection yet.</td>
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
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </div>

            <div class="space-y-2">
                <h2 class="text-2xl font-black text-slate-900 tracking-tight">Delete Book?</h2>
                <p class="text-slate-400 text-sm font-medium leading-relaxed">Are you sure you want to delete <span class="text-slate-900 font-bold" x-text="title"></span>? This action cannot be undone.</p>
            </div>

            <div class="flex flex-col gap-3 pt-2">
                <form :action="action" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full py-4 bg-rose-600 text-white text-sm font-black rounded-2xl shadow-xl shadow-rose-100 hover:bg-rose-700 transition-all uppercase tracking-widest">
                        Yes, Delete Data
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
