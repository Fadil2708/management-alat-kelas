@extends('layouts.app')

@section('title', 'New Borrowing Request')

@section('content')
<div class="mb-6">
    <a href="{{ route('guru.borrowings.index') }}" class="text-blue-600 hover:text-blue-900 flex items-center gap-1 mb-4">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Borrowings
    </a>
    <h2 class="text-2xl font-bold text-gray-800">New Borrowing Request</h2>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <form action="{{ route('guru.borrowings.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label for="tool_id" class="block text-sm font-medium text-gray-700 mb-2">Select Tool <span class="text-red-500">*</span></label>
                <select id="tool_id" name="tool_id" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tool_id') border-red-500 @enderror"
                        required>
                    <option value="">Choose a tool...</option>
                    @foreach($tools as $tool)
                    <option value="{{ $tool->id }}" {{ old('tool_id') == $tool->id ? 'selected' : '' }}>
                        {{ $tool->name }} ({{ $tool->inventory_code }}) - {{ $tool->location }}
                    </option>
                    @endforeach
                </select>
                @error('tool_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date <span class="text-red-500">*</span></label>
                <input type="date" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" 
                       min="{{ date('Y-m-d') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('date') border-red-500 @enderror"
                       required>
                @error('date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="start_time" class="block text-sm font-medium text-gray-700 mb-2">Start Time <span class="text-red-500">*</span></label>
                <input type="time" id="start_time" name="start_time" value="{{ old('start_time') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('start_time') border-red-500 @enderror"
                       required>
                @error('start_time')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="end_time" class="block text-sm font-medium text-gray-700 mb-2">End Time <span class="text-red-500">*</span></label>
                <input type="time" id="end_time" name="end_time" value="{{ old('end_time') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('end_time') border-red-500 @enderror"
                       required>
                @error('end_time')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="purpose" class="block text-sm font-medium text-gray-700 mb-2">Purpose <span class="text-red-500">*</span></label>
                <textarea id="purpose" name="purpose" rows="4" 
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('purpose') border-red-500 @enderror"
                          required>{{ old('purpose') }}</textarea>
                @error('purpose')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs text-gray-500 mt-1">Briefly describe why you need this equipment</p>
            </div>
        </div>

        <div class="mt-6 flex gap-4">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                Submit Request
            </button>
            <a href="{{ route('guru.borrowings.index') }}" 
               class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition duration-150">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
