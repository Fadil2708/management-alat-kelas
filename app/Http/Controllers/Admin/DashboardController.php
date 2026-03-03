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

        // Monthly borrowing data for chart (database-agnostic)
        $driver = DB::connection()->getDriverName();
        $dateFormat = $driver === 'sqlite' ? "strftime('%Y-%m', date)" : "DATE_FORMAT(date, '%Y-%m')";
        
        $monthlyData = Borrowing::selectRaw("$dateFormat as month, COUNT(*) as count")
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
