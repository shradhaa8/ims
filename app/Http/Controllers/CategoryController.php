<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::simplePaginate(8);perPage: 
        return view('categories.index', compact('categories'));
    }
    public function store(Request $request){
        $request -> validate([
            'name' => 'required|max:255',
            'description' => 'required'
        ]);
        Category::create($request -> all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function update(Request $request, $id){
        $request -> validate([
            'name' => 'required|max:255',
            'description' => 'required'
        ]);

        $categories = Category::findOrFail($id);
        $categories->update($request->all());
        return redirect()->route('categories.index')->with('success', 'category updated successfully');
    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category -> delete();
        return redirect()->route('categories.index')->with('success', 'category deleted successfully');
    }

    public function create(){
        return view('categories.create');
    }

    public function show($id){
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }
}
