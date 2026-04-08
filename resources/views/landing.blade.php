@extends('layouts.app')

@section('content')
<div class="relative bg-white pt-16 pb-32 overflow-hidden">
    <!-- Background patterns -->
    <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-indigo-50/50 to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-16">
            <div class="lg:col-span-6">
                <div class="max-w-2xl sm:text-center lg:text-left">
                    <div class="inline-flex items-center space-x-4">
                        <span class="rounded-full bg-indigo-600/10 px-3 py-1 text-sm font-semibold leading-6 text-indigo-600 ring-1 ring-inset ring-indigo-600/10">v1.0.0</span>
                        <span class="text-sm font-medium text-gray-500">Modern Library System</span>
                    </div>
                    <h1 class="mt-8 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-6xl">
                        Modern Library Management, <span class="text-indigo-600">Elevated</span>.
                    </h1>
                    <p class="mt-6 text-xl leading-relaxed text-gray-600">
                        Manage your books, track members, and handle loans with a seamless, high-performance interface designed for the modern age.
                    </p>
                    <div class="mt-10 flex items-center justify-center lg:justify-start gap-x-6">
                        <a href="/login" class="rounded-2xl bg-indigo-600 px-8 py-4 text-base font-bold text-white shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition-all active:scale-95">Get Started</a>
                        <a href="/register" class="text-base font-bold text-gray-900 hover:text-indigo-600 transition-colors">Create Account <span aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
            
            <div class="mt-16 sm:mt-24 lg:mt-0 lg:col-span-6">
                <div class="relative max-w-lg mx-auto lg:max-w-none">
                    <!-- Glassmorphism Card -->
                    <div class="relative bg-white/40 backdrop-blur-xl border border-white/40 shadow-2xl rounded-[3rem] p-10 ring-1 ring-black/5">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="rounded-3xl bg-white p-6 shadow-sm border border-gray-100 transform hover:-translate-y-1 transition-all">
                                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                                <h3 class="font-black text-gray-900 text-sm uppercase tracking-widest">Catalog</h3>
                                <div class="mt-2 h-1.5 w-1/2 bg-indigo-100 rounded-full"></div>
                            </div>
                            <div class="rounded-3xl bg-white p-6 shadow-sm border border-gray-100 transform hover:-translate-y-1 transition-all delay-75">
                                <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center text-white mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <h3 class="font-black text-gray-900 text-sm uppercase tracking-widest">Members</h3>
                                <div class="mt-2 h-1.5 w-1/3 bg-emerald-100 rounded-full"></div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section with more whitespace -->
    <div class="bg-slate-50 border-t border-gray-100 py-32 relative overflow-hidden">
        <!-- Decoration background -->
        <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#6366f1 1px, transparent 1px); background-size: 30px 30px;"></div>
        
        <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
            <div class="text-center mb-16 space-y-4">
                <h2 class="text-xs font-black text-indigo-600 uppercase tracking-[0.3em]">Snapshot</h2>
                <p class="text-4xl font-extrabold text-gray-900 tracking-tight">Library Growth in Real-time</p>
            </div>

            <dl class="grid grid-cols-1 gap-8 text-center lg:grid-cols-3">
                <div class="bg-white p-12 rounded-[3rem] shadow-2xl shadow-gray-200 border border-gray-100 transform hover:-translate-y-2 transition-all duration-500">
                    <dt class="text-sm font-black text-gray-400 uppercase tracking-widest mb-4">Total Books</dt>
                    <dd class="text-6xl font-black tracking-tight text-indigo-600">{{ $stats['books'] }}</dd>
                </div>
                <div class="bg-white p-12 rounded-[3rem] shadow-2xl shadow-gray-200 border border-gray-100 transform hover:-translate-y-2 transition-all duration-500 delay-75">
                    <dt class="text-sm font-black text-gray-400 uppercase tracking-widest mb-4">Active Members</dt>
                    <dd class="text-6xl font-black tracking-tight text-emerald-500">{{ $stats['members'] }}</dd>
                </div>
                <div class="bg-white p-12 rounded-[3rem] shadow-2xl shadow-gray-200 border border-gray-100 transform hover:-translate-y-2 transition-all duration-500 delay-150">
                    <dt class="text-sm font-black text-gray-400 uppercase tracking-widest mb-4">Ongoing Loans</dt>
                    <dd class="text-6xl font-black tracking-tight text-rose-500">{{ $stats['active_loans'] }}</dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection
