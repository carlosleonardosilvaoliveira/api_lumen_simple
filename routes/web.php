<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('estudo', ['uses' => 'EstudoController@showAllEstudo']);

    $router->get('estudo/{id}', ['uses' => 'EstudoController@showOneEstudo']);

    $router->post('estudo', ['uses' => 'EstudoController@create']);

    $router->delete('estudo/{id}', ['uses' => 'EstudoController@delete']);

    $router->put('estudo/{id}', ['uses' => 'EstudoController@update']);
});
