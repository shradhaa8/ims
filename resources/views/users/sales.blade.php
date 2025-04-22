@extends('layout')
@section('title', 'Staff Dashboard')
@section('content')
@include('include.userSidebar')
<div class="ml-64 p-6">
    <h2 class="w-full text-2xl font-bold ">List of Products sold</h2>
@if ($transactions && $transactions->isNotEmpty())
<table class="w-full mt-4 border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border border-gray-300 px-4 py-2">Product</th>
            <th class="border border-gray-300 px-4 py-2">Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $transaction )
        <tr class="border border-gray-300">
            <td class="border border-gray-300 px-4 py-2">{{ $transaction->product->name?? 'N/A' }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $transaction->qty }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="ml-64">No transaction exists</p>
@endif
</div>
@endsection
