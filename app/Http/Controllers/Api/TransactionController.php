<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Validator;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::get();
        if($transactions->count() > 0){
            return TransactionResource::collection($transactions);
        }
        else{
            return response()->json([
                'message' => 'No Records Found',
            ], 200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'description' => 'nullable',
            'status' => 'required|in:purchase,sales',
            'qty' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'product_name' => 'required|exists:products,name'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->messages(),
            ], 422);
        }
        $transaction = Transaction::create([
            'description' => $request->description,
            'status' => $request->status,
            'qty' => $request->qty,
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'product_name' => $request->product_name
        ]);
        return response()->json([
            'message' =>'Transaction Created Successfully',
            'data' => new TransactionResource($transaction)
        ], 200);
    }

    public function show(Transaction $transaction){
        return new TransactionResource($transaction);
    }

   public function destroy(Transaction $transaction){
        $transaction->delete();
        return response()->json([
            'message' => 'Transaction deleted successfully',
        ], 200);
   }
}
