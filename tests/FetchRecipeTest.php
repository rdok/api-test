<?php

use App\Recipe;

class FetchRecipeTest extends TestCase
{
    /** @test */
    public function fetch_a_recipe_by_id()
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
}
