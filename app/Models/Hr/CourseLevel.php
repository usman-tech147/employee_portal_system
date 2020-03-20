<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Model;

class CourseLevel extends Model
{
    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
