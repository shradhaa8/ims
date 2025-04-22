@extends('layout')
@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Details of transaction: {{ $transaction->id}}</h2>
        <p><strong>ID:</strong> {{ $transaction->id }}</p>
        <p><strong>Product:</strong> {{ $transaction->product->name ?? 'N/A' }}</p>
        <p><strong>Quantity:</strong> {{ $transaction->qty }}</p>
        <p><strong>User:</strong> {{ $transaction->user->name ?? 'N/A' }}</p>
        <p><strong>Status:</strong> {{ ucfirst($transaction->status) }}</p>
        <p><strong>Description:</strong> {{ $transaction->description ?? 'None' }}</p>
    </div>
</div>

@endsection