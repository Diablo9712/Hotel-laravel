<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Export;

$factory->define(App\Export::class, function (Faker $faker) {
    return [
        'firstName'  => $faker->firstName,
        'lastName'  => $faker->lastName
    ];
});