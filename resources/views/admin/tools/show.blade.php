@extends('layouts.app')

@section('title', $tool->name)

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.tools.index') }}" class="text-blue-600 hover:text-blue-900 flex items-center gap-1 mb-4">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Tools
    </a>
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">{{ $tool->name }}</h2>
        <div class="flex gap-2">
            <a href="{{ route('admin.tools.edit', $tool) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                Edit
            </a>
            <form action="{{ route('admin.tools.destroy', $tool) }}" method="POST" 
                  onsubmit="return confirm('Are you sure you want to delete this tool?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-150">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow-md p-6">
            @if($tool->photo)
                <img src="{{ Storage::url($tool->photo) }}" alt="{{ $tool->name }}" class="w-full rounded-lg object-cover">
            @else
                <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
            @endif
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Tool Details</h3>
            
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Name</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $tool->name }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Category</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $tool->category }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Inventory Code</dt>
                    <dd class="mt-1 text-sm text-gray-900 font-mono">{{ $tool->inventory_code }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Condition</dt>
                    <dd class="mt-1">
                        <span class="px-2 py-1 text-xs rounded-full 
                            @if($tool->condition === 'good') bg-green-100 text-green-800
                            @elseif($tool->condition === 'fair') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($tool->condition) }}
                        </span>
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1">
                        <span class="px-2 py-1 text-xs rounded-full 
                            @if($tool->status === 'available') bg-green-100 text-green-800
                            @elseif($tool->status === 'borrowed') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($tool->status) }}
                        </span>
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Location</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $tool->location }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Created At</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $tool->created_at->format('M d, Y') }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Updated At</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $tool->updated_at->format('M d, Y') }}</dd>
                </div>
            </dl>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 mt-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Borrowing History</h3>
            @if($tool->borrowings->count() > 0)
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Borrower</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($tool->borrowings->take(5) as $borrowing)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $borrowing->date->format('M d, Y') }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $borrowing->user->name }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 text-xs rounded-full 
                                    @if($borrowing->status === 'returned') bg-green-100 text-green-800
                                    @elseif($borrowing->status === 'approved') bg-blue-100 text-blue-800
                                    @elseif($borrowing->status === 'rejected') bg-red-100 text-red-800
                                    @else bg-yellow-100 text-yellow-800 @endif">
                                    {{ ucfirst($borrowing->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-500">No borrowing history for this tool.</p>
            @endif
        </div>
    </div>
</div>
@endsection
