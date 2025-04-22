@extends('layout')
@section('title', 'Login')
@section('content')
     <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Login to Your Account</h2>

            @if ($errors->any())
            <div class="w-full mb-4">
                @foreach ($errors->all() as $error )
                <div class="bg-red-500 text-white p-3 rounded-lg mb-2">{{ $error }}</div>
                @endforeach
            </div>
            @endif

            @if (session()->has('error'))
            <div class="bg-red-500 text-white p-3 rounded-lg mb-2">{{ session(key: 'error') }}</div>
            @endif

            @if (session()->has('success'))
            <div class="bg-green-500 text-white p-3 rounded-lg mb-2">{{ session('success') }}</div>
            @endif

            <form action="{{ route('login.post') }}" method="post">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your email" required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter your password" required>
                </div>

                <div class="flex justify-between items-center mb-6">
                    <div class="text-sm">
                        <a href="#" class="text-blue-500 hover:underline">Forgot password?</a>
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection
