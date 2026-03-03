@extends('layouts.app')

@section('title', 'Borrowing Details')

@section('sidebar-nav')
<div class="space-y-1">
    <a href="{{ route('admin.dashboard') }}"
       class="nav-item-hover flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'nav-item-active' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
        <span class="font-medium">Dashboard</span>
    </a>
    <a href="{{ route('admin.tools.index') }}"
       class="nav-item-hover flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.tools.*') ? 'nav-item-active' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
        </svg>
        <span class="font-medium">Tools</span>
    </a>
    <a href="{{ route('admin.borrowings.index') }}"
       class="nav-item-hover flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.borrowings.*') ? 'nav-item-active' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
        </svg>
        <span class="font-medium">Borrowings</span>
        @php $pendingCount = $sidebarPendingCount ?? 0; @endphp
        @if($pendingCount > 0)
            <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $pendingCount }}</span>
        @endif
    </a>
    <a href="{{ route('admin.reports.index') }}"
       class="nav-item-hover flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.reports.*') ? 'nav-item-active' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        <span class="font-medium">Reports</span>
    </a>
</div>
@endsection

@section('mobile-nav')
<div class="space-y-1">
    <a href="{{ route('admin.dashboard') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-purple-100 text-purple-700' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
        <span class="font-medium">Dashboard</span>
    </a>
    <a href="{{ route('admin.tools.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 transition-all {{ request()->routeIs('admin.tools.*') ? 'bg-purple-100 text-purple-700' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
        </svg>
        <span class="font-medium">Tools</span>
    </a>
    <a href="{{ route('admin.borrowings.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 transition-all {{ request()->routeIs('admin.borrowings.*') ? 'bg-purple-100 text-purple-700' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
        </svg>
        <span class="font-medium">Borrowings</span>
    </a>
    <a href="{{ route('admin.reports.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 transition-all {{ request()->routeIs('admin.reports.*') ? 'bg-purple-100 text-purple-700' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        <span class="font-medium">Reports</span>
    </a>
</div>
@endsection

@section('page-title', 'Borrowing Details')
@section('page-subtitle', 'View and manage borrowing request')

