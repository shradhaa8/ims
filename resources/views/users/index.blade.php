@extends('layout')
@section('title', 'Manage Staff')
@section('content')
@include('include.sidebar')
    <div class="ml-64 p-6">
        <div class="flex justify-between">
            <h2 class="text-2xl font-bold">Staff Management</h2>
            <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Staff</a>
        </div>

        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Id</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">IsAdmin</th>
                    <th class="border border-gray-300 px-4 py-2">Gender</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                <tr class="border border-gray-300 ">
                    <td class="border border-gray-300 px-4 py-2">{{ $user->id }} </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $user->name }} </td>
                    <td class="border border-gray-300 px-4 py-2"> {{ $user->email }}</td>
                    <td class="border border-gray-300 px-4 py-2"> {{ $user->isAdmin ==1? 'True' : 'False' }}</td>
                    <td class="border border-gray-300 px-4 py-2"> {{ $user->gender }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                    <a href="{{ route('users.show', $user->id) }}" class="text-green-500">View</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
