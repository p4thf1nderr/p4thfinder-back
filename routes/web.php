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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/auth/login', 'AuthController@postLogin');
$router->post('/auth/login/create', 'AuthController@createUser');

$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function () use ($router) {
    $router->get('posts', [
        'as' => 'posts', 'uses' => 'PostController@index'
    ]);
    $router->get('posts/{id}', [
        'as' => 'post', 'uses' => 'PostController@show'
    ]);
    $router->post('posts/new', [
        'as' => 'postCreate', 'uses' => 'PostController@store'
    ]);
    $router->post('posts/edit/{id}', [
        'as' => 'postUpdate', 'uses' => 'PostController@update'
    ]);

    /* $app->get('user/{id}', function ($id) {
        return 'User '.$id;
    }); */
});