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
    // return $router->app->version();
    echo "welcome in lumen";
});
$router->group(['prefix' => 'api'],function ($router){
   $router->get('demo','demo@showdemo');
   $router->post('demo','demo@createdemo');
   $router->put('demo/{id}','demo@updatedemo');
   $router->get('demo/{id}','demo@deldemo');
});
$router->post('/log','ExampleController@postLogin');
$router->get('/pro/{state}/{city}/{pname}/','detailController@detail_property');
// API route group
// $router->group(['prefix' => 'api','middleware'=>'auth'], function () use ($router) {
//    // Matches "/api/register
//    $router->post('register', 'AuthController@register');
//    $router->post('login', 'AuthController@login');
// });
$router->get('/products', 'prac@index');
$router->post('/products', 'prac@create');
$router->post('/products/{id}', 'prac@del');
// $router->post('/products', 'prac@update');
// $router->post('/products/{id}', 'prac@create');