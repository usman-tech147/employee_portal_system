<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Teacher\Advising\BatchAdvising;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

$factory->define(BatchAdvising::class, function (Faker $faker) {
    $user_role = User::role('teacher')->get()->pluck('id')->toArray();
    return [
        'user_id' => $user_role[array_rand($user_role)],
        'program' => 'Medical',
        'batch' => 'batch 1',
        'start_date' => '2020-03-25',
        'end_date' => '2020-04-25',
        'no_of_students' => 50,
        'meeting_held_on' => 'Orientation'
    ];
});
