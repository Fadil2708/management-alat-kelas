<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrowings = Borrowing::with('tool')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('guru.borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tools = Tool::where('status', 'available')->get();
        return view('guru.borrowings.create', compact('tools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tool_id' => ['required', 'exists:tools,id'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required'],
            'end_time' => ['required', 'after:start_time'],
            'purpose' => ['required', 'string', 'max:500'],
        ]);

        // Check for overlap
        $overlap = DB::table('borrowings')
            ->where('tool_id', $validated['tool_id'])
            ->where('date', $validated['date'])
            ->where('status', '!=', 'rejected')
            ->where('status', '!=', 'returned')
            ->where(function ($query) use ($validated) {
                $query->whereBetween('start_time', [$validated['start_time'], $validated['end_time']])
                    ->orWhereBetween('end_time', [$validated['start_time'], $validated['end_time']])
                    ->orWhere(function ($q) use ($validated) {
                        $q->where('start_time', '<=', $validated['start_time'])
                            ->where('end_time', '>=', $validated['end_time']);
                    });
            })
            ->exists();

        if ($overlap) {
            return back()->withErrors([
                'tool_id' => 'This tool is already booked for the selected date and time.'
            ])->withInput();
        }

        // Verify tool is available
        $tool = Tool::find($validated['tool_id']);
        if (!$tool || $tool->status !== 'available') {
            return back()->withErrors([
                'tool_id' => 'This tool is no longer available.'
            ])->withInput();
        }

        Borrowing::create([
            'user_id' => Auth::id(),
            'tool_id' => $validated['tool_id'],
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'purpose' => $validated['purpose'],
            'status' => 'pending',
        ]);

        return redirect()->route('guru.borrowings.index')->with('success', 'Borrowing request submitted successfully. Waiting for admin approval.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        // Ensure user can only view their own borrowings
        if ($borrowing->user_id !== Auth::id()) {
            abort(403);
        }

        return view('guru.borrowings.show', compact('borrowing'));
    }

    /**
     * Cancel a pending borrowing
     */
    public function cancel(Borrowing $borrowing)
    {
        // Ensure user can only cancel their own pending borrowings
        if ($borrowing->user_id !== Auth::id() || $borrowing->status !== 'pending') {
            abort(403);
        }

        $borrowing->update(['status' => 'rejected']);

        return redirect()->route('guru.borrowings.index')->with('success', 'Borrowing request cancelled.');
    }
}
