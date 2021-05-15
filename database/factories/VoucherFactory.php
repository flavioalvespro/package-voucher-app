<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use App\Models\Offer;
use App\Models\Voucher;
use Faker\Generator as Faker;

$factory->define(Voucher::class, function (Faker $faker) {
    return [
        'expiration_date' => now(),
        'client_id' => factory(Client::class),
        'offer_id' => factory(Offer::class)
    ];
});
