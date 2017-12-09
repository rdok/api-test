<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreRecipe extends Controller
{
    public function __invoke(Request $request)
    {
        app('db')->table('recipes')->insert($request->all());

        return $this->respondWithSuccess();
    }
}
