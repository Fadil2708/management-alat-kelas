<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowing extends Model
{
    protected $fillable = [
        'user_id',
        'tool_id',
        'date',
        'start_time',
        'end_time',
        'purpose',
        'status',
        'notes',
        'returned_at',
        'fine_amount',
    ];

    protected $casts = [
        'date' => 'date',
        'returned_at' => 'datetime',
        'fine_amount' => 'decimal:2',
    ];

    /**
     * Check if borrowing is overdue
     */
    public function isOverdue(): bool
    {
        if ($this->status === 'returned' || $this->status === 'rejected') {
            return false;
        }

        $maxDuration = Setting::get('borrowing.max_duration', 7);
        $dueDate = $this->date->copy()->addDays($maxDuration);
        
        return Carbon::today()->gt($dueDate);
    }

    /**
     * Get overdue days
     */
    public function getOverdueDays(): int
    {
        if (!$this->isOverdue()) {
            return 0;
        }

        $maxDuration = Setting::get('borrowing.max_duration', 7);
        $dueDate = $this->date->copy()->addDays($maxDuration);
        
        return Carbon::today()->diffInDays($dueDate, false);
    }

    /**
     * Calculate fine for this borrowing
     */
    public function calculateFine(): float
    {
        if (!Setting::get('borrowing.enable_fines', true)) {
            return 0;
        }

        $overdueDays = $this->getOverdueDays();
        $finePerDay = Setting::get('borrowing.fine_per_day', 5000);
        
        return $overdueDays * $finePerDay;
    }

    /**
     * Get due date
     */
    public function getDueDateAttribute(): Carbon
    {
        $maxDuration = Setting::get('borrowing.max_duration', 7);
        return $this->date->copy()->addDays($maxDuration);
    }

    /**
     * Scope for overdue borrowings
     */
    public function scopeOverdue($query)
    {
        return $query->whereIn('status', ['approved', 'borrowed']);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tool(): BelongsTo
    {
        return $this->belongsTo(Tool::class);
    }
}
