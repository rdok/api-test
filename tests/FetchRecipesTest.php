<?php

use App\Recipe;
use Laravel\Lumen\Testing\DatabaseMigrations;

class FetchRecipesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function fetch_a_recipe_by_id()
    {
        /** @var Recipe $recipe */
        $recipe = factory(Recipe::class)->create()->fresh();

        $uri = '/recipe/' . $recipe->id;

        $expectedJson = array_except($recipe->toArray(), 'id');

        $this->json('GET', $uri)->seeJson($expectedJson);
    }
}
