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
    return 'hello api gateway';
});
//
$router->group([
    'prefix' => 'auth'
], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
});

$router->group([
    'prefix' => 'service',
    'middleware' => 'auth:api'
], function () use ($router) {
    $router->addRoute(['GET', 'POST', 'DELETE', 'PUT'], '{serviceName:.*}', 'GatewayController@handle');
});
