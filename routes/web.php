<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPurchaseController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ModelUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StoreCartController;
use App\Http\Controllers\ThreedController;
use App\Http\Controllers\UpModelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('kinetic-gallery');
Route::get('/exclusives', [LandingController::class, 'exclusives'])->name('exclusives');
Route::get('/free-assets', [LandingController::class, 'freeAssets'])->name('free-assets');
Route::get('/Kinetic-Gallery', [LandingController::class, 'kineticGallery'])->name('landing');

// Carrito rutas
Route::get('/cart', [StoreCartController::class, 'index'])->middleware(['auth'])->name('cart');
Route::post('/cart/add/{model}', [StoreCartController::class, 'add'])->middleware(['auth'])->name('cart.add');
Route::post('/cart/remove/{id}', [StoreCartController::class, 'remove'])->middleware(['auth'])->name('cart.remove');
Route::post('/cart/remove-all', [StoreCartController::class, 'removeAll'])->middleware(['auth'])->name('cart.remove-all');

// Tarjetas de pago
Route::middleware(['auth'])->group(function () {
    Route::get('/cards', [CardController::class, 'index'])->name('cards.index');
    Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
    Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy');
});

// Modelos 3D - rutas usuario autenticado
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/models', [ModelUserController::class, 'index'])->name('models.index');
    Route::get('/models/{threed}', [ModelUserController::class, 'show'])->name('models.show');
    Route::post('/models/{threed}/comment', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/my-models', [PurchaseController::class, 'myModels'])->name('purchases.my-models');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::post('/checkout/single/{threed}', [CheckoutController::class, 'processSingle'])->name('checkout.single');
});

// Rutas para visualización de modelos y comentarios
Route::get('/model/{id}', [ThreedController::class, 'show'])->name('threed.show');
Route::post('/model/{id}/comment', [ThreedController::class, 'addComment'])->name('model.comment')->middleware('auth');

// Admin routes
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

        Route::resource('models', ModelController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::post('models/{model}/enable', [ModelController::class, 'enable'])->name('models.enable');
        Route::post('models/{model}/disable', [ModelController::class, 'disable'])->name('models.disable');

        Route::resource('categories', CategoryController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

        Route::resource('comments', CommentController::class)
            ->only(['index', 'destroy']);

        Route::get('/purchases', [AdminPurchaseController::class, 'index'])->name('purchases.index');
        Route::get('/purchases/{purchase}', [AdminPurchaseController::class, 'show'])->name('purchases.show');

        Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');

        Route::resource('upModel', UpModelController::class)->only(['index']);
    });

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
