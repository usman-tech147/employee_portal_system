<?php

namespace App\Models\Hr\ManageProgram;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Department extends Model
{
    protected $fillable = ['school_id','name'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
