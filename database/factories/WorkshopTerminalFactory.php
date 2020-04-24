<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Teacher\Teaching\WorkshopTerminal;
use Faker\Generator as Faker;

$factory->define(WorkshopTerminal::class, function (Faker $faker) {
    $user_role = User::role('teacher')->get()->pluck('id')->toArray();
    return [
        'user_id' => $user_role[array_rand($user_role)],
        'title' => 'title',
        'type' => 'test',
        'month' => 'january',
        'organization' => 'xyz',
        'sponsoring_body' => 'abc'
    ];
});
