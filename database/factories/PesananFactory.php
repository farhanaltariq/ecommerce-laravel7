<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pesanan;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Pesanan::class, function (Faker $faker) {
    return [
        'produk_id' => $faker->numberBetween(1, 10),
        'pelanggan_id' => $faker->numberBetween(1, 10),
        'invoice_id' => Carbon :: now('GMT+7')->year . '/' . Carbon :: now('GMT+7')->month . '/' . Carbon :: now('GMT+7')->day . '/' . random_int(1000, 9999),
        'qty' => $faker->numberBetween(1, 50),
        'total_harga' => $faker->numberBetween(10000, 9999),
        'status' => $faker->randomElement(['Belum dibayar', 'Dibayar', 'Dikirim', 'Diterima', 'Dibatalkan']),
        'date' => $faker->dateTimeBetween('-1 years', 'now'),
    ];
});
