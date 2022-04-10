<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pelanggan;
use Faker\Generator as Faker;

$factory->define(Pelanggan::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'alamat' => $faker->address,
    ];
});
