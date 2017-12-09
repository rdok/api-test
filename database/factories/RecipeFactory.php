<?php

use App\Recipe;
use Faker\Generator;

/** @var $factory \Illuminate\Database\Eloquent\Factory */

$factory->define(Recipe::class, function (Generator $faker) {
    return [
        'box_type' => $faker->word,
        'title' => $faker->word,
        'slug' => $faker->unique()->slug,
        'marketing_description' => $faker->sentence,
        'calories_kcal' => (string)$faker->numberBetween(0, 5000),
        'protein_grams' => (string)$faker->numberBetween(0, 5000),
        'fat_grams' => (string)$faker->numberBetween(0, 5000),
        'carbs_grams' => (string)$faker->numberBetween(0, 5000),
        'recipe_diet_type_id' => $faker->word,
        'season' => $faker->word,
        'protein_source' => $faker->word,
        'preparation_time_minutes' => (string)$faker->numberBetween(0, 5000),
        'shelf_life_days' => (string)$faker->numberBetween(0, 100),
        'equipment_needed' => $faker->word,
        'origin_country' => $faker->word,
        'recipe_cuisine' => $faker->word,
        'gousto_reference' => $faker->word,
    ];
});
