<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginateRecipeRequest;
use Illuminate\Http\Request;

class PaginateRecipe extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, PaginateRecipeRequest::rules());

        $cuisine = $request->get('cuisine');

        $recipe = app('db')->table('recipes')
            ->where('recipe_cuisine', $cuisine)->paginate(10);

        return $this->respond($recipe);
    }
}
