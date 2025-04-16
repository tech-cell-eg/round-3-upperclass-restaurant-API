<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];
    protected $casts = ['value' => 'array'];

    /**
     * Get or create restaurant hours setting
     */
    public static function getRestaurantHours()
    {
        return self::firstOrCreate(
            ['key' => 'restaurant_hours'],
            ['value' => self::defaultRestaurantHours()]
        )->value;
    }

    /**
     * Update restaurant hours
     */
    public static function updateRestaurantHours(array $hours)
    {
        return self::updateOrCreate(
            ['key' => 'restaurant_hours'],
            ['value' => $hours]
        );
    }

    /**
     * Default restaurant hours
     */
    public static function defaultRestaurantHours()
    {
        return [
            ['day' => 'Mon', 'is_closed' => true, 'hours' => null],
            ['day' => 'Tue', 'is_closed' => false, 'hours' => ['16:00', '20:00']],
            ['day' => 'Wed', 'is_closed' => false, 'hours' => ['16:00', '20:00']],
            ['day' => 'Thu', 'is_closed' => false, 'hours' => ['16:00', '20:00']],
            ['day' => 'Fri', 'is_closed' => false, 'hours' => ['16:00', '20:00']],
            ['day' => 'Sat', 'is_closed' => false, 'hours' => ['17:00', '23:00']],
            ['day' => 'Sun', 'is_closed' => false, 'hours' => ['17:00', '23:00']],
        ];
    }

    /**
     * Check if restaurant is open at given datetime
     */
    public static function isOpenAt(string $date, string $time): bool
    {
        $date = \Carbon\Carbon::parse($date);
        $day = $date->format('D');
        $time = date('H:i', strtotime($time));

        $hours = self::getRestaurantHours();
        $dayHours = collect($hours)->firstWhere('day', $day);

        if (!$dayHours || $dayHours['is_closed']) {
            return false;
        }

        if (empty($dayHours['hours'])) {
            return false;
        }

        [$open, $close] = $dayHours['hours'];
        return $time >= $open && $time <= $close;
    }
}
