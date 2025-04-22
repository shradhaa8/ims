@extends('layout')
@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Details of {{ $supplier->name }}</h2>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Id:</p>
            <p class="font-medium">{{ $supplier->id }}</p>
        </div>
        <div class="flex space-x-3 mb-5">
              <p class="text-lg font-bold">Supplier Name:</p>
              <p class="font-medium">{{ $supplier->name }}</p>
        </div>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Phone:</p>
            <p class="font-medium">{{ $supplier->phone }}</p>
        </div>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Address:</p>
            <p class="font-medium">{{ $supplier->address}}</p>
        </div>
        <h3 class="text-xl font-semibold text-gray-800 mt-6">Products Sold by {{ $supplier->name }}</h3>

        @if ($supplier->products->isEmpty())
            <p class="text-gray-600 mt-2">No products available.</p>
        @else
            <ul class="mt-4 space-y-3">
                @foreach ($supplier->products as $product)
                    <li class="bg-gray-200 p-3 rounded-md flex justify-between items-center">
                        <span class="font-medium">{{ $product->name }} (Stock: {{ $product->stock }})</span>
                        <span class="text-sm text-gray-600">Price: Rs. {{ $product->price }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

@endsection