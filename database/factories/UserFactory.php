<?php

use Faker\Generator as Faker;
use App\Product;
use App\Category;
use App\SubCategory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(Product::class, function (Faker $faker) {

    return [
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'description' => 'This is a product description.',
        'images' => 'This should be image oject',
        'price' => $faker->numberBetween($min = 100, $max = 800),
        'categories_id' => 1,
        'sub_categories_id' => 2,
        'brand' => 'Bachmann',
        'stock' => 10,
        'slug' => $faker->sentence($nbWords = 3, $variableNbWords = true)
    ];
});
