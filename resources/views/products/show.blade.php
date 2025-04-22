@extends('layout')
@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Details of {{ $product->name}}</h2>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Id:</p>
            <p class="font-medium">{{  $product->id}}</p>
        </div>
        <div class="flex space-x-3 mb-5">
              <p class="text-lg font-bold">Product Name:</p>
              <p class="font-medium">{{ $product->name}}</p>
        </div>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Description:</p>
            <p class="font-medium">{{ $product->description}}</p>
        </div>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Price:</p>
            <p class="font-medium">{{ $product->price}}</p>
        </div>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Category Id:</p>
            <p class="font-medium">{{ $product->category_id}}</p>
        </div>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Stock:</p>
            <p class="font-medium">{{ $product->stock}}</p>
        </div>
    </div>
</div>

@endsection