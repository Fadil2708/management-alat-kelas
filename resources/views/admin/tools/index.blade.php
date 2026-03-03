@extends('layouts.app')

@section('title', 'Manage Tools')

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
        @php $pendingCount = \App\Models\Borrowing::where('status', 'pending')->count(); @endphp
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

@section('page-title', 'Tools Management')
@section('page-subtitle', 'Manage all classroom equipment')

@section('content')
<div class="animate-fade-in">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Tools Inventory</h2>
            <p class="text-gray-500 mt-1">{{ $tools->total() }} items in total</p>
        </div>
        <a href="{{ route('admin.tools.create') }}"
           class="btn-primary inline-flex items-center gap-2 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add New Tool
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 border border-gray-100">
        <form method="GET" action="{{ route('admin.tools.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-4 h-4 inline-block mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Search
                </label>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search tools..."
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-4 h-4 inline-block mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Category
                </label>
                <select name="category" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                    <option value="">All Categories</option>
                    <option value="Electronics" {{ request('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                    <option value="Audio" {{ request('category') == 'Audio' ? 'selected' : '' }}>Audio</option>
                    <option value="Display" {{ request('category') == 'Display' ? 'selected' : '' }}>Display</option>
                    <option value="Other" {{ request('category') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-4 h-4 inline-block mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Status
                </label>
                <select name="status" class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                    <option value="">All Status</option>
                    <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="borrowed" {{ request('status') == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                    <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>
            <div class="flex items-end">
                <button type="submit" class="w-full btn-primary text-white px-4 py-2.5 rounded-xl font-semibold shadow-lg">
                    <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Tools Grid/Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Tool</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Code</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Condition</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Location</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($tools as $tool)
                    <tr class="hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 transition-all duration-200 group">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-14 h-14 flex-shrink-0">
                                    @if($tool->photo)
                                        <img src="{{ Storage::url($tool->photo) }}" alt="{{ $tool->name }}" class="w-14 h-14 rounded-xl object-cover shadow-md group-hover:scale-105 transition-transform duration-200">
                                    @else
                                        <div class="w-14 h-14 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center group-hover:from-indigo-100 group-hover:to-purple-100 transition-all duration-200">
                                            <svg class="w-7 h-7 text-gray-400 group-hover:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-bold text-gray-900">{{ $tool->name }}</div>
                                    <div class="text-xs text-gray-500 mt-0.5">ID: {{ $tool->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
                                {{ $tool->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <code class="text-xs font-mono bg-gray-100 px-2 py-1 rounded text-gray-600">{{ $tool->inventory_code }}</code>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold
                                @if($tool->condition === 'good') bg-green-100 text-green-700
                                @elseif($tool->condition === 'fair') bg-yellow-100 text-yellow-700
                                @else bg-red-100 text-red-700 @endif">
                                <span class="w-1.5 h-1.5 rounded-full
                                    @if($tool->condition === 'good') bg-green-500
                                    @elseif($tool->condition === 'fair') bg-yellow-500
                                    @else bg-red-500 @endif"></span>
                                {{ ucfirst($tool->condition) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold
                                @if($tool->status === 'available') bg-emerald-100 text-emerald-700
                                @elseif($tool->status === 'borrowed') bg-amber-100 text-amber-700
                                @else bg-rose-100 text-rose-700 @endif">
                                <span class="w-1.5 h-1.5 rounded-full animate-pulse
                                    @if($tool->status === 'available') bg-emerald-500
                                    @elseif($tool->status === 'borrowed') bg-amber-500
                                    @else bg-rose-500 @endif"></span>
                                {{ ucfirst($tool->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <svg class="w-4 h-4 inline-block mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            {{ $tool->location }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.tools.edit', $tool) }}"
                                   class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 hover:bg-blue-50 px-3 py-1.5 rounded-lg transition-all">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('admin.tools.destroy', $tool) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this tool?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center gap-1 text-red-600 hover:text-red-800 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-16 text-center">
                            <div class="max-w-sm mx-auto">
                                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 text-lg font-medium mb-2">No tools found</p>
                                <p class="text-gray-400 text-sm mb-4">Start by adding your first equipment to the inventory</p>
                                <a href="{{ route('admin.tools.create') }}" class="btn-primary inline-flex items-center gap-2 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add First Tool
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($tools->hasPages())
    <div class="mt-6 bg-white rounded-2xl shadow-lg p-4 border border-gray-100">
        {{ $tools->links() }}
    </div>
    @endif
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
