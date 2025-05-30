@extends('layout')
@section('title', 'Edit Staff')
@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Enter Staff's Details</h2>
        <form action="{{ route('suppliers.update', $supplier->id) }}" method="post">
            @csrf
            @method('PUT')
            @if ($errors->any())
            <div class="w-full mb-4">
                @foreach ($errors->all() as $error )
                <div class="bg-red-500 text-white p-3 rounded-lg mb-2">{{ $error }}</div>
                @endforeach
            </div>
            @endif
            <div class="mb-5">
                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ $supplier->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-5">
                <label for="phone" class="block text-gray-700 text-sm font-medium mb-2">Phone</label>
                <input type="number" name="phone" id="phone" value="{{ $supplier->phone }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </input>
            </div>
            <div class="mb-5">
                <label for="price" class="block text-gray-700 text-sm font-medium mb-2">Address</label>
                <input type="text" name="address" id="address" value="{{ $supplier->address }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-5">
                <label for="product_id" class="block text-gray-700 text-sm font-medium mb-2">Products</label>
                <select name="product_id[]" id="product_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" multiple>
                    @foreach ($products as $product )
                            <option value="{{ $product->id }}"
                                {{ $supplier->products->contains($product->id) ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>                     
                        @endforeach
                </select> 
            </div>           
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Submit</button>
        </form>
        </div>
    </div>
@endsection