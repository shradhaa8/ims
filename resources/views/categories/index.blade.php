@extends('layout')
@section('title', 'Category')
@section('content')
@include('include.sidebar')
<div class="ml-64 p-6">

        <div class="flex justify-between">
            <h2 class="text-2xl font-bold">Category Management</h2>
            <a href="{{route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Category</a>
        </div>
        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Id</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Description</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="border border-gray-300 ">
                    <td class="border border-gray-300 px-4 py-2">{{ $category->id }} </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $category->name }} </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $category->description }} </td>
                    <td class="border border-gray-300 px-4 py-2">
                    <a href="{{route('categories.show', $category->id) }}" class="text-green-500">View</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection