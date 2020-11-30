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

$router->group([
    'prefix'    => '/xml',
], function() use ($router) {
    $router->post('/', 'xmlController@create');
    $router->post('/node', 'xmlController@createNode');
    $router->post('/delete', 'xmlController@delete');
});
