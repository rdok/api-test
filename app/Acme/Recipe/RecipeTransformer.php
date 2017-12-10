<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */

namespace App\Acme\Recipe;


class RecipeTransformer
{
    public function transform(\stdClass $recipe)
    {
        return [
            'slug' => $recipe->slug,
            'title' => $recipe->title,
            'boxType' => $recipe->box_type,
        ];
    }
}