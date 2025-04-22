@extends('layout')
@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Details of {{ $category->name }}</h2>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Id:</p>
            <p class="font-medium">{{ $category->id }}</p>
        </div>
        <div class="flex space-x-3 mb-5">
              <p class="text-lg font-bold">Category:</p>
              <p class="font-medium">{{ $category->name }}</p>
        </div>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Description:</p>
            <p class="font-medium">{{ $category->description }}</p>
        </div>
    </div>
</div>

@endsection