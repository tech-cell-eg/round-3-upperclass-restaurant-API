<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Teacher extends Model
{

    protected static function booted()
    {
        static::deleted(function ($cookingClass) {
            if ($cookingClass->image) {
                Storage::disk('public')->delete($cookingClass->image);
            }
        });
    }

    // Relations
    public function classes()
    {
        return $this->hasMany(CookingClass::class);
    }
}
