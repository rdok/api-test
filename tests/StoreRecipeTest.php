<?php

use App\Recipe;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/9/17
 */
class StoreRecipeTest extends TestCase
{
    /** @test */
    public function store_a_recipe()
    {
        $recipe = factory(Recipe::class)->make()->toArray();

        $this->json('POST', '/recipe', $recipe)
            ->seeJsonContains(['message' => 'Request processed successfully.']);

        $this->seeInDatabase('recipes', $recipe);
    }
}