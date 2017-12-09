<?php

use App\Recipe;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/9/17
 */
class PaginateRecipeTest extends TestCase
{
    /** @test */
    public function paginate_recipes_for_a_specific_cuisine()
    {
        /** @var Recipe $recipes */
        $recipes = factory(Recipe::class, 2)->create([
            'recipe_cuisine' => $cuisine = 'italian'
        ]);

        $uri = '/recipe?' . http_build_query(['cuisine' => $cuisine]);

        $this->json('GET', $uri)
            ->seeJsonContains(array_except($recipes[0]->toArray(), 'id'))
            ->seeJsonContains(array_except($recipes[1]->toArray(), 'id'));
    }

    /** @test */
    public function throw_error_when_cuisine_is_missing()
    {
        $this->json('GET', '/recipe')->seeJsonContains([
            'cuisine' => ['The cuisine field is required.']
        ]);
    }

    /** @test */
    public function throw_error_when_cuisine_is_invalid()
    {
        $uri = '/recipe?' . http_build_query(['cuisine' => 'invalid']);

        $this->json('GET', $uri)->seeJsonContains([
            'cuisine' => ['The selected cuisine is invalid.']
        ]);
    }
}