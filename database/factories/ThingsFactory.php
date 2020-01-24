<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Thing;
use Faker\Generator as Faker;

$factory->define(Thing::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(), 
        'description' => $faker->text(), 
        'status' => $faker->randomElement([0,1,2,3,4,5]), 
        'start_at' => $faker->dateTime(), 
        'end_at' => $faker->dateTime(), 
        'difficulty' => $faker->randomElement([0,1,2,3,4,5]), 
        'importance' => $faker->randomElement([0,1,2,3,4,5]),
        'urgency' => $faker->randomElement([0,1,2,3,4,5])
    ];
});
