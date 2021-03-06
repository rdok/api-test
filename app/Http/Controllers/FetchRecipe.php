<?php

namespace App\Http\Controllers;

use App\Acme\Recipe\RecipeTransformer;
use Illuminate\Http\Request;

class FetchRecipe extends Controller
{
    private $recipeTransformer;

    public function __construct(RecipeTransformer $recipeTransformer)
    {
        $this->recipeTransformer = $recipeTransformer;
    }
    public function __invoke($id, Request $request)
    {
        $recipe = app('db')->table('recipes')->where('id', $id)->first();

        if (empty($recipe)) {
            return $this->respondUnprocessableEntity('The id is invalid.');
        }

        if ('smartphone' == $request->get('medium')) {
            $recipe = $this->recipeTransformer->transform($recipe);
        }

        return $this->respond($recipe);
    }
    /**
     * @SWG\Get(
     *     path="/recipe/{recipeId}",
     *     summary="Find recipe by ID",
     *     description="Returns a single recipe",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         description="ID of recipe to return",
     *         in="path",
     *         name="recipeId",
     *         required=true,
     *         type="integer",
     *         format="int64"
     *     ),
     *     @SWG\Response(
     *      response="200",
     *      description="successful operation"
     *     ),
     *     @swg\response(
     *      response="422",
     *      description="the id is invalid."
     *     ),
     *     produces={"application/json"},
     * )
     */
}
