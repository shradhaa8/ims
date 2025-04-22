<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::simplePaginate(8);
        return view('products.index', compact('products'));
    }

    public function store(Request $request){
        $request -> validate([
        'name'=>'required|max:255',
        'description'=>'nullable|string',
        'price'=>'required',
        'category_id'=>'required|exists:categories,id',
        'stock'=>'required|integer'
        ]);
        Product::create ($request ->all());
        return redirect()->route('products.index')->with('success', "Product created successfully");
    }

    public function update(Request $request, $id){
        $request -> validate([
        'name'=>'required|max:255',
        'description'=>'nullable|string',
        'price'=>'required',
        'category_id'=>'required|exists:categories,id',
        'stock'=>'required|integer'
        ]);
        $products = Product::findOrFail($id);
        $products->update($request->all());
        return redirect()->route('products.index')
        ->with('success', 'Product updated successfully');
    }
    public function destroy($id){
        $product = Product::findOrFail($id);
        $product -> delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
    public function create(){
        return view('products.create');
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    
    public function view(Request $request){
        $categories = Category::all();
        $category_id = $request->category_id; 
        $products = Product::when($category_id, function ($query, $category_id){
            return $query->where('category_id', $category_id);
        })->get();
        return view('products.view', compact('products', 'categories', 'category_id'));
    }
    
    
}
