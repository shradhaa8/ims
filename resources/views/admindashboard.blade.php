@extends('layout')
@section('title', 'AdminDashboard')
@section('content')
    @include('include.sidebar')
    <div class="ml-64 p-6">
    <div class="grid grid-cols-1 gap-4 px-4 mt-8 sm:grid-cols-4 sm:px-8">
        <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-green-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                </path>
            </svg></div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Staffs</h3>
            <p class="text-3xl">{{$totalStaffs}}</p>
        </div>
        </div>
        <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-blue-400">
            <svg class="shrink-0 w-12 h-12 text-white transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
            </svg>
        </div>
        <div class="px-4 text-gray-700">
        <h3 class="text-sm tracking-wider">Total Products</h3>
        <p class="text-3xl">{{ $totalProducts }}</p>
        </div>
        </div>
        <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
            <div class="p-4 bg-green-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg></div>
            <div class="px-4 text-gray-700">
                <h3 class="text-sm tracking-wider">Total Suppliers</h3>
                <p class="text-3xl">{{ $totalSuppliers }}</p>
            </div>
        </div>
        <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
        <div class="p-4 bg-blue-400">
            <svg class="shrink-0 w-12 h-12 text-white transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
            </svg>
        </div>
        <div class="px-4 text-gray-700">
            <h3 class="text-sm tracking-wider">Total Categories</h3>
            <p class="text-3xl">{{ $totalCategories }}</p>
        </div>
        </div>
        

        
        <div class="mt-8 px-2">
            <div class="grid grid-flow-col grid-rows-3 gap-4">
                <div class="row-span-3">
                <div class="bg-white p-4 rounded shadow mb-4">
                <h3 class="text-lg font-semibold mb-3">Top 3 Most Sold Products</h3>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2 text-sm">Product Name</th>
                            <th class="border border-gray-300 px-4 py-2 text-sm">Quantity sold </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mostSoldProducts as $product )
                        <tr class="text-center">
                            <td class="border border-gray-300 px-4 py-2 text-sm">{{$product->product->name}}</td>
                            <td class="border border-gray-300 px-4 py-2 text-sm">{{$product->total_sold}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                </div>
                <div class="row-span-3">
                <div class="bg-white p-4 rounded shadow mb-4">
                <h3 class="text-lg font-semibold mb-3">Top 3 Most Purchased Product</h3>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2 text-sm">Product Name</th>
                            <th class="border border-gray-300 px-4 py-2 text-sm">Quantity Purchased</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mostPurchasedProducts as $product )
                        <tr class="bg-white">
                            <td class="border border-gray-300 px-4 py-2 text-sm">{{ $product->product->name }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-sm">{{ $product->total_purchased }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                </div>
                <div class="bg-white p-4 rounded shadow mb-4">
                <h3 class="text-lg font-semibold mb-3">Top 3 Most Interacted Suppliers</h3>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">Supplier Name</th>
                            <th class="border border-gray-300 px-4 py-2">Total Interactions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topSupplier as $supplier)
                        <tr class="text-center">
                            <td class="border border-gray-300 px-4 py-2">{{ $supplier->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $supplier->products_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
        </div>
        </div>
    </div>
    </div>
@endsection

