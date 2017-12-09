<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/9/17
 */
class StoreOrUpdateRecipeRequest extends Request
{
    public static function rules()
    {
        return [
            'box_type' => 'required|string',
            'title' => 'required|string',
            'short_title' => 'nullable',
            'marketing_description' => 'required|string',
            'calories_kcal' => 'required|integer|min:0',
            'protein_grams' => 'required|integer|min:0',
            'fat_grams' => 'required|integer|min:0',
            'carbs_grams' => 'required|integer|min:0',
            'bulletpoint1' => 'nullable|string',
            'bulletpoint2' => 'nullable|string',
            'bulletpoint3' => 'nullable|string',
            'recipe_diet_type_id' => 'required|string',
            'season' => 'required|string',
            'base' => 'nullable|string',
            'protein_source' => 'required|string',
            'preparation_time_minutes' => 'required|integer|min:0',
            'shelf_life_days' => 'required|integer|min:0',
            'equipment_needed' => 'required|string',
            'origin_country' => 'required|string',
            'recipe_cuisine' => 'required|string',
            'in_your_box' => 'nullable|string',
            'gousto_reference' => 'required|integer|min:0',
        ];
    }
}