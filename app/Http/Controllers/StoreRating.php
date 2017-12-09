<?php

namespace App\Http\Controllers;

class StoreRating extends Controller
{
    public function __invoke($recipeId, $ratingValue)
    {
        app('db')->table('ratings')
            ->insert(['recipe_id' => $recipeId, 'value' => $ratingValue]);

        return $this->respondWithSuccess();
    }
}
