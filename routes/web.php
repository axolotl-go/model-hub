<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\StoreCartController;
use App\Http\Controllers\UpModelController;
use App\Http\Controllers\UserController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/exclusives', [LandingController::class, 'exclusives'])->name('exclusives');
Route::get('/free-assets', [LandingController::class, 'freeAssets'])->name('free-assets');

Route::get('/cart', [StoreCartController::class, 'index'])->middleware(['auth'])->name('cart');


Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('/', AdminController::class)->only('index');

        Route::resource('users', UserController::class)->only(['index']);

        Route::resource('models', ModelController::class)->only(['index']);
        
        Route::resource('upModel', UpModelController::class)->only(['index']);

        Route::resource('sales', SalesController::class)->only(['index']);
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/detalleModelo', function() {
    return view('detalleModelo.detalleModelo');
})->middleware(['auth', 'verified'])->name('detalleModelo');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
