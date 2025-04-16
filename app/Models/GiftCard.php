<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function details(): HasMany
    {
        return $this->hasMany(GiftCardDetail::class);
    }
}
