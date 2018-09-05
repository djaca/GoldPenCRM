<?php

use Faker\Generator as Faker;

$factory->define(App\Prospect::class, function (Faker $faker) {
    return [
        'user_id'     => $faker->numberBetween(1,4),
        'funnel_id'   => $faker->numberBetween(1,4),
        'name_last'   => $faker->firstName,
        'name_first'  => $faker->firstName,
        'email'       => $faker->email,
        'address1'    => $faker->streetAddress,
        'city'        => $faker->city,
        'phone'       => $faker->phoneNumber,
        'fax'         => $faker->phoneNumber,
        'zip'         => $faker->postcode
    ];
});

/*
 * Implementing via command prompt:
 * php artisan tinker
 * factory(App\Prospect::class, 10)->create();
 * App\Customer::all();
 * App\Customer::count();
 */