<?php

namespace App\Models\Teacher\Teaching;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ThesisSupervised extends Model
{
    protected $fillable =
        [
            'user_id',
            'thesis_title',
            'course_level',
            'program',
            'superviser_type_a',
            'superviser_type_b',
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
