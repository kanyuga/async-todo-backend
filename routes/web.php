<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/**@var \Laravel\Lumen\Routing\Router $router */

$cors_headers = function () {
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PATCH, DELETE");
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Max-Age: 100000000');
};

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->options('todos/{id}', $cors_headers);
$router->options('todos', $cors_headers);

$router->get('todos', 'TodoController@fetch');
$router->get('todos/{id}', 'TodoController@get');
$router->post('todos', 'TodoController@add');
$router->patch('todos/{id}', 'TodoController@edit');
$router->delete('todos/{id}', 'TodoController@delete');

