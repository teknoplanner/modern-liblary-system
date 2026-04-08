@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-12 animate-in fade-in slide-in-from-bottom duration-700">
    <div class="text-center space-y-4">
        <h1 class="text-4xl font-black text-gray-900 tracking-tight sm:text-5xl">About Lumina Library</h1>
        <p class="text-lg text-gray-500 max-w-2xl mx-auto">Elevating the way knowledge is preserved and shared through modern technology.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <h2 class="text-2xl font-bold text-gray-900 border-l-4 border-indigo-600 pl-4">Our Mission</h2>
            <p class="text-gray-600 leading-relaxed">
                Lumina Library provides a seamless management experience for modern educational institutions. We believe that technology should empower librarians, not complicate their work.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Our platform is built on the pillars of speed, reliability, and user-centric design, ensuring that every book and every member is accounted for with minimal effort.
            </p>
        </div>
        <div class="bg-indigo-50 p-8 rounded-[2.5rem] shadow-inner">
            <div class="grid grid-cols-2 gap-4">
                <div class="p-4 bg-white rounded-2xl shadow-sm text-center">
                    <div class="text-2xl font-bold text-indigo-600">2026</div>
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Founded</div>
                </div>
                <div class="p-4 bg-white rounded-2xl shadow-sm text-center">
                    <div class="text-2xl font-bold text-indigo-600">100%</div>
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Digital</div>
                </div>
            </div>
            <div class="mt-4 p-6 bg-indigo-600 rounded-3xl text-white text-center">
                <p class="text-sm font-medium italic">"Knowledge is power, but management is the key."</p>
            </div>
        </div>
    </div>
</div>
@endsection
