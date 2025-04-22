@extends('layout')
@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Details of {{ $user->name}}</h2>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Id:</p>
            <p class="font-medium">{{  $user->id}}</p>
        </div>
        <div class="flex space-x-3 mb-5">
              <p class="text-lg font-bold">Full Name:</p>
              <p class="font-medium">{{ $user->name}}</p>
        </div>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Email:</p>
            <p class="font-medium">{{ $user->email}}</p>
        </div>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Admin:</p>
            <p class="font-medium">{{$user->isAdmin==1?'True':'False'}}</p>
        </div>
        <div class="flex space-x-3 mb-5">
            <p class="text-lg font-bold">Gender:</p>
            <p class="font-medium">{{ $user-> gender}}</p>
        </div>
    </div>
</div>

@endsection