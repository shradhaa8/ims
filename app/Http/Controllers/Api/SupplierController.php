<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Validator;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::get();
        if ($suppliers->count() > 0) {
            return SupplierResource::collection($suppliers);
        }
        else {
            return response()->json([
                'message' => 'No Record Found'
            ], 200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'address' => 'required|string',
            'product_id' => 'nullable|exists:products, id'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->messages()
            ], 422);
        }
        $supplier = Supplier::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'product_id' => $request->product_id
        ]);
        return response()->json([
            'message' => 'Supplier Created Successfully',
            'data' => new SupplierResource($supplier)
        ], 200);
    }

    public function show(Supplier $supplier){
        return new SupplierResource($supplier);
    }

    public function update(Request $request, Supplier $supplier){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'address' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->messages()
            ], 422);
        }
        $supplier ->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return response()->json([
            'message' => 'Supplier Updated Successfully',
            'data' => new SupplierResource($supplier) 
        ], 200);
    }

    public function destroy(Supplier $supplier){
        $supplier->delete();
        return response()->json([
            'message' => 'Supplier Deleted Successfully'
        ], 200);
    }

}
