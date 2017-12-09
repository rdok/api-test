<?php

namespace App\Http\Controllers;

class FetchRecipe extends Controller
{
    public function __invoke($id)
    {
        $recipe =  app('db')->table('recipes')->where('id', $id)->first();

        return json_encode($recipe);
    }
}
