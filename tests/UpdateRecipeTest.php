<?php

use App\Http\Requests\StoreOrUpdateRecipeRequest;
use App\Recipe;
use Illuminate\Support\Str;

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

        $expectedData = array_only(
            $newRecipe, array_keys(StoreOrUpdateRecipeRequest::rules())
        );

        $expectedData['slug'] = Str::slug($newRecipe['title']);

        $this->seeInDatabase('recipes', $expectedData);
    }

    /** @test */
    public function throw_error_when_id_is_invalid()
    {
        $uri = '/recipe/invalid-id';

        $newRecipe = factory(Recipe::class)->make()->toArray();

        $this->json('PATCH', $uri, $newRecipe)
            ->seeJsonContains(['message' => 'The id is invalid.']);
    }
}