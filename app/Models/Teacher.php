<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    // Relations
    public function classes()
    {
        return $this->hasMany(CookingClass::class);
    }
}
