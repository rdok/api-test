<?php

use App\Recipe;
use Carbon\Carbon;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/9/17
 */
class StoreRecipeTest extends TestCase
{
    /** @test */
    public function store_a_recipe()
    {
        $recipe = factory(Recipe::class)->make([
            'created_at' => $datetime = Carbon::now()->toDateTimeString(),
            'updated_at' => $datetime,
        ])->toArray();

        $this->json('POST', '/recipe', $recipe)
            ->seeJsonContains(['message' => 'Request processed successfully.']);

        $this->seeInDatabase('recipes', $recipe);
    }

    /** @test */
    public function throw_error_when_data_are_invalid()
    {
        $uri = '/recipe';

        $this->json('POST', $uri, [])
            ->seeJsonContains(['message' => 'The given data was invalid.']);
    }
}