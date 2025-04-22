<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SellController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product', 'user' )->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'description' => 'nullable|string',
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $status = $request->status;
        if($status === 'sales'){
            if($product->stock < $request->qty){
                return redirect()->back()->with('error', 'Not enough stock');
            }
            $product->decreaseStock($request->qty);
        }
        else{
            if(!auth()->user()->isAdmin){
                return redirect()->back()->with('error', 'Only admin can purchase product');
            }
            $product->increaseStock($request->qty);
        }
        Transaction::create([
            'description' => "Transaction for {$product->name}",
            'status' => $status,
            'qty' => $request->qty,
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'product_name' => $product->name
        ]);
        if(auth()->user()->isAdmin){
        return redirect()->route('transactions.index')->with('success', 'Product sold successfully.');
        }
        else{
            return redirect()->route('users.sales')->with('success', 'Product sold successfully');
        }
    }

}
