<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
    <div class="grid grid-cols-4 gap-6">
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold">Total Vendors</h2>
            <p class="text-2xl">{{ $totalVendors }}</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold">Total Products</h2>
            <p class="text-2xl">{{ $totalProducts }}</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold">Total Invoices</h2>
            <p class="text-2xl">{{ $totalInvoices }}</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold">Total Users</h2>
            <p class="text-2xl">{{ $totalUsers }}</p>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-semibold mb-4">Filters</h2>
        <form method="GET" class="flex space-x-4">
            <select name="filter" class="border p-2 rounded">
                <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>Today</option>
                <option value="this_week" {{ request('filter') == 'this_week' ? 'selected' : '' }}>This Week</option>
                <option value="this_month" {{ request('filter') == 'this_month' ? 'selected' : '' }}>This Month</option>
                <option value="this_year" {{ request('filter') == 'this_year' ? 'selected' : '' }}>This Year</option>
                <option value="custom" {{ request('filter') == 'custom' ? 'selected' : '' }}>Custom</option>
            </select>
            <input type="date" name="start_date" class="border p-2 rounded" value="{{ request('start_date') }}">
            <input type="date" name="end_date" class="border p-2 rounded" value="{{ request('end_date') }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Apply</button>
        </form>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-semibold mb-4">Navigation</h2>
        <div class="flex space-x-4">
            <a href="{{ route('products.index') }}" class="bg-green-500 text-white px-4 py-2 rounded">Manage Products</a>
            <a href="{{ route('vendors.index') }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Manage Vendors</a>
            <a href="{{ route('invoices.index') }}" class="bg-purple-500 text-white px-4 py-2 rounded">Manage Invoices</a>
            <a href="{{ route('users.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Manage Users</a>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-semibold mb-4">Vendor Management</h2>
        <a href="{{ route('vendors.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Add Vendor</a>
    </div>
    
    <div class="mt-6">
        <h2 class="text-xl font-semibold mb-4">Product Management</h2>
        <a href="{{ route('products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Add Product</a>
    </div>
    
    <div class="mt-6">
        <h2 class="text-xl font-semibold mb-4">User Management</h2>
        <a href="{{ route('users.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Add User</a>
    </div>
</div>
</x-app-layout>
