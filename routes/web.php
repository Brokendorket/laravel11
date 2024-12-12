<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController; // Tambahkan DashboardController
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Untuk tampilan Home (Home Pages)
Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/layanan', [HomeController::class, 'layanan']);
Route::get('/kontak', [HomeController::class, 'kontak']);

// Untuk tampilan Admin (Admin Dashboard and Related Routes)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/inputdata', [AdminController::class, 'inputdata']);
    Route::post('/admin/inputdata', [AdminController::class, 'store'])->name('admin.store');
    
    Route::get('admin/viewdata', [AdminController::class, 'viewdata'])->name('admin.viewdata');
    Route::get('admin/editdata/{id}', [AdminController::class, 'editdata'])->name('admin.editdata');
    Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');

    // Tambahkan route untuk menampilkan dashboard menggunakan DashboardController
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard'); // Route untuk dashboard
});

// Untuk Login (Login and Logout Routes)
Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
