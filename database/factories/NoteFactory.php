<?php

use Faker\Generator as Faker;

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'user_id'      => $faker->numberBetween(1,4),
        'prospect_id'  => $faker->numberBetween(1,10),
        'title'        => $faker->title,
        'description'  => $faker->text(150)
    ];
});
