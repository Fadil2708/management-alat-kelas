<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Schedule daily overdue borrowing check
Schedule::command('borrowings:check-overdue')
    ->dailyAt('08:00')
    ->name('check-overdue-borrowings')
    ->onOneServer();
