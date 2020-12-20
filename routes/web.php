<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->post('jobs', 'JobController@store');

    $router->put('jobs/{id}', 'JobController@update');

    $router->delete('jobs/{id}', 'JobController@destroy');

    $router->get('users', 'UserController@index');

    $router->get('users/profile', 'UserController@profile');

    $router->post('users/login', 'UserController@login');

    $router->post('users', 'UserController@store');

    $router->put('users/change-my-apitoken', 'UserController@changeMyAPIToken');

    $router->put('users/change-user-apitoken/{id}', 'UserController@changeUserAPIToken');

    $router->put('users/{id}', 'UserController@update');
});

$router->get('crypt/{random32chars}', function ($random32chars) {
    return response()->json(['body' => Crypt::encrypt($random32chars)]);
});

$router->get('jobs', 'JobController@index');

$router->get('jobs/{id}', 'JobController@show');
