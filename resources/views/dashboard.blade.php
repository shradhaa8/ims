@extends('layout')
@section('title', 'Staff Dashboard')
@section('content')
    @include('include.userSidebar') 
    <h2>Sales</h2>
    <table class="w-full mt-4 border-collapse border border-gray-300">
        <tr class="bg-gray-200">
            <th class="border border-gray-300 px-4 py-2">Product</th>
            <th class="border border-gray-300 px-4 py-2">Quantity</th>
        </tr>
        @foreach ($transactions as $transaction )
        <tr class="bg-gray-200">
            <td class="border border-gray-300 px-4 py-2">{{ $transaction->product->name }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $transaction->qty }}</td>
        </tr>
        @endforeach
    </table>
    
@endsection


