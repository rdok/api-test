<?php

namespace App\Http\Controllers;

class FetchRecipe extends Controller
{
    public function __invoke($id)
    {
        $recipe = app('db')->table('recipes')->where('id', $id)->first();

        if (empty($recipe)) {
            return $this->respondUnprocessableEntity('The id is invalid.');
        }

        return $this->respond($recipe);
    }
}
