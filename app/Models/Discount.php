<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $fillable = [
        'discount_type',
        'discount_value',
        'is_active',
    ];

    public function menuItem(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
