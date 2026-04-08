@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto space-y-8 animate-in fade-in slide-in-from-bottom duration-500">
    <div class="space-y-1 text-center">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Member Registration</h1>
        <p class="text-sm text-gray-500 leading-relaxed max-w-lg mx-auto">Create a new library account for your members to start borrowing.</p>
    </div>

    <form action="/members" method="POST" class="bg-white p-8 rounded-3xl shadow-xl shadow-gray-100 border border-gray-100 space-y-6">
        @csrf
        <div class="grid grid-cols-1 gap-6">
            <div class="space-y-2">
                <label for="name" class="text-sm font-semibold text-gray-700 ml-1">Full Name</label>
                <input type="text" name="name" id="name" required placeholder="John Doe"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 hover:border-gray-300 transition-all placeholder:text-gray-400">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="email" class="text-sm font-semibold text-gray-700 ml-1">Email Address</label>
                    <input type="email" name="email" id="email" required placeholder="john@example.com"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 hover:border-gray-300 transition-all placeholder:text-gray-400">
                </div>

                <div class="space-y-2">
                    <label for="phone" class="text-sm font-semibold text-gray-700 ml-1">Phone Number</label>
                    <input type="text" name="phone" id="phone" required placeholder="+62 822..."
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 hover:border-gray-300 transition-all placeholder:text-gray-400">
                </div>
            </div>

            <div class="space-y-2">
                <label for="address" class="text-sm font-semibold text-gray-700 ml-1">Resident Address</label>
                <textarea name="address" id="address" rows="3" placeholder="Enter full address"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 hover:border-gray-300 transition-all placeholder:text-gray-400 resize-none"></textarea>
            </div>
        </div>

        <div class="pt-4 flex items-center justify-center gap-3">
            <button type="submit" class="w-full px-8 py-4 bg-indigo-600 text-white text-base font-bold rounded-2xl hover:bg-indigo-700 shadow-xl shadow-indigo-100 hover:scale-[1.01] active:scale-95 transition-all">
                Complete Registration
            </button>
        </div>
    </form>
</div>
@endsection
