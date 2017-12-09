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
}
