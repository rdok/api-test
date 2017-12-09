<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateRecipeRequest;
use Illuminate\Http\Request;

class StoreRecipe extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, $rules = StoreOrUpdateRecipeRequest::rules());

        app('db')->table('recipes')->insert($request->all());

        return $this->respondWithSuccess();
    }
}
