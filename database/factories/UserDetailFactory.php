<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\UserDetail;
use Faker\Generator as Faker;

$factory->define(UserDetail::class, static function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'date_of_birth' => $faker->date(),
        'gender' => $faker->randomElement(['male', 'female']),
        'state_of_origin' => $faker->state,
        'occupation' => $faker->jobTitle,
        'residential_address' => $faker->address
    ];
});
