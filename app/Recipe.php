<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/9/17
 */

namespace App;

use App\Acme\Recipe\UpdateOrStoreRecipe;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public static function updateOrStore(array $data)
    {
        /** @var UpdateOrStoreRecipe $updateOrCreateRecipe */
        $updateOrCreateRecipe = app()->make(UpdateOrStoreRecipe::class);

        $updateOrCreateRecipe->handle($data);
    }
}