<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'description',
    ];

    /**
     * Get setting value by key
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = self::where('key', $key)->first();
        
        if (!$setting) {
            return $default;
        }

        return match ($setting->type) {
            'number' => (float) $setting->value,
            'boolean' => (bool) $setting->value,
            'json' => json_decode($setting->value, true),
            default => $setting->value,
        };
    }

    /**
     * Set setting value by key
     */
    public static function set(string $key, mixed $value, string $type = 'string', ?string $description = null): void
    {
        $setting = self::firstOrCreate(['key' => $key]);
        
        $setting->update([
            'value' => match ($type) {
                'json' => json_encode($value),
                default => $value,
            },
            'type' => $type,
            'description' => $description ?? $setting->description,
        ]);
    }
}
