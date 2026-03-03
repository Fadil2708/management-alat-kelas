<?php

namespace App\Console\Commands;

use App\Models\Borrowing;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckOverdueBorrowings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'borrowings:check-overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for overdue borrowings and calculate fines';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Checking for overdue borrowings...');

        $maxDuration = Setting::get('borrowing.max_duration', 7);
        $finePerDay = Setting::get('borrowing.fine_per_day', 5000);
        $enableFines = Setting::get('borrowing.enable_fines', true);

        $this->info("Configuration: Max Duration = {$maxDuration} days, Fine/Day = Rp " . number_format($finePerDay, 0, ',', '.'));

        // Get all active borrowings that could be overdue
        $borrowings = Borrowing::whereIn('status', ['approved', 'borrowed'])
            ->where('date', '<', Carbon::today()->subDays($maxDuration))
            ->with(['user', 'tool'])
            ->get();

        if ($borrowings->isEmpty()) {
            $this->info('No overdue borrowings found.');
            return Command::SUCCESS;
        }

        $this->warn("Found {$borrowings->count()} overdue borrowing(s)!");

        $totalFine = 0;

        foreach ($borrowings as $borrowing) {
            $overdueDays = $borrowing->getOverdueDays();
            $fine = $enableFines ? $borrowing->calculateFine() : 0;
            $totalFine += $fine;

            $this->newLine();
            $this->table(
                ['Borrowing ID', 'Tool', 'Borrower', 'Borrow Date', 'Due Date', 'Overdue', 'Fine'],
                [[
                    $borrowing->id,
                    $borrowing->tool->name,
                    $borrowing->user->name,
                    $borrowing->date->format('M d, Y'),
                    $borrowing->due_date->format('M d, Y'),
                    "{$overdueDays} days",
                    $enableFines ? 'Rp ' . number_format($fine, 0, ',', '.') : 'Disabled',
                ]]
            );

            // Update fine amount in database
            if ($enableFines) {
                $borrowing->update(['fine_amount' => $fine]);
            }
        }

        $this->newLine();
        $this->info('=== Summary ===');
        $this->table(
            ['Total Overdue', 'Total Fine'],
            [[
                $borrowings->count(),
                $enableFines ? 'Rp ' . number_format($totalFine, 0, ',', '.') : 'Disabled',
            ]]
        );

        $this->newLine();
        $this->info('Overdue check completed!');

        return Command::SUCCESS;
    }
}
