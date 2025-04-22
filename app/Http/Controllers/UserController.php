<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users= User::simplePaginate(3);
        return view('users.index', compact('users'));
    }
    public function store(Request $request){
        $request-> validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'isAdmin'=>'required|boolean',
            'gender'=>'required'
        ]);
        User::create($request->all());
        return redirect()->route('users.index')
        ->with('success', 'User created successfully');
    }
    public function update(Request $request, $id){
        $request -> validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'min:6',
            'isAdmin' => 'required|boolean',
            'gender' => 'required'
        ]);
        $users = User::findOrFail($id);
        $users->update($request->all());
        return redirect()->route('users.index')->with('success', 'user updated successfully');
    }
    public function destroy($id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users.index')->with('success', 'user deleted successfully');
    }
    public function create(){
        return view('users.create');
    }
    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }
    public function dashboard(){
        $transactions = Transaction::where('user_id', auth()->id())->latest()->get();
        return view('users.userdashboard', compact('transactions'));
    }
    public function sales(){
        $transactions = Transaction::where('user_id', auth()->id())->latest()->get();
        return view('users.sales', compact('transactions'));
    }
    public function statistics()
    {
        $totalStaffs = DB::table('users')->count() - 1;
        $totalProducts = DB::table('products')->count();
        $totalSuppliers = DB::table('suppliers')->count();
        $totalCategories = DB::table('categories')->count();

        $mostSoldProducts = Transaction::where('status', 'sales')
            ->select('product_id', DB::raw('SUM(qty) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('product_id')
            ->with('product')
            ->take(3)
            ->get();

        $mostPurchasedProducts = Transaction::where('status', 'purchase')
            ->select('product_id', DB::raw('SUM(qty) as total_purchased'))
            ->groupBy('product_id')
            ->orderByDesc('total_purchased')
            ->with('product')
            ->take(3)
            ->get();

        $topSupplier = Supplier::withCount('products')
            ->orderByDesc('products_count')
            ->take(3)
            ->get();

        return view('admindashboard', compact(
            'totalStaffs', 'totalProducts', 'totalSuppliers', 'totalCategories',
            'mostSoldProducts', 'mostPurchasedProducts', 'topSupplier'
        ));
    }
}

