<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product', 'user');
        return view('transactions.index', compact('transactions'));
    }

    public function create(){
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'nullable',
            'status' => 'required|in:purchase,sales',
            'qty' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $product = Product::findOrFail($request->product_id);
        $user = Auth::user();

        Transaction::create([
            'description' => "Transaction for {$product->name}",
            'status' => $request->status,
            'qty' => $request->qty,
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'product_name' =>$product->name
        ]);

        return redirect()->route('transactions.index')->with('success', 'transaction created successfully');
    }
    public function show($id){
        $transaction = Transaction::with('product', 'user')->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    public function destroy($id){
        $transactions = Transaction::findOrFail($id);
        $transactions->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully');
    }
}