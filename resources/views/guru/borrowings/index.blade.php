@extends('layouts.app')

@section('title', 'My Borrowings')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">My Borrowings</h2>
        <p class="text-gray-600 mt-1">View and manage your equipment borrowing requests</p>
    </div>
    <a href="{{ route('guru.borrowings.create') }}" 
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150 flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        New Request
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tool</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Purpose</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($borrowings as $borrowing)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="font-medium text-gray-900">{{ $borrowing->tool->name }}</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $borrowing->date->format('M d, Y') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ date('H:i', strtotime($borrowing->start_time)) }} - {{ date('H:i', strtotime($borrowing->end_time)) }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                    {{ $borrowing->purpose }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 text-xs rounded-full 
                        @if($borrowing->status === 'returned') bg-green-100 text-green-800
                        @elseif($borrowing->status === 'approved') bg-blue-100 text-blue-800
                        @elseif($borrowing->status === 'rejected') bg-red-100 text-red-800
                        @else bg-yellow-100 text-yellow-800 @endif">
                        {{ ucfirst($borrowing->status) }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('guru.borrowings.show', $borrowing) }}" 
                       class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                    @if($borrowing->status === 'pending')
                    <form action="{{ route('guru.borrowings.cancel', $borrowing) }}" method="POST" class="inline"
                          onsubmit="return confirm('Are you sure you want to cancel this request?');">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="text-red-600 hover:text-red-900">Cancel</button>
                    </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                    No borrowing requests yet. <a href="{{ route('guru.borrowings.create') }}" class="text-blue-600 hover:text-blue-900">Create your first request</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $borrowings->links() }}
</div>
@endsection
