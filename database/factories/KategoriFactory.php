<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kategori;
use Faker\Generator as Faker;

$factory->define(Kategori::class, function (Faker $faker) {
    return [
        'nama_kategori' => $faker->randomElement(['Sumsang', 'Nokoi', 'SNSV', 'Melon']),
        'jenis_kategori' => $faker->randomElement(['Elektronik', 'Smartphone', 'Laptop', 'Aksesoris']),
    ];
});
