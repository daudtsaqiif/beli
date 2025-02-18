<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontEndController::class, 'index'])->name('front.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
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
});


require __DIR__.'/auth.php';
