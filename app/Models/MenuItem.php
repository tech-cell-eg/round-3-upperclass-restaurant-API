<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MenuItem extends Model
{
    protected $table = 'menu_items';

    protected $fillable = [
        'title',
        'price',
        'img_url',
        'type',
    ];

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(ingredient::class, 'menu_item_ingredients');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
}
