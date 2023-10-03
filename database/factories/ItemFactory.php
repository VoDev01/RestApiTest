<?php

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->numerify('##########'),
        'key' => str_random(25)
    ];
});