@section('content')
<div class="animate-fade-in max-w-6xl mx-auto">
    <!-- Back Button -->
    <a href="{{ route('admin.borrowings.index') }}" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 mb-6 transition-colors group">
        <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span class="font-medium">Back to Borrowings</span>
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Information -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <!-- Header with Status -->
                <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-white flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Request Information
                        </h3>
                        <span class="px-4 py-1.5 text-sm font-bold rounded-full bg-white/20 text-white backdrop-blur-sm">
                            {{ ucfirst($borrowing->status) }}
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                Tool
                            </dt>
                            <dd class="text-base font-bold text-gray-900">{{ $borrowing->tool->name }}</dd>
                        </div>

                        <div class="group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                Inventory Code
                            </dt>
                            <dd class="text-base font-mono font-bold text-indigo-600">{{ $borrowing->tool->inventory_code }}</dd>
                        </div>

                        <div class="group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Borrower
                            </dt>
                            <dd class="text-base font-bold text-gray-900">{{ $borrowing->user->name }}</dd>
                        </div>

                        <div class="group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Email
                            </dt>
                            <dd class="text-base text-gray-700">{{ $borrowing->user->email }}</dd>
                        </div>

                        <div class="group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Date
                            </dt>
                            <dd class="text-base font-bold text-gray-900">{{ $borrowing->date->format('l, F d, Y') }}</dd>
                        </div>

                        <div class="group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Time
                            </dt>
                            <dd class="text-base text-gray-700">
                                <span class="inline-flex items-center gap-2 px-3 py-1 bg-indigo-50 rounded-lg">
                                    <span class="font-mono font-semibold text-indigo-600">{{ date('H:i', strtotime($borrowing->start_time)) }}</span>
                                    <span class="text-gray-400">to</span>
                                    <span class="font-mono font-semibold text-indigo-600">{{ date('H:i', strtotime($borrowing->end_time)) }}</span>
                                </span>
                            </dd>
                        </div>

                        <div class="md:col-span-2 group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Purpose
                            </dt>
                            <dd class="text-base text-gray-700 bg-gray-50 rounded-xl p-4 border border-gray-100">{{ $borrowing->purpose }}</dd>
                        </div>

                        <div class="group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Submitted On
                            </dt>
                            <dd class="text-base text-gray-700">{{ $borrowing->created_at->format('M d, Y H:i') }}</dd>
                        </div>

                        @if($borrowing->notes)
                        <div class="md:col-span-2 group">
                            <dt class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                </svg>
                                Notes
                            </dt>
                            <dd class="text-base text-gray-700 bg-gray-50 rounded-xl p-4 border border-gray-100 whitespace-pre-line">{{ $borrowing->notes }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>
            </div>
        </div>

        <!-- Sidebar: Tool Info & Actions -->
        <div class="space-y-6">
            <!-- Tool Information Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 px-6 py-4">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Tool Information
                    </h3>
                </div>
                <div class="p-6">
                    @if($borrowing->tool->photo)
                        <img src="{{ Storage::url($borrowing->tool->photo) }}" alt="{{ $borrowing->tool->name }}" class="w-full h-40 object-cover rounded-xl mb-4 shadow-md">
                    @endif
                    
                    <div class="space-y-4">
                        <div>
                            <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1">Location</p>
                            <p class="font-semibold text-gray-900 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $borrowing->tool->location }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1">Condition</p>
                            <p>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold
                                    @if($borrowing->tool->condition === 'good') bg-green-100 text-green-700
                                    @elseif($borrowing->tool->condition === 'fair') bg-yellow-100 text-yellow-700
                                    @else bg-red-100 text-red-700 @endif">
                                    <span class="w-2 h-2 rounded-full
                                        @if($borrowing->tool->condition === 'good') bg-green-500
                                        @elseif($borrowing->tool->condition === 'fair') bg-yellow-500
                                        @else bg-red-500 @endif"></span>
                                    {{ ucfirst($borrowing->tool->condition) }}
                                </span>
                            </p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 font-semibold uppercase tracking-wider mb-1">Current Status</p>
                            <p>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold
                                    @if($borrowing->tool->status === 'available') bg-emerald-100 text-emerald-700
                                    @elseif($borrowing->tool->status === 'borrowed') bg-amber-100 text-amber-700
                                    @else bg-rose-100 text-rose-700 @endif">
                                    <span class="w-2 h-2 rounded-full animate-pulse
                                        @if($borrowing->tool->status === 'available') bg-emerald-500
                                        @elseif($borrowing->tool->status === 'borrowed') bg-amber-500
                                        @else bg-rose-500 @endif"></span>
                                    {{ ucfirst($borrowing->tool->status) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-amber-500 via-orange-500 to-red-500 px-6 py-4">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Actions
                    </h3>
                </div>
                <div class="p-6">
                    @if($borrowing->status === 'pending')
                        <form action="{{ route('admin.borrowings.approve', $borrowing) }}" method="POST" class="space-y-3">
                            @csrf
                            <button type="submit" onclick="return confirmApprove()" 
                                    class="w-full bg-gradient-to-r from-green-500 to-emerald-500 text-white px-4 py-3 rounded-xl font-semibold hover:from-green-600 hover:to-emerald-600 transition-all shadow-lg flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Approve Request
                            </button>
                        </form>

                        <button onclick="showRejectForm()"
                                class="w-full bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-3 rounded-xl font-semibold hover:from-red-600 hover:to-pink-600 transition-all shadow-lg flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Reject Request
                        </button>

                        <form id="reject-form" action="{{ route('admin.borrowings.reject', $borrowing) }}" method="POST" class="hidden mt-3 space-y-3">
                            @csrf
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Rejection Reason (Optional)</label>
                                <textarea name="notes" rows="3" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all" placeholder="Enter reason for rejection..."></textarea>
                            </div>
                            <button type="submit" class="w-full bg-red-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-red-700 transition-all shadow-lg">
                                Confirm Rejection
                            </button>
                        </form>
                    @elseif($borrowing->status === 'approved')
                        <button onclick="showReturnForm()"
                                class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-4 py-3 rounded-xl font-semibold hover:from-blue-600 hover:to-indigo-600 transition-all shadow-lg flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 14a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2H7a2 2 0 01-2-2v-4zm10 0a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4z"></path>
                            </svg>
                            Mark as Returned
                        </button>

                        <form id="return-form" action="{{ route('admin.borrowings.return', $borrowing) }}" method="POST" class="hidden mt-3 space-y-3">
                            @csrf
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Condition After Return <span class="text-red-500">*</span></label>
                                <select name="condition_after" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" required>
                                    <option value="good">✅ Good - Like new</option>
                                    <option value="fair">⚠️ Fair - Minor wear</option>
                                    <option value="poor">❌ Poor - Needs repair</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Notes (Optional)</label>
                                <textarea name="notes" rows="3" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all" placeholder="Additional notes..."></textarea>
                            </div>
                            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-all shadow-lg">
                                Confirm Return
                            </button>
                        </form>
                    @elseif($borrowing->status === 'returned')
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-green-800">Completed</p>
                                    <p class="text-sm text-green-600">This borrowing has been completed</p>
                                </div>
                            </div>
                        </div>
                    @elseif($borrowing->status === 'rejected')
                        <div class="bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-xl p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-red-500 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-red-800">Rejected</p>
                                    <p class="text-sm text-red-600">This request was rejected</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function confirmApprove() {
        Swal.fire({
            title: 'Approve Request?',
            text: "Are you sure you want to approve this borrowing request?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#10b981',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, Approve',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (!result.isConfirmed) {
                event.preventDefault();
            }
        });
        return true;
    }

    function showRejectForm() {
        Swal.fire({
            title: 'Reject Request?',
            text: "Are you sure you want to reject this borrowing request?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, Reject',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('reject-form').classList.remove('hidden');
            }
        });
    }

    function showReturnForm() {
        Swal.fire({
            title: 'Mark as Returned?',
            text: "Confirm that the equipment has been returned",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3b82f6',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, Confirm',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('return-form').classList.remove('hidden');
            }
        });
    }
</script>
@endpush

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.5s ease-out;
}
</style>
@endsection
