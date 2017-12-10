<?php

use App\Http\Requests\UpdateOrStoreRecipeRequest;
use App\Recipe;
use Carbon\Carbon;
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
            $newRecipe,
            array_keys(UpdateOrStoreRecipeRequest::rules())
        );

        $expectedData['slug'] = Str::slug($newRecipe['title']);
        $expectedData['created_at'] = $recipe->created_at;
        $expectedData['updated_at'] = Carbon::now()->toDateTimeString();

        $this->seeInDatabase('recipes', $expectedData);
    }

    /** @test */
    public function return_error_for_invalid_data()
    {
        $recipe = factory(Recipe::class)->create();

        $invalidRecipe = [];

        $uri = '/recipe/' . $recipe->id;

        $this->json('PATCH', $uri, $invalidRecipe)
            ->seeJsonContains(['message' => 'The given data was invalid.']);
    }
}