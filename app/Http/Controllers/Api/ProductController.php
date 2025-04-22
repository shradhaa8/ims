<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        if($products->count() > 0){
            return ProductResource::collection($products);
        }
        else{
            return response()->json(['message' => 'No record available'], 200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'description'=>'nullable|string',
            'price'=>'required',
            'category_id'=>'required|exists:categories,id',
            'stock'=>'required|integer'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->messages(),
            ], 422);
        }
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price'=> $request->price,
            'category_id' => $request->category_id,
            'stock' =>$request->stock
        ]);
        return response()->json([
            'message' =>'Product Created Successfully',
            'data' => new ProductResource($product)
        ], 200);
    }
    public function show(Product $product){
        return new ProductResource($product);
    }

    public function update(Request $request, Product $product){
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'description'=>'nullable|string',
            'price'=>'required',
            'category_id'=>'required|exists:categories,id',
            'stock'=>'required|integer'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->messages(),
            ], 422);
        }
        $product -> update([
            'name' => $request->name,
            'description' => $request->description,
            'price'=> $request->price,
            'category_id' => $request->category_id,
            'stock' =>$request->stock
        ]);
        return response()->json([
            'message' =>'Product Updated Successfully',
            'data' => new ProductResource($product)
        ], 200);
    }

    public function destroy(Product $product){
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
