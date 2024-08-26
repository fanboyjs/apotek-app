<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($userId)
    {
        $cartItems = Cart::where('user_id', $userId)
                     ->with('product') // Eager load the product details
                     ->get();

         return view('cart.index', compact('cartItems'));
    }

    /**
     * Add new item into cart
     */
    public function add($productId, $userId)
    {
        $product = Product::find($productId);
        $user = User::find($userId);

        if(!$user){
            session()->flash('status', 'Anda belum Login!');


        return redirect()->back();
        }

        if($product){
            session()->flash('status', 'Sudah ada dikeranjang!');


        return redirect()->back();
        }

        $cart = new Cart();

        $cart->quantity = 1;
        $cart->user_id = $userId;
        $cart->product_id = $productId;
        $cart->save();

        session()->flash('status', 'Berhasil ditambahkan');


        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
