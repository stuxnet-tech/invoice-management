@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Vendors</h1>
    <a href="{{ route('vendors.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Vendor</a>
    
    <table class="w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Name</th>
                <th class="border p-2">Company Name</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendors as $vendor)
            <tr class="border">
                <td class="p-2">{{ $vendor->name }}</td>
                <td class="p-2">{{ $vendor->company_name }}</td>
                <td class="p-2">
                    <form action="{{ route('vendors.destroy', $vendor) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $vendors->links() }}</div>
</div>
@endsection
