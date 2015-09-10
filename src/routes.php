<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/public-demo/v1/' , 'Shivergard\ApiDemo\PublicApiDemoController@demo');
Route::get('/public-demo/v1/params' , 'Shivergard\ApiDemo\PublicApiDemoController@getParams');
Route::get('/public-demo/v1/request' , 'Shivergard\ApiDemo\PublicApiDemoController@postRequest');
Route::get('/api-demo/init' , 'Shivergard\ApiDemo\ApiDemoController@init');
Route::resource('/api-demo/methods' , 'Shivergard\ApiDemo\ApiDemoController');

//complicated create
Route::resource('/api-demo/params/{method}/crud' , 'Shivergard\ApiDemo\ParamsController');
Route::get('/api-demo/params/{method}/crud/create' , 'Shivergard\ApiDemo\ParamsController@create');
Route::get('/api-demo/params/{method}/crud' , 'Shivergard\ApiDemo\ParamsController@index');


Route::get('/api-demo/{method}', function($method)
{
    $controller = new Shivergard\ApiDemo\ApiDemoController;
    if (method_exists ( $controller , $method ))
        return $controller->{$method}();
    else
        return \Redirect::to('/');
});

Route::get('/api-demo/{method}/{param}', function($method , $param)
{
    $controller = new Shivergard\ApiDemo\ApiDemoController;
    if (method_exists ( $controller , $method ))
        return $controller->{$method}($param);
    else
        return \Redirect::to('/');
});
