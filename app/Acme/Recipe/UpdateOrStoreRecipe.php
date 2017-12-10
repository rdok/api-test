<?php

namespace App\Acme\Recipe;

use App\Http\Requests\UpdateOrStoreRecipeRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 12/10/17
 */
class UpdateOrStoreRecipe
{
    use ProvidesConvenienceMethods;

    public function handle(array $data)
    {
        Validator::validate(
            $data, $rules = UpdateOrStoreRecipeRequest::rules()
        );

        $data = array_only($data, array_keys($rules));

        $data['slug'] = Str::slug($data['title']);
        $data['updated_at'] = Carbon::now()->toDateTimeString();

        if (!array_key_exists('id', $data)) {

            $data['created_at'] = $data['updated_at'];

            app('db')->table('recipes')->insert($data);

            return;
        }

        app('db')->table('recipes')->where('id', $data['id'])->update($data);
    }
}