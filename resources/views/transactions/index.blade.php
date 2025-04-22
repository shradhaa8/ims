@extends('layout')
@section('title', 'Manage Transactions')
@section('content')
@include('include.sidebar')
    <div class="ml-64 p-6">
        <div class="flex justify-between">
            <h2 class="text-2xl font-bold">Transaction Management</h2>
            <a href="{{ route('transactions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Transaction</a>
        </div>
        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Id</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Quantity</th>
                    <th class="border border-gray-300 px-4 py-2">User Id</th>
                    <th class="border border-gray-300 px-4 py-2">Product Id</th>
                    <th class="border border-gray-300 px-4 py-2">Product Name</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction )
                <tr class="border border-gray-300 ">
                    <td class="border border-gray-300 px-4 py-2">{{ $transaction->id }} </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $transaction->status }} </td>
                    <td class="border border-gray-300 px-4 py-2"> {{ $transaction->qty }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $transaction->user_id }} </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $transaction->product_id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $transaction->product_name }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('transactions.show', $transaction->id) }}" class="text-green-500">View</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="post">
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
