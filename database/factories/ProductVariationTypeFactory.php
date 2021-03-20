<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVariationType;
use Faker\Generator as Faker;

$factory->define(ProductVariationType::class, function(Faker $faker) {
    return [
        'name' => $faker->unique()->name
    ];
});