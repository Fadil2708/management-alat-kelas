<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'description' => 'Electronic devices and equipment including projectors, laptops, tablets, and audio systems.',
                'color' => '#6366f1',
                'icon' => null,
            ],
            [
                'name' => 'Audio Visual',
                'slug' => 'audio-visual',
                'description' => 'Audio and visual equipment including speakers, microphones, cameras, and displays.',
                'color' => '#8b5cf6',
                'icon' => null,
            ],
            [
                'name' => 'Sports Equipment',
                'slug' => 'sports-equipment',
                'description' => 'Sports and physical education equipment including balls, nets, and fitness gear.',
                'color' => '#10b981',
                'icon' => null,
            ],
            [
                'name' => 'Laboratory',
                'slug' => 'laboratory',
                'description' => 'Science laboratory equipment including microscopes, beakers, and experimental apparatus.',
                'color' => '#06b6d4',
                'icon' => null,
            ],
            [
                'name' => 'Art & Music',
                'slug' => 'art-music',
                'description' => 'Art supplies and musical instruments for creative subjects.',
                'color' => '#ec4899',
                'icon' => null,
            ],
            [
                'name' => 'Furniture',
                'slug' => 'furniture',
                'description' => 'Classroom and office furniture including chairs, tables, and storage units.',
                'color' => '#f59e0b',
                'icon' => null,
            ],
            [
                'name' => 'Office Supplies',
                'slug' => 'office-supplies',
                'description' => 'General office supplies including stationery, organizers, and administrative equipment.',
                'color' => '#6b7280',
                'icon' => null,
            ],
            [
                'name' => 'Safety Equipment',
                'slug' => 'safety-equipment',
                'description' => 'Safety and emergency equipment including first aid kits, fire extinguishers, and safety gear.',
                'color' => '#ef4444',
                'icon' => null,
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }
    }
}
