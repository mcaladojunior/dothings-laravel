<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lists;
use Faker\Generator as Faker;

$factory->define(Lists::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Inbox', 'Projects', 'Trash', 'Some day/Maybe', 'Reference', 'Calendar', 'Next Actions']), 
        'priority' => $faker->randomElement([0,1,2,3,4,5])
    ];
});
