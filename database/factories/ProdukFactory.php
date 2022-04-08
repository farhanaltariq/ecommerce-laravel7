<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produk;
use Faker\Generator as Faker;

$factory->define(Produk::class, function (Faker $faker) {
    return [
        'kategori_id' => $faker->numberBetween(1, 10),
        'nama_produk' => $faker->name,
        'deskripsi' => $faker->text,
        'harga' => $faker->numberBetween(10000, 100000),
        'status' => $faker->randomElement(['Rilis', 'Draft']),
        'berat' => $faker->numberBetween(1, 10),
        'foto_produk' => $faker->imageUrl(640, 480, 'cats')
    ];
});
