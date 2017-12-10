<?php

/** @var $router \Laravel\Lumen\Routing\Router */

/** @SWG\Info(title="API Test", version="1.0.0") */

/** @SWG\Swagger(schemes={"http"}, host="api.test", basePath="/") */

$router->get('/', function () {
    return response()->json(json_decode(file_get_contents(base_path('public/docs'))));
});

$router->get('recipe', ['uses' => 'PaginateRecipe']);

$router->get('recipe/{id}', ['uses' => 'FetchRecipe']);
$router->patch('recipe/{id}', ['uses' => 'UpdateRecipe']);
$router->post('recipe', ['uses' => 'StoreRecipe']);

$router->post('rate/{recipe_id}/{value}', ['uses' => 'RateRecipe']);
