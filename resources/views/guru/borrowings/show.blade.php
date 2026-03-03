@extends('layouts.app')

@section('title', 'Borrowing Details')

@section('content')
<div class="mb-6">
    <a href="{{ route('guru.borrowings.index') }}" class="text-blue-600 hover:text-blue-900 flex items-center gap-1 mb-4">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Borrowings
    </a>
    <h2 class="text-2xl font-bold text-gray-800">Borrowing Details</h2>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Request Information</h3>
            
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Tool</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $borrowing->tool->name }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Inventory Code</dt>
                    <dd class="mt-1 text-sm text-gray-900 font-mono">{{ $borrowing->tool->inventory_code }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Date</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $borrowing->date->format('M d, Y') }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Time</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ date('H:i', strtotime($borrowing->start_time)) }} - {{ date('H:i', strtotime($borrowing->end_time)) }}
                    </dd>
                </div>

                <div class="md:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Purpose</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $borrowing->purpose }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1">
                        <span class="px-2 py-1 text-xs rounded-full 
                            @if($borrowing->status === 'returned') bg-green-100 text-green-800
                            @elseif($borrowing->status === 'approved') bg-blue-100 text-blue-800
                            @elseif($borrowing->status === 'rejected') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ ucfirst($borrowing->status) }}
                        </span>
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">Submitted On</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $borrowing->created_at->format('M d, Y H:i') }}</dd>
                </div>

                @if($borrowing->notes)
                <div class="md:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Notes</dt>
                    <dd class="mt-1 text-sm text-gray-900 whitespace-pre-line">{{ $borrowing->notes }}</dd>
                </div>
                @endif
            </dl>
        </div>
    </div>

    <div>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Tool Information</h3>
            
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-gray-500">Location</p>
                    <p class="font-medium text-gray-900">{{ $borrowing->tool->location }}</p>
                </div>
                
                <div>
                    <p class="text-sm text-gray-500">Condition</p>
                    <p class="font-medium text-gray-900">
                        <span class="px-2 py-1 text-xs rounded-full 
                            @if($borrowing->tool->condition === 'good') bg-green-100 text-green-800
                            @elseif($borrowing->tool->condition === 'fair') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($borrowing->tool->condition) }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        @if($borrowing->status === 'pending')
        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mt-6">
            <p class="text-sm text-yellow-800">
                <strong>Pending Approval:</strong> Your request is waiting for admin approval. You will be notified once it's reviewed.
            </p>
        </div>
        @elseif($borrowing->status === 'approved')
        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mt-6">
            <p class="text-sm text-green-800">
                <strong>Approved!</strong> Your request has been approved. Please return the tool on time.
            </p>
        </div>
        @elseif($borrowing->status === 'rejected')
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 mt-6">
            <p class="text-sm text-red-800">
                <strong>Rejected:</strong> Your request has been rejected by the admin.
            </p>
        </div>
        @elseif($borrowing->status === 'returned')
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-6">
            <p class="text-sm text-blue-800">
                <strong>Returned:</strong> The tool has been returned successfully.
            </p>
        </div>
        @endif
    </div>
</div>
@endsection
