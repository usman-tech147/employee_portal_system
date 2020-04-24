<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Teacher\Teaching\ProjectSupervision;
use Faker\Generator as Faker;

$factory->define(ProjectSupervision::class, function (Faker $faker) {
    $user_role = User::role('teacher')->get()->pluck('id')->toArray();
    return [
        'user_id' => $user_role[array_rand($user_role)],
        'project_title' => 'project title',
        'course_level' => 'course level',
        'program' => 'program',
        'no_of_students' => 50,
        'organization_name' => 'xyz',
        'project_type' => 'non funded'
    ];
});
