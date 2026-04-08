<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $stats = [
        'books' => \App\Models\Book::count(),
        'members' => \App\Models\Member::count(),
        'active_loans' => \App\Models\Loan::where('status', 'borrowed')->count(),
    ];
    return view('landing', compact('stats'));
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Books Routes (Protected by auth)
Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class)->except(['show']);
    Route::resource('members', MemberController::class)->except(['show']);
    Route::resource('loans', LoanController::class)->except(['show', 'edit', 'update']);
    Route::put('/loans/{loan}/return', [LoanController::class, 'return'])->name('loans.return');

    // Report Routes
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
});
