<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateRecipeRequest;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UpdateRecipe extends Controller
{
    public function __invoke($id, Request $request)
    {
        /** @var Builder $recipeBuilder */
        $recipeBuilder = app('db')->table('recipes')->where('id', $id);

        if (empty($recipeBuilder->first())) {
            return $this->respondUnprocessableEntity('The id is invalid.');
        }

        $this->validate($request, $rules = StoreOrUpdateRecipeRequest::rules());

        $data = $request->only(array_keys($rules));

        $data['slug'] = Str::slug($data['title']);

        $recipeBuilder->update($data);

        return $this->respondWithSuccess();
    }
}
