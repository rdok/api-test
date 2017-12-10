<?php

use App\Recipe;

class FetchRecipeTest extends TestCase
{
    /** @test */
    public function fetch_a_recipe_for_default_medium()
    {
        /** @var Recipe $recipe */
        $recipe = factory(Recipe::class)->create()->fresh();

        $uri = '/recipe/' . $recipe->id;

        $expectedJson = array_except($recipe->toArray(), 'id');

        $this->json('GET', $uri)->seeJson($expectedJson);
    }

    /** @test */
    public function throw_error_when_id_is_invalid()
    {
        $uri = '/recipe/invalid';

        $this->json('GET', $uri)->seeJsonContains([
            'message' => 'The id is invalid.'
        ]);
    }

    /** @test */
    public function fetch_recipe_for_mobile()
    {
        /** @var Recipe $recipe */
        $recipe = factory(Recipe::class)->create()->fresh();

        $uri = '/recipe/' . $recipe->id . '?medium=smartphone';

        $expectedJson = [
            'slug' => $recipe->slug,
            'title' => $recipe->title,
            'boxType' => $recipe->box_type,
        ];

        $this->json('GET', $uri)->seeJsonEquals($expectedJson);
    }
}
