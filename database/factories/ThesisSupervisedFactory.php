<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Teacher\Teaching\ThesisSupervised;
use Faker\Generator as Faker;

$factory->define(ThesisSupervised::class, function (Faker $faker) {
    $user_role = User::role('teacher')->get()->pluck('id')->toArray();
    return [
        'user_id' => $user_role[array_rand($user_role)],
        'thesis_title' => 'thesis title',
        'course_level' => 'course level',
        'program' => 'program',
        'superviser_type_a' => 'type a',
        'superviser_type_b' => 'type b',
    ];
});
