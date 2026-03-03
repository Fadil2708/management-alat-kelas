@extends('layouts.app')

@section('title', 'Categories')

@section('page-title', 'Categories')
@section('page-subtitle', 'Manage tool categories')

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
    <a href="{{ route('admin.categories.index') }}"
       class="nav-item-hover flex items-center gap-3 px-4 py-3 rounded-xl text-white/90 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.categories.*') ? 'nav-item-active' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
        </svg>
        <span class="font-medium">Categories</span>
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
<a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
    </svg>
    <span class="font-medium">Dashboard</span>
</a>
<a href="{{ route('admin.tools.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
    </svg>
    <span class="font-medium">Tools</span>
</a>
<a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 bg-purple-100 text-purple-700">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
    </svg>
    <span class="font-medium">Categories</span>
</a>
<a href="{{ route('admin.borrowings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
    </svg>
    <span class="font-medium">Borrowings</span>
</a>
<a href="{{ route('admin.reports.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-purple-50">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
    </svg>
    <span class="font-medium">Reports</span>
</a>
@endsection

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-3xl p-6 mb-6 shadow-xl relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 right-10 w-32 h-32 bg-white rounded-full"></div>
            <div class="absolute bottom-10 left-10 w-24 h-24 bg-white rounded-full"></div>
        </div>
        <div class="relative z-10 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">Tool Categories</h1>
                    <p class="text-white/80 text-sm mt-0.5">{{ $categories->count() }} categories • Organize your inventory</p>
                </div>
            </div>
            <a href="{{ route('admin.categories.create') }}" class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="hidden sm:inline">Add Category</span>
            </a>
        </div>
    </div>

    <!-- Categories Grid -->
    @if($categories->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <!-- Category Header -->
                    <div class="p-5 relative overflow-hidden" style="background: linear-gradient(135deg, {{ $category->color }}20 0%, {{ $category->color }}10 100%);">
                        <div class="absolute top-0 right-0 w-20 h-20 opacity-10" style="background: {{ $category->color }}; border-radius: 50%; transform: translate(30%, -30%);"></div>
                        <div class="relative z-10 flex items-start justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center shadow-lg" style="background: {{ $category->color }};">
                                    @if($category->icon)
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $category->icon }}"></path>
                                        </svg>
                                    @else
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800">{{ $category->name }}</h3>
                                    <p class="text-xs text-gray-500 mt-0.5">{{ $category->tools_count }} {{ Str::plural('tool', $category->tools_count) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category Body -->
                    <div class="p-5">
                        @if($category->description)
                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $category->description }}</p>
                        @else
                            <p class="text-sm text-gray-400 mb-4 italic">No description</p>
                        @endif

                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center gap-2">
                                <span class="text-xs text-gray-500">Color:</span>
                                <div class="w-6 h-6 rounded-lg border border-gray-200" style="background: {{ $category->color }};"></div>
                                <span class="text-xs font-mono text-gray-600">{{ $category->color }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <button type="button"
                                    onclick="confirmDeleteCategory({{ $category->id }}, '{{ $category->name }}', {{ $category->tools_count }})"
                                    class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" 
                                    title="Delete" 
                                    {{ $category->tools_count > 0 ? 'disabled' : '' }}>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                                <form id="delete-category-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-12 text-center">
            <div class="w-24 h-24 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">No Categories Yet</h3>
            <p class="text-gray-500 mb-6 max-w-md mx-auto">Start organizing your tools by creating categories. Group similar items together for easier management.</p>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Create First Category
            </a>
        </div>
    @endif
</div>

@push('scripts')
<script>
function confirmDeleteCategory(categoryId, categoryName, toolsCount) {
    if (toolsCount > 0) {
        Swal.fire({
            icon: 'error',
            title: 'Cannot Delete Category',
            html: `
                <div class="text-center">
                    <p class="text-gray-600 mt-2">
                        This category has <strong class="text-red-500">${toolsCount} tool${toolsCount > 1 ? 's' : ''}</strong> assigned to it.
                        <br><br>
                        Please reassign or delete these tools first before removing the category.
                    </p>
                </div>
            `,
            confirmButtonColor: '#6366f1',
            confirmButtonText: 'OK',
            customClass: {
                popup: 'rounded-2xl',
                title: 'text-xl font-bold text-gray-800',
                confirmButton: 'px-6 py-2.5 rounded-xl font-semibold transition-all'
            },
            buttonsStyling: false
        });
        return;
    }

    Swal.fire({
        title: 'Delete Category?',
        html: `
            <div class="text-center">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </div>
                <p class="text-gray-700 text-lg font-semibold mb-2">Delete "${categoryName}"?</p>
                <p class="text-gray-500 text-sm">This action cannot be undone.</p>
            </div>
        `,
        icon: 'warning',
        iconHtml: null,
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, Delete!',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
        showClass: {
            popup: 'animate__animated animate__zoomIn'
        },
        hideClass: {
            popup: 'animate__animated animate__zoomOut'
        },
        customClass: {
            popup: 'rounded-2xl',
            title: 'text-2xl font-bold text-gray-800',
            content: 'text-base text-gray-600',
            confirmButton: 'px-6 py-2.5 rounded-xl font-semibold transition-all transform hover:scale-105',
            cancelButton: 'px-6 py-2.5 rounded-xl font-semibold transition-all'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-category-form-' + categoryId).submit();
        }
    });
}
</script>
@endpush
@endsection
