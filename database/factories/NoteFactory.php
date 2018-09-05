<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'user_id'      => $faker->numberBetween(1,4),
        'prospect_id'  => $faker->numberBetween(1,10),
        'title'        => $faker->realText(25),
        'description'  => $faker->realText(150)
    ];
});

/*
 * Implementing via command prompt:
 * php artisan tinker
 * factory(App\Note::class, 10)->create();
 * App\Customer::all();
 * App\Customer::count();
 */