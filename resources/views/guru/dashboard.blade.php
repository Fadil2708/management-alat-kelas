@extends('layouts.app')

@section('title', 'Guru Dashboard')

@section('sidebar-nav')
<div class="space-y-1">
    <a href="{{ route('guru.dashboard') }}"
       class="nav-item-hover flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 hover:text-white transition-all duration-200 {{ request()->routeIs('guru.dashboard') ? 'nav-item-active' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
        <span class="font-medium">Dashboard</span>
    </a>
    <a href="{{ route('guru.borrowings.index') }}"
       class="nav-item-hover flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 hover:text-white transition-all duration-200 {{ request()->routeIs('guru.borrowings.*') ? 'nav-item-active' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
        </svg>
        <span class="font-medium">My Borrowings</span>
    </a>
    <a href="{{ route('guru.borrowings.create') }}"
       class="nav-item-hover flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 hover:text-white transition-all duration-200 {{ request()->routeIs('guru.borrowings.create') ? 'nav-item-active' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        <span class="font-medium">New Request</span>
    </a>
</div>
@endsection

@section('mobile-nav')
<div class="space-y-1">
    <a href="{{ route('guru.dashboard') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 transition-all {{ request()->routeIs('guru.dashboard') ? 'bg-purple-100 text-purple-700' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
        <span class="font-medium">Dashboard</span>
    </a>
    <a href="{{ route('guru.borrowings.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 transition-all {{ request()->routeIs('guru.borrowings.*') ? 'bg-purple-100 text-purple-700' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
        </svg>
        <span class="font-medium">My Borrowings</span>
    </a>
    <a href="{{ route('guru.borrowings.create') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50 transition-all {{ request()->routeIs('guru.borrowings.create') ? 'bg-purple-100 text-purple-700' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        <span class="font-medium">New Request</span>
    </a>
</div>
@endsection

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome back, ' . auth()->user()->name . '!')

@section('content')
<div class="animate-fade-in">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-6 card-hover transition-all duration-300 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Total</span>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Requests</p>
                <p class="text-4xl font-bold text-gray-800 mt-1">{{ auth()->user()->borrowings->count() }}</p>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center text-xs text-gray-500">
                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                    <span>All time requests</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 card-hover transition-all duration-300 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-yellow-600 bg-yellow-50 px-3 py-1 rounded-full">Waiting</span>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium">Pending</p>
                <p class="text-4xl font-bold text-yellow-600 mt-1">{{ auth()->user()->borrowings()->where('status', 'pending')->count() }}</p>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center text-xs text-gray-500">
                    <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                    <span>Awaiting approval</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 card-hover transition-all duration-300 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <span class="text-xs font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full">Done</span>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium">Completed</p>
                <p class="text-4xl font-bold text-green-600 mt-1">{{ auth()->user()->borrowings()->where('status', 'returned')->count() }}</p>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-100">
                <div class="flex items-center text-xs text-gray-500">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                    <span>Successfully returned</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Recent History -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Recent Borrowing History
                    </h3>
                    <a href="{{ route('guru.borrowings.index') }}" class="text-white/80 hover:text-white text-sm font-medium flex items-center gap-1 transition-colors">
                        View All
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="p-6">
                @if(auth()->user()->borrowings()->latest()->take(5)->count() > 0)
                    <div class="space-y-3">
                        @foreach(auth()->user()->borrowings()->latest()->take(5)->get() as $borrowing)
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl hover:from-gray-100 hover:to-gray-150 transition-all cursor-pointer group" onclick="window.location='{{ route('guru.borrowings.show', $borrowing) }}'">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg transition-shadow">
                                    @if($borrowing->tool->photo)
                                        <img src="{{ Storage::url($borrowing->tool->photo) }}" alt="{{ $borrowing->tool->name }}" class="w-10 h-10 rounded-lg object-cover">
                                    @else
                                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $borrowing->tool->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $borrowing->date->format('M d, Y') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="px-3 py-1.5 text-xs font-semibold rounded-full
                                    @if($borrowing->status === 'returned') bg-green-100 text-green-700
                                    @elseif($borrowing->status === 'approved') bg-blue-100 text-blue-700
                                    @elseif($borrowing->status === 'rejected') bg-red-100 text-red-700
                                    @else bg-yellow-100 text-yellow-700 @endif">
                                    {{ ucfirst($borrowing->status) }}
                                </span>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <p class="text-gray-500">No borrowing history yet</p>
                        <a href="{{ route('guru.borrowings.create') }}" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium mt-2 inline-block">Create your first request →</a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions & Pending -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 px-6 py-4">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Quick Actions
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <a href="{{ route('guru.borrowings.create') }}" class="group flex items-center gap-4 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl hover:from-blue-100 hover:to-indigo-100 transition-all border border-blue-100">
                            <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-800">Borrow Equipment</p>
                                <p class="text-xs text-gray-500">Submit new request</p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>

                        <a href="{{ route('guru.borrowings.index') }}" class="group flex items-center gap-4 p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl hover:from-green-100 hover:to-emerald-100 transition-all border border-green-100">
                            <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-800">View My Requests</p>
                                <p class="text-xs text-gray-500">Check all borrowings</p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pending Requests -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="bg-gradient-to-r from-amber-500 via-orange-500 to-red-500 px-6 py-4">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Pending Requests
                    </h3>
                </div>
                <div class="p-6">
                    @if(auth()->user()->borrowings()->where('status', 'pending')->count() > 0)
                        <div class="space-y-3">
                            @foreach(auth()->user()->borrowings()->where('status', 'pending')->get() as $borrowing)
                            <div class="p-4 bg-gradient-to-r from-yellow-50 to-amber-50 border border-yellow-200 rounded-xl">
                                <div class="flex items-center justify-between mb-2">
                                    <p class="font-semibold text-gray-900 text-sm">{{ $borrowing->tool->name }}</p>
                                    <span class="px-2 py-0.5 text-xs font-semibold bg-yellow-200 text-yellow-800 rounded-full">Pending</span>
                                </div>
                                <p class="text-xs text-gray-500">{{ $borrowing->date->format('M d, Y') }}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ date('H:i', strtotime($borrowing->start_time)) }} - {{ date('H:i', strtotime($borrowing->end_time)) }}</p>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500 text-sm">No pending requests</p>
                            <p class="text-gray-400 text-xs mt-1">All caught up!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

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
