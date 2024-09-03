<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/search', [FrontController::class, 'search'])->name('search');
Route::get('/category/{category}', [FrontController::class, 'category'])->name('category');

Route::get('/order', [CartController::class, 'order'])->name('order');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('product_transactions', ProductTransactionController::class);

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('products', ProductController::class)->middleware('role:owner');
        Route::resource('categories', CategoryController::class)->middleware('role:owner');
    });
});

// Add items to cart

Route::get('/cart/add/{productId}/{userId}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/{userId}', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');

require __DIR__ . '/auth.php';
