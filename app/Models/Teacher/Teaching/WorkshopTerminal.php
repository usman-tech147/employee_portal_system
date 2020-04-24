<?php

namespace App\Models\Teacher\Teaching;

use App\User;
use Illuminate\Database\Eloquent\Model;

class WorkshopTerminal extends Model
{
    protected $fillable = ['user_id','title','type','month','organization','sponsoring_body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
