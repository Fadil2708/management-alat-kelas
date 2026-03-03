<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            [
                'name' => 'LCD Projector Epson',
                'category' => 'Display',
                'inventory_code' => 'PRJ-001',
                'condition' => 'good',
                'location' => 'Room 101',
                'status' => 'available',
            ],
            [
                'name' => 'HDMI Cable 5m',
                'category' => 'Electronics',
                'inventory_code' => 'HDM-001',
                'condition' => 'good',
                'location' => 'Storage Room A',
                'status' => 'available',
            ],
            [
                'name' => 'Wireless Microphone',
                'category' => 'Audio',
                'inventory_code' => 'MIC-001',
                'condition' => 'good',
                'location' => 'Storage Room A',
                'status' => 'available',
            ],
            [
                'name' => 'Portable Speaker',
                'category' => 'Audio',
                'inventory_code' => 'SPK-001',
                'condition' => 'fair',
                'location' => 'Storage Room B',
                'status' => 'available',
            ],
            [
                'name' => 'Laptop Dell Inspiron',
                'category' => 'Electronics',
                'inventory_code' => 'LPT-001',
                'condition' => 'good',
                'location' => 'Computer Lab',
                'status' => 'available',
            ],
            [
                'name' => 'Extension Cable 10m',
                'category' => 'Electronics',
                'inventory_code' => 'EXT-001',
                'condition' => 'good',
                'location' => 'Storage Room A',
                'status' => 'available',
            ],
            [
                'name' => 'Whiteboard Stand',
                'category' => 'Other',
                'inventory_code' => 'WBS-001',
                'condition' => 'good',
                'location' => 'Storage Room B',
                'status' => 'available',
            ],
            [
                'name' => 'Projector Screen',
                'category' => 'Display',
                'inventory_code' => 'SCR-001',
                'condition' => 'fair',
                'location' => 'Room 102',
                'status' => 'borrowed',
            ],
        ];

        foreach ($tools as $tool) {
            Tool::create($tool);
        }
    }
}
