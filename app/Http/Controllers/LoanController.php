<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller {
    public function index() {
        return view('loans.index', ['loans' => Loan::with(['book', 'member'])->latest()->get()]);
    }

    public function create() {
        return view('loans.create', [
            'books' => Book::where('stock', '>', 0)->get(),
            'members' => Member::all()
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'loan_date' => 'required|date',
        ]);

        $book = Book::findOrFail($request->book_id);
        if($book->stock <= 0) {
            return back()->with('error', 'Stok buku habis.');
        }

        Loan::create([
            'book_id' => $request->book_id,
            'member_id' => $request->member_id,
            'loan_date' => $request->loan_date,
            'status' => 'borrowed'
        ]);

        $book->decrement('stock');

        return redirect()->route('loans.index')->with('success', 'Peminjaman berhasil.');
    }

    public function return(Loan $loan) {
        if($loan->status === 'returned') {
            return back()->with('error', 'Buku sudah dikembalikan.');
        }

        $loan->update([
            'status' => 'returned',
            'return_date' => now()
        ]);

        $loan->book->increment('stock');

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }

    public function destroy(Loan $loan) {
        // If it's still borrowed, restore stock
        if($loan->status === 'borrowed') {
            $loan->book->increment('stock');
        }
        $loan->delete();
        return redirect()->route('loans.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
