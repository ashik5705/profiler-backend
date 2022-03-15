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
    return response()->json('success');
});

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

$router->post('/login','AdminController@login');

$router->post('/create','Admin\FileController@create');

//User Routes
$router->get('/users','Admin\UserController@getAllUsers');
$router->post('/user/create','Admin\UserController@createUser');
$router->get('/user/edit/{id}','Admin\UserController@editUser');
$router->post('/user/update','Admin\UserController@updateUser');
$router->delete('/user/delete/{id}','Admin\UserController@deleteUser');

//Tag Routes
$router->get('/tags','Admin\TagController@getAllTags');
$router->post('/tag/create','Admin\TagController@createTag');
//$router->get('/tag/edit/{id}','Admin\TagController@editTag');
//$router->post('/tag/update','Admin\TagController@updateTag');
$router->delete('/tag/delete/{id}','Admin\TagController@deleteTag');

// Route::group([

//     'prefix' => 'api'

// ], function ($router) {
//     Route::post('login', 'AdminController@login');
//     Route::post('logout', 'AdminController@logout');
//     Route::post('refresh', 'AdminController@refresh');
//     Route::post('user-profile', 'AdminController@me');

// });
