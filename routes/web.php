<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Category::all();
    $products = Product::with('category')->orderBy('id', 'DESC')->get();

    return view('home', [
        'categories' => $categories,
        'products'   => $products,
    ]);
})->name('home');

Route::get('/category/{category}', function (Category $category) {
    $products = Product::where('category_id', $category->id)->with('category')->get();
    $categories = Category::all();
    return view('category', [
        'products'   => $products,
        'category'   => $category,
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

// Transaction

Route::get('/order', [ProductTransactionController::class, 'create'])->name('order');
Route::post('/create-transaction', [ProductTransactionController::class, 'store'])->name('transactions.store');

// Riwayat Pesanan
Route::get('/history', function () {
    return view('history.index');
})->name('history');

require __DIR__ . '/auth.php';
