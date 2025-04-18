<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
class GiftCard extends Model
{
    use HasFactory;

    protected $table = 'gift_card';

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
    ];

    protected static function booted()
    {
        static::deleted(function ($cookingClass) {
            if ($cookingClass->image) {
                Storage::disk('public')->delete($cookingClass->image);
            }
        });
    }
    public function details(): HasMany
    {
        return $this->hasMany(GiftCardDetail::class);
    }
}
