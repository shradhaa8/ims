<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::get();
        if ($categories->count() > 0) {
            return CategoryResource::collection($categories);
        }
        else{
            return response()->json(['message' => 'No records found'], 200);
        }
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'description' => 'required|string' 
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->messages()
            ], 422);
        }
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return response()->json([
            'message' => 'Category Created Successfully',
            'data' => new CategoryResource($category)
        ],200);
    }

    public function show(Category $category){
        return new CategoryResource($category);
    }

    public function update(Request $request, Category $category){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|string'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->messages()
            ], 422);
        }
        $category->update([
            'name' => $request->name,
            'descriotion' => $request->description
        ]);
        return response()->json([
            'message' => 'Category updated successfully',
            'data' => new CategoryResource($category)
        ], 200);
    }

    public function destroy(Category $category){
        $category->delete();
        return response()->json([
            'message' => 'Category deleted successfully'
        ], 200);
    }
}
