@extends('layout')
@section('content')
@include('include.userSidebar')
<div class="ml-64 p-6">
<div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Product List</h2>
    <form method="GET" action="{{ route('products.view') }}" class="mb-6">
        <label for="category_id" class="block text-gray-700 font-medium">Filter products by Category:</label>
        <select name="category_id" id="category_id" 
                class="w-full px-4 py-2 border rounded-lg"
                onchange="this.form.submit()">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </form>

    <table class="w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Category</th>
                <th class="p-3 text-left">Stock</th>
                <th class="p-3 text-left">Price</th>
                <th class="p-3 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="border-b">
                <td class="p-3">{{ $product->name }}</td>
                <td class="p-3">{{ $product->category->name ?? 'Uncategorized' }}</td>
                <td class="p-3">{{ $product->stock }}</td>
                <td class="p-3">{{ $product->price }}</td>
                <td class="p-3"><a href="{{ route('products.show', $product->id) }}" class="text-green-500">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection