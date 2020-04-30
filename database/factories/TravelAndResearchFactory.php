<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Teacher\ResearchAndPublications\TravelAndResearch;
use Faker\Generator as Faker;

$factory->define(TravelAndResearch::class, function (Faker $faker) {
    $user_role = User::role('teacher')->get()->pluck('id')->toArray();
    return [
        'user_id' => $user_role[array_rand($user_role)],
        'research_type' => 'Research Project',
        'funding_agency' => 'umt',
        'venue' => 'lahore',
        'total_grants' => 5,
        'approval' => '2020-03-25',
    ];
});
