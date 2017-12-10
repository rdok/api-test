<?php

use App\Recipe;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Support\Str;

/** @var $factory \Illuminate\Database\Eloquent\Factory */

$factory->define(Recipe::class, function (Generator $faker) {
    return [
        'created_at' => $timestamp = $faker->dateTime()->format('Y-m-d H:i:s'),
        'updated_at' => $timestamp,
        'box_type' => $faker->word,
        'title' => $title = $faker->sentence,
        'slug' => Str::slug($title),
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
        'gousto_reference' => (string)$faker->numberBetween(0, 100),
    ];
});
