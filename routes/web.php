<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\DashboardController; // Perbaiki nama controller (huruf besar D)

// Route Landing Page
Route::get('/', [FrontEndController::class, 'index'])->name('front.index');

// Dashboard Route (Hanya bisa diakses oleh user yang sudah login dan terverifikasi)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Detail Produk
Route::get('/details/{product:slug}', [FrontEndController::class, 'detail'])->name('front.details');

Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product Resource Routes
    Route::resource('/product', ProductController::class);

    // Category Resource Routes
    Route::resource('/category', CategoryController::class);
    Route::resource('/avatar', AvatarController::class);

    // Checkout & Order
    Route::get('/check-out/{product:slug}', [FrontEndController::class, 'checkout'])->name('front.checkout');
    
    // Order Page
    Route::get('/order', [DashboardController::class, 'order'])->name('dashboard.order');

    // Order Transaction & Success
    Route::get('/order/transaction/success', [DashboardController::class, 'success'])->name('dashboard.success');
    Route::post('/order/transaction/{product:slug}', [DashboardController::class, 'storeOrder'])->name('dashboard.storeorder');
});

// Auth Routes
require __DIR__.'/auth.php';
