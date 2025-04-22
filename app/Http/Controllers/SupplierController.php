<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::with('products')->get();
        return view('suppliers.index', compact('suppliers'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=> 'required|max:255',
            'phone'=> 'required',
            'address'=> 'required|string',
            'product_id' => 'nullable|exists:products,id',
        ]);
        $supplier = Supplier::create($request->only(['name', 'phone', 'address']));
        if ($request->has('product_id')) {
            $supplier->products()->attach($request->product_id);
        }
        return redirect()->route('suppliers.index')->with('success', 'Supplier created and product attached successfully');
    }
    
    public function update(Request $request, $id){
        $request->validate([
            'name'=> 'required|max:255',
            'phone'=> 'required',
            'address'=>'required',
            'product_id' =>'nullable'
        ]);
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->only(['name', 'phone', 'address']));
        $supplier->products()->sync($request->product_id);
        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully');
    }

    public function destroy($id){
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully');
    }

    public function create(){
        $products = Product::all();
        return view('suppliers.create', compact('products'));
    }
    
    public function show($id){
        $supplier = Supplier::with('products')->findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }

    public function edit( $id){
        $supplier = Supplier::with('products')->findOrFail($id);
        $products = Product::all();
        return view('suppliers.edit', compact('supplier', 'products'));
    }
}
