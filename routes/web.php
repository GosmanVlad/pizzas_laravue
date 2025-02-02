<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/roles', 'PermissionController@Permission');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', 'HomeController@logout');


// Route::get('home', 'PizzasController@home')->name('home');
// Route::get('/', 'PizzasController@home');

Route::get('/pizzas/delete/{id}', 'PizzasController@destroy');

Route::get('/pizzas/edit/{id}', 'PizzasController@edit');
// Route::post('/pizzas/editSubmit/{id}', 'PizzasController@update');

Route::get('/pizzas/add', 'PizzasController@add');

Route::group(['middleware' => 'api'], function () {
    Route::Resource('pizzasData', 'PizzasController');
});

Route::get('/pizzas/details/{id}', 'PizzasController@details');


Route::get('/pizzas/find/{id}', 'PizzasController@find');
Auth::routes();

Route::group(['middleware' => 'web'], function () {
    Route::get('api/documentation', '\L5Swagger\Http\Controllers\SwaggerController@api')->name('l5swagger.api');
});