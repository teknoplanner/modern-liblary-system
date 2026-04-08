@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto space-y-8 animate-in fade-in slide-in-from-bottom duration-500">
    <div class="space-y-1">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">New Loan Transaction</h1>
        <p class="text-sm text-gray-500 leading-relaxed max-w-lg">Initiate a book borrowing process by selecting the member and the book.</p>
    </div>

    <form action="/loans" method="POST" class="bg-white p-8 rounded-3xl shadow-xl shadow-gray-100 border border-gray-100 space-y-6">
        @csrf
        <div class="grid grid-cols-1 gap-6">
            <div class="space-y-2">
                <label for="member_id" class="text-sm font-semibold text-gray-700 ml-1">Select Member</label>
                <select name="member_id" id="member_id" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 hover:border-gray-300 transition-all appearance-none cursor-pointer">
                    <option value="" disabled selected>-- Choose Member --</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-2">
                <label for="book_id" class="text-sm font-semibold text-gray-700 ml-1">Select Book</label>
                <select name="book_id" id="book_id" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 hover:border-gray-300 transition-all appearance-none cursor-pointer">
                    <option value="" disabled selected>-- Choose Book --</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }} (Stock: {{ $book->stock }})</option>
                    @endforeach
                </select>
            </div>

            <div class="space-y-2">
                <label for="loan_date" class="text-sm font-semibold text-gray-700 ml-1">Loan Date</label>
                <input type="date" name="loan_date" id="loan_date" required value="{{ date('Y-m-d') }}"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 hover:border-gray-300 transition-all">
            </div>
        </div>

        <div class="pt-6 border-t border-gray-50 flex items-center justify-between">
            <div class="flex items-center gap-2 text-amber-600 bg-amber-50 px-3 py-1.5 rounded-lg text-xs font-semibold uppercase tracking-wider">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                Auto Decrement Stock
            </div>
            <button type="submit" class="px-10 py-3.5 bg-indigo-600 text-white text-sm font-bold rounded-2xl hover:bg-indigo-700 shadow-xl shadow-indigo-100 hover:shadow-indigo-200 transition-all active:scale-95">
                Issue Loan
            </button>
        </div>
    </form>
</div>
@endsection
