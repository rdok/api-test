<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class StoreRecipe extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            Recipe::updateOrStore($request->all());
        } catch (\Exception $e) {
            return $this->respondWithError($e->getMessage());
        }

        return $this->respondWithSuccess();
    }

    /**
     * @SWG\Post(
     *  path="/recipe",
     *  summary="Store a new recipe.",
     *  produces={"application/json"},
     *  @SWG\Parameter(in="query", name="box_type", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="title", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="short_title", type="string"),
     *  @SWG\Parameter(in="query", name="marketing_description", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="calories_kcal", required=true,type="integer"),
     *  @SWG\Parameter(in="query", name="protein_grams", required=true,type="integer"),
     *  @SWG\Parameter(in="query", name="fat_grams", required=true,type="integer"),
     *  @SWG\Parameter(in="query", name="carbs_grams", required=true,type="integer"),
     *  @SWG\Parameter(in="query", name="bulletpoint1", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="bulletpoint2", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="bulletpoint3", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="recipe_diet_type_id", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="season", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="base", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="protein_source", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="preparation_time_minutes", required=true,type="integer"),
     *  @SWG\Parameter(in="query", name="shelf_life_days", required=true,type="integer"),
     *  @SWG\Parameter(in="query", name="equipment_needed", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="origin_country", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="recipe_cuisine", required=true,type="string"),
     *  @SWG\Parameter(in="query", name="in_your_box", type="string"),
     *  @SWG\Parameter(in="query", name="gousto_reference", required=true,type="string"),
     *  @SWG\Response(response="200", description="successful operation"),
     *  @swg\response(response="422", description="Invalid data."),
     *  produces={"application/json"},
     * )
     */
}
