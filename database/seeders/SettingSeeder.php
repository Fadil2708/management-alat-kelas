<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::firstOrCreate(['key' => 'borrowing.max_duration'], [
            'value' => '7',
            'type' => 'number',
            'description' => 'Maximum borrowing duration in days',
        ]);

        Setting::firstOrCreate(['key' => 'borrowing.fine_per_day'], [
            'value' => '5000',
            'type' => 'number',
            'description' => 'Fine per day for overdue (in IDR)',
        ]);

        Setting::firstOrCreate(['key' => 'borrowing.enable_fines'], [
            'value' => '1',
            'type' => 'boolean',
            'description' => 'Enable or disable fine system',
        ]);

        Setting::firstOrCreate(['key' => 'borrowing.overdue_reminder_days'], [
            'value' => '1',
            'type' => 'number',
            'description' => 'Send reminder H-1 before due date',
        ]);
    }
}
