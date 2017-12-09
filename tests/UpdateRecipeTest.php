<?php

use App\Recipe;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/9/17
 */
class UpdateRecipeTest extends TestCase
{
    /** @test */
    public function update_a_recipe()
    {
        $recipe = factory(Recipe::class)->create();

        $newRecipe = factory(Recipe::class)->make()->toArray();

        $uri = '/recipe/' . $recipe->id;

        $this->missingFromDatabase('recipes', $newRecipe);

        $this->json('PATCH', $uri, $newRecipe)
            ->seeJsonContains(['message' => 'Request processed successfully.']);

        $this->seeInDatabase('recipes', $newRecipe);
    }
}