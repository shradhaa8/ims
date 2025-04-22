@extends('layout')
@section('title', 'Edit Staff')
@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Enter Staff's Details</h2>
        <form action="{{ route('users.update', $user->id)}}" method="post">
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
                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Full Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name}}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter the staff name" required>
            </div>
            <div class="mb-5">
                <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ $user->email}}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter the staff email" required>
            </div>

            <div class="mb-5">
            <label for="isAdmin" class="block text-gray-700 text-sm font-medium mb-2">Is Admin?</label>
            <div class="flex items-center mb-4">
                <input id="true" type="radio" value=1 name="isAdmin" {{$user->isAdmin==1?'checked':''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="true" class="ms-2 text-sm font-medium text-gray-700">True</label>
                <div class="mx-4"></div> 
                <input id="false" type="radio" value=0 name="isAdmin" {{ $user->isAdmin== 0? 'checked': ''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="false" class="ms-2 text-sm font-medium text-gray-700">False</label>
            </div>
            </div>
            <div class="mb-5">
            <label for="gender" class="block text-gray-700 text-sm font-medium mb-2">Gender</label>
            <div class="flex items-center mb-4">
                <input id="Male" type="radio" value="Male" name="gender" 
                {{ $user->gender=="Male" ? 'checked': ''}}
                 class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">                    
                <label for="Male" class="ms-2 text-sm font-medium text-gray-700">Male</label>
            <div class="mx-4"></div> 
                <input id="Female" type="radio" value="Female" name="gender" {{ $user->gender=="Female" ? 'checked':''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="Female" class="ms-2 text-sm font-medium text-gray-700">Female</label>
            </div>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Update</button>
        </form>
        </div>
    </div>
@endsection