<?php

use App\Recipe;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/9/17
 */
class RateRecipeTest extends TestCase
{
    /** @test */
    public function rate_an_existing_recipe_between_one_and_five()
    {
        $recipe = factory(Recipe::class)->create();

        $this->missingFromDatabase('ratings', $expectedData = [
            'recipe_id' => $recipe->id,
            'value' => $value = 1
        ]);

        $uri = '/rating/' . $recipe->id . '/' . $value;

        $this->json('POST', $uri)
            ->seeJsonContains(['message' => 'Request processed successfully.']);

        $this->seeInDatabase('ratings', $expectedData);
    }
}