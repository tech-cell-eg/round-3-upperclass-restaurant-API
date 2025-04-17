<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CookingClass extends Model
{
    // Relations
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
}
