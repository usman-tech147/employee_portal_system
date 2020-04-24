<?php

namespace App\Models\Teacher\Teaching;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProjectSupervision extends Model
{
    protected $fillable =
        [
            'user_id','project_title','course_level',
            'program','no_of_students','organization_name',
            'project_type'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
