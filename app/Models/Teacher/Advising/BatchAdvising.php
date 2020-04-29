<?php

namespace App\Models\Teacher\Advising;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BatchAdvising extends Model
{
    protected $fillable =
        [
            'user_id','program','batch',
            'start_date','end_date',
            'no_of_students','meeting_held_on'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
