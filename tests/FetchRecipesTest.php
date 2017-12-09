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

    /** @test */
    public function fetch_all_recipes_for_a_specific_cuisine()
    {
        /** @var Recipe $recipes */
        $recipes = factory(Recipe::class, 2)->create([
            'recipe_cuisine' => $cuisine = 'italian'
        ]);

        $uri = '/recipe?cuisine=' . $cuisine;

        $this->json('GET', $uri)
            ->seeJsonContains(array_except($recipes[0]->toArray(), 'id'))
            ->seeJsonContains(array_except($recipes[1]->toArray(), 'id'));
    }
}
