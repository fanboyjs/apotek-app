<?php

namespace App\Http\Controllers;

use App\Models\ProductTransaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('buyer')) {
            $product_transactions = $user->product_transactions()->orderBy('id', 'DESC')->get();

            return view('product_transactions.index', [
                'product_transactions' => $product_transactions,
            ]);
        } else {
            $product_transactions = ProductTransaction::orderBy('id', 'DESC')->get();

            return view('admin.product_transactions.index', [
                'product_transactions' => $product_transactions,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'subdistrict' => 'required|string|max:255',
            'proof' => 'required|image|mimes:png,jpg,jpeg',
            'notes' => 'required|string|max:65535',
            'phone_number' => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            $totalTransaction = 0;
            $cartItems = $user->carts;

            foreach ($cartItems as $cartItem) {
                $totalTransaction += $cartItem->product->price * $cartItem->quantity;
            }

            $validated['user_id'] = $user->id;
            $validated['total_amount'] = $totalTransaction;
            $validated['is_paid'] = false;

            if ($request->hasFile('proof')) {
                $proofPath = $request->file('proof')->store('payment_proofs', 'public');
                $validated['proof'] = $proofPath;
            }

            $productTransaction = ProductTransaction::create($validated);

            // simpan tiap tiap harga produk nya ke tabel Transaction Detail
            foreach ($cartItems as $cartItem) {
                TransactionDetail::create([
                    'product_transaction_id' => $productTransaction->id,
                    'product_id' => $cartItem->product_id,
                    'price' => $cartItem->product->price,
                ]);

                $cartItem->delete();
            }

            DB::commit();

            return redirect()->route('product_transactions.index');
        } catch (\Throwable $th) {

            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System Error!' . $th->getMessage()],
            ]);

            throw $error;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(ProductTransaction $productTransaction)
    {
        $productTransaction = ProductTransaction::with('transactionDetails.product')->find($productTransaction->id);
        return view('product_transactions.details', [
            'product_transaction' => $productTransaction,
        ]);
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
        $productTransaction->update([
            'is_paid' => true,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductTransaction $productTransaction)
    {
        //
    }
}
