<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->orderBy('id', 'DESC')->get();

        return view('consumen.index', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function category(Category $category)
    {
        $products = Product::where('category_id', $category->id)->with('category')->get();
        $categories = Category::all();
        return view('category', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
