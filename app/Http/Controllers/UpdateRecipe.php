<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateRecipe extends Controller
{
    public function __invoke($id, Request $request)
    {
        app('db')->table('recipes')->where('id', $id)->update($request->all());

        return $this->respondWithSuccess();
    }
}
