<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class PaginateRecipe extends Controller
{
    public function __invoke(Request $request, Factory $factory)
    {
        $cuisine = $request->get('cuisine');

        /** @var Builder $cuisineBuilder */
        $cuisineBuilder = app('db')->table('recipes')
            ->where('recipe_cuisine', $cuisine);

        if (!$cuisine || !$cuisineBuilder->first()) {
            return $this->respondUnprocessableEntity(
                'The cuisine is missing or invalid.'
            );
        }

        $recipe = app('db')->table('recipes')
            ->where('recipe_cuisine', $cuisine)->paginate(10);

        return $this->respond($recipe);
    }
    /**
     * @SWG\Get(
     *     path="/recipe",
     *     @SWG\Response(
     *      response="200",
     *      description="Paginate recipe for a cuisine."
     *     ),
     *     @swg\response(
     *      response="422",
     *      description="the cuisine is missing or invalid."
     *     ),
     *     produces={"application/json"},
     *     tags={"cuisine"},
     *     @swg\parameter(
     *         name="cuisine",
     *         in="query",
     *         description="a valid cuisine.",
     *         required=true,
     *         type="string",
     *     ),
     * )
     */
}
