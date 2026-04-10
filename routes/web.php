<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\StoreCartController;
use App\Http\Controllers\ThreedController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/exclusives', [LandingController::class, 'exclusives'])->name('exclusives');
Route::get('/free-assets', [LandingController::class, 'freeAssets'])->name('free-assets');

Route::get('/cart', [StoreCartController::class, 'index'])->middleware(['auth'])->name('cart');
Route::post('/cart', [StoreCartController::class, 'remove'])->name('remove.item');
Route::post('/cart', [StoreCartController::class, 'removeAll'])->name('remove.all');

Route::get('/admin', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('admin');

route::get('/threed/{id?}', [ThreedController::class, 'index'])->middleware(['auth'])->name('threed');

Route::get('/dashboard', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/MyModels', [ProfileController::class, 'MyModels'])->middleware(['auth', 'verified'])->name('MyModels');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
