<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        if ($users->count() > 0) {
            return UserResource::collection($users);
        }
        else {
            return response()->json([
                'message' => 'No Records Found'
            ], 200);
        }
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' =>'required|email|unique:users',
            'password' => 'required|min:6',
            'isAdmin' => 'required|boolean',
            'gender' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->messages()
            ], 422);
        }
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'isAdmin' => $request->isAdmin,
            'gender' => $request->gender
        ]);
        return response()->json([
            'message' => 'User Created Successfully',
            'data' => new UserResource($users)
        ], 200);

    }

    public function show(User $user){
        return new UserResource($user);
    }

    public function update(Request $request, User $user){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'min:6',
            'isAdmin' => 'required|boolean',
            'gender' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => 'All fields are required',
                'error' => $validator->messages()
            ],422);
        }
        $user -> update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'isAdmin' => $request->isAdmin,
            'gender' => $request->gender
        ]);
        return response()->json([
            'message' => 'User Updated Successfully',
            'data' => new UserResource($user)
        ],200);
    }

    public function destroy(User $user){
        $user -> delete();
        return response()->json([
            'message' => 'User Deleted Successfully'
        ], 200);
    }
}
