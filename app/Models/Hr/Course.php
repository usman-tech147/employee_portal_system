<?php

namespace App\Models\Hr;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['course_name', 'course_code'];

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
}
