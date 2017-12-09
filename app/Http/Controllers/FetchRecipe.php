<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FetchRecipe extends Controller
{
    public function __invoke($id = null, Request $request)
    {
        if (empty($id)) {

            $cuisine = $request->get('cuisine');

            $recipe = app('db')->table('recipes')
                ->where('recipe_cuisine', $cuisine)->paginate(10);

            return $this->respond($recipe);
        }

        $recipe = app('db')->table('recipes')->where('id', $id)->first();

        return $this->respond($recipe);
    }

    private function respond($recipe)
    {
        return json_encode($recipe);
    }
}
