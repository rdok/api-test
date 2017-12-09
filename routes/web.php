<?php

/** @var $router \Laravel\Lumen\Routing\Router */

$router->get('recipe', ['uses' => 'PaginateRecipe']);

$router->get('recipe/{id}', ['uses' => 'FetchRecipe']);
$router->patch('recipe/{id}', ['uses' => 'UpdateRecipe']);
$router->post('recipe', ['uses' => 'StoreRecipe']);

$router->post('rate/{recipe_id}/{value}', ['uses' => 'RateRecipe']);
