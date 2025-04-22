@extends('layout')
@section('title', 'Manage Products')
@section('content')
@include('include.sidebar')
    <div class="ml-64 p-6">
        <div class="flex justify-between">
            <h2 class="text-2xl font-bold">Product Management</h2>
            <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</a>
        </div>
        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Id</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Price</th>
                    <th class="border border-gray-300 px-4 py-2">Category Id</th>
                    <th class="border border-gray-300 px-4 py-2">Stock</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
                <tr class="border border-gray-300 ">
                    <td class="border border-gray-300 px-4 py-2">{{ $product->id }} </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $product->name }} </td>
                    <td class="border border-gray-300 px-4 py-2"> {{ $product->price }}</td>
                    <td class="border border-gray-300 px-4 py-2"> {{ $product->category_id }}</td>
                    <td class="border border-gray-300 px-4 py-2"> {{ $product->stock }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('products.show', $product->id) }}" class="text-green-500">View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{ $products->links() }}
        </table>
    </div>
@endsection



