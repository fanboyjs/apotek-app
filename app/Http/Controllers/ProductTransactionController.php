<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductTransaction;
use Illuminate\Http\Request;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $userId = $request->user()->id;
        $cartItems = Cart::where('user_id', $userId)
                     ->with('product') // Eager load the product details
                     ->get();
        $totalAmount = $cartItems->sum(function($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });
        return view('order.index', compact('totalAmount'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        //
        $userId = $request->user()->id;
        $transferSlipPath = null;
        if ($request->hasFile('transfer_slip')) {
            $transferSlipPath = $request->file('transfer_slip')->store('transfer_slips', 'public');
        }

        $cartItems = Cart::where('user_id', $userId)
                     ->with('product') // Eager load the product details
                     ->get();
        
        $products = $cartItems->map(function($cartItem) {
                    return [
                        'product_id' => $cartItem->product_id,
                        'name' => $cartItem->product->name,
                        'price' => $cartItem->product->price,
                        'quantity' => $cartItem->quantity,
                        'subtotal' => $cartItem->product->price * $cartItem->quantity,
                        ];
        })->toArray();
        
        $totalAmount = $cartItems->sum(function($cartItem) {
                    return $cartItem->product->price * $cartItem->quantity;
        });
        
        $transaction = ProductTransaction::create([
            'user_id' => $userId,
            'address' => $request->address,
            'post_code' => $request->post_code,
            'phone_number' => $request->phone_number,
            'proof' => $request->proof,
            'city' => $request->city,
            'is_paid' => false,
            'total_amount' => $totalAmount,
            'notes' => $request->notes,
            'products' => json_encode($products), // Store the cart items in the products field as JSON
            'transfer_slip' => $transferSlipPath, // Save the transfer slip path
        ]);
            $transaction;
        // Optionally, you might want to clear the cart after the transaction is created
        Cart::where('user_id', $userId)->delete();
    
        session()->flash('status', 'Pesanan Berhasil');

        
        return redirect('/history');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductTransaction $productTransaction)
    {
        //
    }
}
