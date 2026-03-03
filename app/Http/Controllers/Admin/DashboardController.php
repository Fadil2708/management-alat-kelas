<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTools = Tool::count();
        $availableTools = Tool::where('status', 'available')->count();
        $borrowedTools = Tool::where('status', 'borrowed')->count();
        $maintenanceTools = Tool::where('status', 'maintenance')->count();

        $recentBorrowings = Borrowing::with(['user', 'tool'])
            ->latest()
            ->take(5)
            ->get();

        // Monthly borrowing data for chart (SQLite compatible)
        $monthlyData = Borrowing::selectRaw("strftime('%Y-%m', date) as month, COUNT(*) as count")
            ->where('date', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('admin.dashboard', compact(
            'totalTools',
            'availableTools',
            'borrowedTools',
            'maintenanceTools',
            'recentBorrowings',
            'monthlyData'
        ));
    }
}
