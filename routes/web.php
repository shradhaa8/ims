<?php

use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

use App\Mail\LowStockAlert;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Tests\Fixtures\AttributeFixtures\RouteWithEnv;


Route::get('/', function(){
    return redirect()->route('login');
});
Route::get('/home', function () {
    return redirect()->route('admindashboard');
})->name('home');

Route::get('login', [AuthManagerController::class, 'login'])->name('login');
Route::post('/login', [AuthManagerController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [AuthManagerController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){
    Route::middleware(['admin'])->group(function(){
        Route::get('/admindashboard', function(){
            return view('admindashboard');
        })->name('admindashboard');
        Route::resource('/dashboard', DashboardController::class);
    });
    Route::get('/dashboard',[DashboardController::class,'viewDashboard'])->name('userdashboard');
});


Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users', 'store')->name('users.store');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit');
    Route::get('/users/{user}', 'show')->name('users.show');
    Route::put('/users/{user}', 'update')->name('users.update');
    Route::delete('/users/{user}', 'destroy')->name('users.destroy');
    Route::middleware('auth')->get('my-sales', 'sales')->name('users.sales');
    
});

Route::resource('/products', ProductController::class);

Route::resource('/suppliers', SupplierController::class);

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/create', 'create')->name('categories.create');
    Route::post('/categories', 'store')->name('categories.store');
    Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
    Route::get('/categories/{category}', 'show')->name('categories.show');
    Route::put('/categories/{category}', 'update')->name('categories.update');
    Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
});

Route::controller(TransactionController::class)->group(function(){
    Route::get('/transactions', 'index')->name('transactions.index');
    Route::get('/transactions/create', 'create')->name('transactions.create');
    Route::post('/transactions', 'store')->name('transactions.store');
    Route::get('/transactions/{transaction}', 'show')->name('transactions.show');
    Route::delete('/transactions/{transaction}', 'destroy')->name('transactions.destroy');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/transaction', [SellController::class, 'index'])->name('transactions.index');
    Route::post('/sell', [SellController::class, 'store'])->name('transactions.store');
    Route::get('/sell', [SellController::class, 'create'])->name('transactions.create');
    Route::post('/purchase', [SellController::class, 'purchase'])->name('purchase.product')->middleware('admin');

});
Route::get('/userdashboard', [UserController::class, 'dashboard'])->name('userdashboard');
Route::get('/productlist', [ProductController::class, 'view'])->name('products.view');

Route::get('/statistics', [UserController::class, 'statistics'])->name('admindashboard')->middleware('admin');


