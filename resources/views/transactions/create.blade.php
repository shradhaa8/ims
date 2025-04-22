@extends('layout')
@section('title', 'Sell Product')
@section('content')
@if (auth()->user()->isAdmin)
    @include('include.sidebar')
@else 
    @include('include.userSidebar')
@endif
<div class="flex justify-center item-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
            @if(auth()->user()->isAdmin) Purchase/Sell a Product 
            @else Sell a Product 
            @endif
        </h2>

        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="w-full mb-4">
                    @foreach ($errors->all() as $error )
                        <div class="bg-red-500 text-white p-3 rounded-lg mb-2">{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <div class="mb-5">
                <label for="product_id" class="block text-gray-700 text-sm font-medium mb-2">Product</label>
                <select name="product_id" id="product_id" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} (Stock: {{ $product->stock }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="qty" class="block text-gray-700 text-sm font-medium mb-2">Quantity</label>
                <input type="number" name="qty" id="qty" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                       required min="1">
            </div>
            <div class="space-y-5">
                <button type="submit" name="status" value="sales" 
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">
                    Sell Product
                </button>
                @if(auth()->user()->isAdmin)
                <button type="submit" name="status" value="purchase" 
                        class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-300">
                    Purchase Product
                </button>
                @endif
            </div>
        </form>
    </div>
</div>

@endsection