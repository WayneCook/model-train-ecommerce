<?php
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {

    $name = $faker->words(3, true);
    $scales = ['HO', 'N', 'O', 'S', 'Z'];
    $brands = ['Bachmann', 'Jouef', 'Kato', 'Lionel', 'Micro-Trains', 'MTH', 'RailKing'];

    return [
        'name' => $name,
        'description' => 'This is a product description.',
        'price' => $faker->numberBetween(100, 4000),
        'category_id' => 1,
        'sub_category_id' => 3,
        'brand' => $brands[array_rand($brands)],
        'scale' => $scales[array_rand($scales)],
        'stock' => rand(0, 200),
        'slug' => Str::slug($name, '-')
    ];
});
