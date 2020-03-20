<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function courseLevels()
    {
        return $this->belongsToMany(CourseLevel::class);
    }
}
