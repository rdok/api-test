<?php

namespace App\Http\Controllers;

class RateRecipe extends Controller
{
    public function __invoke($recipeId, $ratingValue)
    {
        $recipeIdIsValid = !empty(
        app('db')->table('recipes')->where('id', $recipeId)->first()
        );

        if (!$recipeIdIsValid) {
            return $this->respondUnprocessableEntity(
                'The selected recipe id is invalid.'
            );
        }

        $valueIsValid = is_numeric($ratingValue) &&
            ($ratingValue >= 0 && $ratingValue <= 5);

        if (!$valueIsValid) {
            return $this->respondUnprocessableEntity(
                'The selected value is invalid.'
            );
        }


        app('db')->table('ratings')
            ->insert(['recipe_id' => $recipeId, 'value' => $ratingValue]);

        return $this->respondWithSuccess();
    }
    /**
     * @SWG\Post(
     *  path="/rate/{recipeId}/{rateValue}",
     *  summary="Rate a recipe.",
     *  produces={"application/json"},
     *   @SWG\Parameter(
     *    description="ID of recipe to rate.",
     *    in="path",
     *    name="recipeId",
     *    required=true,
     *    type="integer",
     *    format="int64"
     *   ),
     *   @SWG\Parameter(
     *    description="The value of rating.",
     *    in="path",
     *    name="rateValue",
     *    required=true,
     *    type="integer",
     *    minimum="1",
     *    maximum="5",
     *    format="int64"
     *   ),
     *  @SWG\Response(response="200", description="successful operation"),
     *  @swg\response(response="422", description="Invalid data."),
     *  produces={"application/json"},
     * )
     */
}
