<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
});

Route::get('/category/{category}', function (Category $category) {
    $products = Product::where('category_id', $category->id)->with('category')->get();
    $categories = Category::all();
    return view('category', [
        'products'   => $products,
        'category'   => $category,
        'categories' => $categories,
    ]);
})->name('category');

Route::get('/cart', function () {
    return view('cart.index');
})->name('cart');
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



require __DIR__ . '/auth.php';
