<?php

use App\Http\Controllers\Admin\ToolController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Authenticated routes
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Tool management
    Route::resource('tools', ToolController::class);
    
    // Borrowing management
    Route::get('/borrowings', [App\Http\Controllers\Admin\BorrowingController::class, 'index'])->name('borrowings.index');
    Route::get('/borrowings/{borrowing}', [App\Http\Controllers\Admin\BorrowingController::class, 'show'])->name('borrowings.show');
    Route::post('/borrowings/{borrowing}/approve', [App\Http\Controllers\Admin\BorrowingController::class, 'approve'])->name('borrowings.approve');
    Route::post('/borrowings/{borrowing}/reject', [App\Http\Controllers\Admin\BorrowingController::class, 'reject'])->name('borrowings.reject');
    Route::post('/borrowings/{borrowing}/return', [App\Http\Controllers\Admin\BorrowingController::class, 'return'])->name('borrowings.return');
    
    // Reports
    Route::get('/reports', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export', [App\Http\Controllers\Admin\ReportController::class, 'export'])->name('reports.export');
});

// Guru routes
Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', function () {
        return view('guru.dashboard');
    })->name('dashboard');
    
    // Borrowing routes
    Route::resource('borrowings', App\Http\Controllers\Guru\BorrowingController::class);
    Route::patch('/borrowings/{borrowing}/cancel', [App\Http\Controllers\Guru\BorrowingController::class, 'cancel'])->name('borrowings.cancel');
});

Route::get('/', function () {
    return redirect()->route('login');
});
