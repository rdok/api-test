<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/9/17
 */
class PaginateRecipeRequest extends Request
{
    public static function rules()
    {
        return [
            'cuisine' => 'required|exists:recipes,recipe_cuisine'
        ];
    }
}