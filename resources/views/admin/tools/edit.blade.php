@extends('layouts.app')

@section('title', 'Edit Tool')

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

@section('page-title', 'Edit Tool')
@section('page-subtitle', 'Update equipment information')

@section('content')
<div class="animate-fade-in max-w-4xl mx-auto">
    <!-- Back Button -->
    <a href="{{ route('admin.tools.index') }}" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 mb-6 transition-colors group">
        <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span class="font-medium">Back to Tools</span>
    </a>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 px-6 py-4">
            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Tool Information
            </h3>
        </div>

        <form action="{{ route('admin.tools.update', $tool) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tool Name -->
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Tool Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $tool->name) }}"
                           placeholder="e.g., LCD Projector, Laptop, etc."
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('name') border-red-400 @enderror"
                           required>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline-block mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Category <span class="text-red-500">*</span>
                    </label>
                    <select id="category" name="category"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('category') border-red-400 @enderror"
                            required>
                        <option value="">Select Category</option>
                        <option value="Electronics" {{ old('category', $tool->category) == 'Electronics' ? 'selected' : '' }}>📱 Electronics</option>
                        <option value="Audio" {{ old('category', $tool->category) == 'Audio' ? 'selected' : '' }}>🔊 Audio</option>
                        <option value="Display" {{ old('category', $tool->category) == 'Display' ? 'selected' : '' }}>📺 Display</option>
                        <option value="Other" {{ old('category', $tool->category) == 'Other' ? 'selected' : '' }}>📦 Other</option>
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Inventory Code -->
                <div>
                    <label for="inventory_code" class="block text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline-block mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                        </svg>
                        Inventory Code <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="inventory_code" name="inventory_code" value="{{ old('inventory_code', $tool->inventory_code) }}"
                           placeholder="e.g., EQP-2026-001"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all font-mono @error('inventory_code') border-red-400 @enderror"
                           required>
                    @error('inventory_code')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Condition -->
                <div>
                    <label for="condition" class="block text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline-block mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Condition <span class="text-red-500">*</span>
                    </label>
                    <select id="condition" name="condition"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('condition') border-red-400 @enderror"
                            required>
                        <option value="">Select Condition</option>
                        <option value="good" {{ old('condition', $tool->condition) == 'good' ? 'selected' : '' }}>✅ Good - Like new</option>
                        <option value="fair" {{ old('condition', $tool->condition) == 'fair' ? 'selected' : '' }}>⚠️ Fair - Minor wear</option>
                        <option value="poor" {{ old('condition', $tool->condition) == 'poor' ? 'selected' : '' }}>❌ Poor - Needs repair</option>
                    </select>
                    @error('condition')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline-block mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Location <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="location" name="location" value="{{ old('location', $tool->location) }}"
                           placeholder="e.g., Room 101, Lab A, Storage Room"
                           class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('location') border-red-400 @enderror"
                           required>
                    @error('location')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline-block mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select id="status" name="status"
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('status') border-red-400 @enderror"
                            required>
                        <option value="">Select Status</option>
                        <option value="available" {{ old('status', $tool->status) == 'available' ? 'selected' : '' }}>🟢 Available</option>
                        <option value="borrowed" {{ old('status', $tool->status) == 'borrowed' ? 'selected' : '' }}>🟡 Borrowed</option>
                        <option value="maintenance" {{ old('status', $tool->status) == 'maintenance' ? 'selected' : '' }}>🔴 Maintenance</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Photo Upload -->
                <div class="md:col-span-2">
                    <label for="photo" class="block text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline-block mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Photo
                    </label>
                    @if($tool->photo)
                        <div class="mb-4">
                            <img src="{{ Storage::url($tool->photo) }}" alt="{{ $tool->name }}" class="h-40 rounded-xl object-cover shadow-lg">
                        </div>
                    @endif
                    <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 hover:border-indigo-400 transition-colors">
                        <div class="flex flex-col items-center justify-center">
                            <svg class="w-12 h-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <input type="file" id="photo" name="photo" accept="image/*"
                                   class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100 transition-all @error('photo') border-red-400 @enderror">
                            <p class="text-xs text-gray-500 mt-2">Leave empty to keep current photo. Max file size: 2MB.</p>
                        </div>
                    </div>
                    @error('photo')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-8 pt-6 border-t border-gray-100 flex gap-4">
                <button type="submit" class="btn-primary text-white px-6 py-3 rounded-xl font-semibold shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Tool
                </button>
                <a href="{{ route('admin.tools.index') }}"
                   class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Cancel
                </a>
            </div>
        </form>
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
