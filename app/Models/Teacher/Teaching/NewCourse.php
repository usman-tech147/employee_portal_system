<?php

namespace App\Models\Teacher\Teaching;

use App\User;
use Illuminate\Database\Eloquent\Model;

class NewCourse extends Model
{
    protected $fillable = ['course_title','course_code','program','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
