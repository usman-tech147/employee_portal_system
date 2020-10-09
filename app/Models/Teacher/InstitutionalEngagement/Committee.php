<?php

namespace App\Models\Teacher\InstitutionalEngagement;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $fillable =
        [
            'user_id',
            'name',
            'member_since',
            'formed_by',
            'position',
            'type',
            'chairperson',
            'no_of_meetings',
            'attends',
            'contribution'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
