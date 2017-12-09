<?php

/** @var $router \Laravel\Lumen\Routing\Router */

$router->get('recipe[/{id}]', ['uses' => 'FetchRecipe']);
