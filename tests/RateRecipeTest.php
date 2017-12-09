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

        $uri = '/rate/' . $recipe->id . '/' . $value;

        $this->json('POST', $uri)
            ->seeJsonContains(['message' => 'Request processed successfully.']);

        $this->seeInDatabase('ratings', $expectedData);
    }

    /** @test */
    public function error_when_the_recipe_id_is_invalid()
    {
        $uri = '/rate/invalid/1';

        $this->json('POST', $uri)
            ->seeJsonContains([
                'message' => 'The selected recipe id is invalid.'
            ]);
    }

    /** @test */
    public function error_when_the_rating_value_is_invalid()
    {
        $recipe = factory(Recipe::class)->create();

        $uri = '/rate/' . $recipe->id . '/invalid';

        $this->json('POST', $uri)
            ->seeJsonContains(['message' => 'The selected value is invalid.']);
    }
}