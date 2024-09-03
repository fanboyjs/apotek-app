<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('consumen.cart', compact('cartItems'));
    }

    /**
     * Add new item into cart
     */
    public function add($productId, $userId)
    {
        $product = Cart::where('product_id', $productId)
            ->where('user_id', $userId)
            ->first();
        $user = User::find($userId);

        if (!$user) {
            session()->flash('status', 'Anda belum Login!');

            return redirect()->back();
        }

        if ($product) {
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

    public function order()
    {
        $user = Auth::user();

        $my_orders = $user->carts()->with('product')->get();

        return view('consumen.order', ['name' => 'Dias Pangestu', 'my_orders' => $my_orders]);
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
     * Update the specified resource in storage.
     */
    public function updateQuantity(Request $request)
    {
        $cartItem = Cart::find($request->item_id);

        if (!$cartItem) {
            return redirect()->back()->with('error', 'Item tidak ditemukan.');
        }

        if ($request->action == 'increment') {
            $cartItem->quantity += 1;
            $cartItem->save();
            return redirect()->back()->with('success', 'Jumlah item diperbarui.');
        } elseif ($request->action == 'decrement') {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
                return redirect()->back()->with('success', 'Jumlah item diperbarui.');
            } else {
                $cartItem->delete();
                return redirect()->back()->with('success', 'Item dihapus dari keranjang.');
            }
        }

        return redirect()->back()->with('error', 'Aksi tidak valid.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
