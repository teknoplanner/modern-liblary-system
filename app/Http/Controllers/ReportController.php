<?php

namespace App\Http\Controllers;

use App\Models\Loan;

class ReportController extends Controller {
    public function index() {
        // Daftar buku yang sedang dipinjam
        $borrowedLoans = Loan::with(['book', 'member'])
            ->where('status', 'borrowed')
            ->latest()
            ->get();

        return view('reports.index', ['loans' => $borrowedLoans]);
    }
}
