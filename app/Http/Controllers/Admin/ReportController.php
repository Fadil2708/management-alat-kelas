<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
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

        if ($request->filled('tool_id')) {
            $query->where('tool_id', $request->tool_id);
        }

        if ($request->filled('date_from')) {
            $query->where('date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('date', '<=', $request->date_to);
        }

        $borrowings = $query->latest()->get();
        $users = User::where('role', 'guru')->get();
        $tools = Tool::all();

        return view('admin.reports.index', compact('borrowings', 'users', 'tools'));
    }

    public function export(Request $request)
    {
        $query = Borrowing::with(['user', 'tool']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('tool_id')) {
            $query->where('tool_id', $request->tool_id);
        }

        if ($request->filled('date_from')) {
            $query->where('date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->where('date', '<=', $request->date_to);
        }

        $borrowings = $query->latest()->get();
        $filters = $request->only(['status', 'user_id', 'tool_id', 'date_from', 'date_to']);

        $pdf = Pdf::loadView('admin.reports.pdf', compact('borrowings', 'filters'));
        
        return $pdf->download('borrowing-report-' . date('Y-m-d') . '.pdf');
    }
}
