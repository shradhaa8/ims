<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('products', ProductController::class);

Route::apiResource('categories', CategoryController::class);

Route::apiResource('users', UserController::class);

Route::apiResource('transactions', TransactionController::class);

Route::apiResource('suppliers', SupplierController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
