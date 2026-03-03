<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Tool;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index(Request $request)
    {
        $query = Borrowing::with(['user', 'tool']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('date_from')) {
            $query->where('date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('date', '<=', $request->date_to);
        }

        // Overdue filter
        if ($request->filled('overdue')) {
            $query->whereIn('status', ['approved', 'borrowed']);
        }

        $borrowings = $query->latest()->paginate(15)->withQueryString();
        $users = \App\Models\User::where('role', 'guru')->get();
        
        // Consolidated stats in single query
        $statusCounts = Borrowing::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');
        
        // Overdue count
        $overdueCount = Borrowing::whereIn('status', ['approved', 'borrowed'])
            ->where('date', '<', now()->subDays(\App\Models\Setting::get('borrowing.max_duration', 7)))
            ->count();

        $stats = [
            'pending' => $statusCounts['pending'] ?? 0,
            'approved' => $statusCounts['approved'] ?? 0,
            'returned' => $statusCounts['returned'] ?? 0,
            'rejected' => $statusCounts['rejected'] ?? 0,
            'overdue' => $overdueCount,
        ];

        return view('admin.borrowings.index', compact('borrowings', 'users', 'stats'));
    }

    public function show(Borrowing $borrowing)
    {
        $borrowing->load(['user', 'tool']);
        return view('admin.borrowings.show', compact('borrowing'));
    }

    public function approve(Borrowing $borrowing)
    {
        if ($borrowing->status !== 'pending') {
            return back()->with('error', 'Only pending borrowings can be approved.');
        }

        // Double-check tool availability
        if ($borrowing->tool->status !== 'available') {
            return back()->with('error', 'This tool is no longer available.');
        }

        $borrowing->update(['status' => 'approved']);

        // Update tool status to borrowed
        $borrowing->tool->update(['status' => 'borrowed']);

        return back()->with('success', 'Borrowing request approved successfully.');
    }

    public function reject(Borrowing $borrowing, Request $request)
    {
        if ($borrowing->status !== 'pending') {
            return back()->with('error', 'Only pending borrowings can be rejected.');
        }

        $validated = $request->validate([
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        $borrowing->update([
            'status' => 'rejected',
            'notes' => $validated['notes'] ?? null,
        ]);

        return back()->with('success', 'Borrowing request rejected.');
    }

    public function return(Borrowing $borrowing, Request $request)
    {
        if ($borrowing->status !== 'approved') {
            return back()->with('error', 'Only approved borrowings can be returned.');
        }

        $validated = $request->validate([
            'condition_after' => ['required', 'in:good,fair,poor'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        $borrowing->update([
            'status' => 'returned',
            'notes' => ($borrowing->notes ? $borrowing->notes . "\n\n" : '') . 
                      'Returned with condition: ' . $validated['condition_after'] . 
                      ($validated['notes'] ? '. Notes: ' . $validated['notes'] : ''),
        ]);

        // Update tool status and condition
        $borrowing->tool->update([
            'status' => 'available',
            'condition' => $validated['condition_after'],
        ]);

        return back()->with('success', 'Tool returned successfully.');
    }
}
