<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Thing;
use Faker\Generator as Faker;

$factory->define(Thing::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(), 
        'description' => $faker->text(), 
        'status' => $faker->randomElement([1,2,3,4,5]), 
        'start_at' => $faker->dateTime(), 
        'end_at' => $faker->dateTime(), 
        'difficulty' => $faker->randomElement([1,2,3,4,5]), 
        'importance' => $faker->randomElement([1,2,3,4,5]),
        'urgency' => $faker->randomElement([1,2,3,4,5]),
        'user_id' => $faker->randomElement([1,2,3,4,5])
    ];
});
