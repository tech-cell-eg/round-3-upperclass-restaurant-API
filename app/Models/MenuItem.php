<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'menu_items';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'tag',
        'category_id',
        'discount_id',
    ];

    protected static function booted()
    {
        static::deleted(function ($cookingClass) {
            if ($cookingClass->image) {
                Storage::disk('public')->delete($cookingClass->image);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
}
