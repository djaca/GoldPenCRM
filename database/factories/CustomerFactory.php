<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'user_id'     => $faker->numberBetween(1,4),
        'funnel_id'   => $faker->numberBetween(1,4),
        'name'        => $faker->company,
        'email'       => $faker->email,
        'address1'    => $faker->streetAddress,
        'address2'    => $faker->streetAddress,
        'city'        => $faker->city,
        'state'       => $faker->state,
        'phone'       => $faker->phoneNumber,
        'fax'         => $faker->phoneNumber,
        'zip'         => $faker->postcode
    ];
});

/*
 * Implementing via command prompt:
 * php artisan tinker
 * factory(App\Customer::class, 10)->create();
 * App\Customer::all();
 * App\Customer::count();
 */