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



$router->get('/event', function () {
    $user = new \App\Models\User();
    event(new \App\Events\UserWasBanned($user));

});

// авторизация
$router->group(['prefix' => 'v1', 'middleware' => 'cors'], function () use ($router) {
    $router->post('/auth/login', 'AuthController@postLogin');
    $router->post('/auth/login/create', 'AuthController@createUser');
});


$router->group(['prefix' => 'v1', 'middleware' => 'cors', 'namespace' => 'Api\v1'], function () use ($router) {
    
    // роуты для постов в публичной части
    $router->get('posts', [
        'as' => 'posts', 'uses' => 'PostController@index'
    ]);
    $router->get('posts/{id}', [
        'as' => 'post', 'uses' => 'PostController@show'
    ]);
    // TO DO: придумать более красивый способ фильтрации
    $router->get('posts/filter/{id}', [
        'as' => 'post', 'uses' => 'PostController@byTag'
    ]);

    // роуты для постов в административной части
    $router->group(['prefix' => 'admin', 'middleware' => 'auth:api'],
        function () use ($router) {
            $router->post('posts/new', [
                'as' => 'postCreate', 'uses' => 'PostController@store'
            ]);
            $router->post('posts/edit/{id}', [
                'as' => 'postUpdate', 'uses' => 'PostController@update'
            ]);
        }
    );

    // роуты для получения списка тегов в публичной части
    $router->get('tags', [
        'as' => 'tags', 'uses' => 'TagController@index'
    ]);
    $router->get('tags/{id}', [
        'as' => 'tag', 'uses' => 'TagController@show'
    ]);
});