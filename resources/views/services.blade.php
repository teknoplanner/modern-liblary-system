@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-16 animate-in fade-in slide-in-from-bottom duration-700">
    <div class="text-center space-y-4">
        <h1 class="text-5xl font-black text-gray-900 tracking-tight sm:text-6xl text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-rose-500">Our Services</h1>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto">Explore everything we offer, from automated cataloging to advanced reporting and member insights.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
        <!-- Service 1 -->
        <div class="p-10 bg-white border border-gray-100 rounded-[3rem] shadow-xl shadow-gray-100 space-y-6 hover:shadow-indigo-100 transition-all duration-500 group">
            <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all transform group-hover:rotate-6 shadow-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <div class="space-y-2">
                <h3 class="text-xl font-bold text-gray-900">Advanced Cataloging</h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">Efficiently organize thousands of titles with ISBN scanning, real-time stock management, and custom categorization.</p>
            </div>
            <div class="flex items-center gap-2 text-xs font-black text-indigo-600 uppercase tracking-widest group-hover:translate-x-2 transition-transform">
                Read More <span class="text-indigo-400">→</span>
            </div>
        </div>

        <!-- Service 2 -->
        <div class="p-10 bg-white border border-gray-100 rounded-[3rem] shadow-xl shadow-gray-100 space-y-6 hover:shadow-emerald-100 transition-all duration-500 group">
            <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all transform group-hover:rotate-6 shadow-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div class="space-y-2">
                <h3 class="text-xl font-bold text-gray-900">Member Analytics</h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">Gain deep insights into your community. Track borrowing habits and member registration with beautiful data visualizations.</p>
            </div>
            <div class="flex items-center gap-2 text-xs font-black text-emerald-600 uppercase tracking-widest group-hover:translate-x-2 transition-transform">
                Read More <span class="text-emerald-400">→</span>
            </div>
        </div>

        <!-- Service 3 -->
        <div class="p-10 bg-white border border-gray-100 rounded-[3rem] shadow-xl shadow-gray-100 space-y-6 hover:shadow-rose-100 transition-all duration-500 group">
            <div class="w-16 h-16 bg-rose-50 rounded-2xl flex items-center justify-center text-rose-600 group-hover:bg-rose-600 group-hover:text-white transition-all transform group-hover:rotate-6 shadow-sm">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <div class="space-y-2">
                <h3 class="text-xl font-bold text-gray-900">Secure Vault</h3>
                <p class="text-sm text-gray-500 leading-relaxed font-medium">Protect sensitive library data with bank-level encryption and custom access permissions for librarians and admins.</p>
            </div>
            <div class="flex items-center gap-2 text-xs font-black text-rose-600 uppercase tracking-widest group-hover:translate-x-2 transition-transform">
                Read More <span class="text-rose-400">→</span>
            </div>
        </div>
    </div>

    <!-- Final CTA -->
    <div class="py-10 text-center">
        <a href="/register" class="px-16 py-6 bg-slate-900 text-white font-black text-lg rounded-[2.5rem] shadow-2xl hover:scale-105 transition-all inline-block uppercase tracking-[0.2em]">Join the Future</a>
    </div>
</div>
@endsection
