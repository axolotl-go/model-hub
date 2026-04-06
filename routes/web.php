<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\StoreCartController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/exclusives', [LandingController::class, 'exclusives'])->name('exclusives');
Route::get('/free-assets', [LandingController::class, 'freeAssets'])->name('free-assets');

Route::get('/cart', [StoreCartController::class, 'index'])->middleware(['auth'])->name('cart');

Route::get('/admin', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
