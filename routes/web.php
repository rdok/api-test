<?php

/** @var $router \Laravel\Lumen\Routing\Router */

$router->get('recipe[/{id}]', ['uses' => 'FetchRecipe']);

$router->patch('recipe/{id}', ['uses' => 'UpdateRecipe']);

$router->post('recipe', ['uses' => 'StoreRecipe']);
