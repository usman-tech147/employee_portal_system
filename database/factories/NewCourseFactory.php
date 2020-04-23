<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Teacher\Teaching\NewCourse;
use Faker\Generator as Faker;

$factory->define(NewCourse::class, function (Faker $faker) {
    $user_role = User::role('teacher')->get()->pluck('id')->toArray();
    return [
        'user_id' => $user_role[array_rand($user_role)],
        'course_title' => 'new course title',
        'course_code' => 'new course code',
        'program' => 'new course program',
        'status' => 'In Progress',
    ];
});
