@extends('layout')
@section('title', 'Suppliers') 
@section('content')
@include('include.sidebar')
<div class="ml-64 p-6">
        <div class="flex justify-between">
            <h2 class="text-2xl font-bold">Supplier Management</h2>
            <a href="{{ route('suppliers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Supplier</a>
        </div>
        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Id</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Address</th>
                    <th class="border border-gray-300 px-4 py-2">Phone</th>
                    <th class="border border-gray-300 px-4 py-2">Product Id</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr class="border border-gray-300 ">
                    <td class="border border-gray-300 px-4 py-2">{{ $supplier->id }} </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $supplier->name }} </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $supplier->address }} </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $supplier->phone }} </td>
                    <td class="border border-gray-300 px-4 py-2">
                    @if($supplier->products->isEmpty())
                            <span class="text-gray-500">No products</span>
                        @else
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($supplier->products as $product)
                                    <li>{{ $product->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-green-500">View</a>
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection