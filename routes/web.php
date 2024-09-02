<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('home');

Route::get('/category/{category}', function (Category $category) {
    $products = Product::where('category_id', $category->id)->with('category')->get();
    $categories = Category::all();
    return view('category', [
        'products' => $products,
        'category' => $category,
        'categories' => $categories,
    ]);
})->name('category');

Route::get('/order', function () {
    return view('order.index');
})->name('order');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('products', ProductController::class)->middleware('role:owner');
        Route::resource('categories', CategoryController::class)->middleware('role:owner');
    });
});

// Add items to cart

Route::get('/cart/add/{productId}/{userId}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/{userId}', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])->name('cart.quantity');

require __DIR__ . '/auth.php';
