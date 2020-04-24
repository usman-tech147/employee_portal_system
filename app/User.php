<?php

namespace App;

use App\Models\Hr\ManageProgram\School;
use App\Models\Teacher\Teaching\CourseAssessment;
use App\Models\Teacher\Teaching\CourseDetail;
use App\Models\Teacher\Teaching\NewCourse;
use App\Models\Teacher\Teaching\ProjectSupervision;
use App\Models\Teacher\Teaching\ThesisSupervised;
use App\Models\Teacher\Teaching\WorkshopTerminal;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'first_name','last_name','email','designation','gender','school_id','department_id','password',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function course_details()
    {
        return $this->hasMany(CourseDetail::class);
    }

    public function course_assessments()
    {
        return $this->hasMany(CourseAssessment::class);
    }

    public function new_courses()
    {
        return $this->hasMany(NewCourse::class);
    }

    public function thesis_supervises()
    {
        return $this->hasMany(ThesisSupervised::class);
    }

    public function project_supervises()
    {
        return $this->hasMany(ProjectSupervision::class);
    }

    public function workshop_terminals()
    {
        return $this->hasMany(WorkshopTerminal::class);
    }

}
