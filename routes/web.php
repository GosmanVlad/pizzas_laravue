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
Route::get('home', 'PizzasController@home')->name('home');
Route::get('/', 'PizzasController@home');

Route::get('/pizzas/delete/{id}', 'PizzasController@destroy');

Route::get('/pizzas/edit/{id}', 'PizzasController@edit');
Route::post('/pizzas/edit', 'PizzasController@submitEdit');

Route::get('/pizzas/add', 'PizzasController@add');

Route::group(['middleware' => 'api'], function () {
    Route::Resource('pizzasData', 'PizzasController');
});

Route::get('/pizzas/details/{id}', 'PizzasController@details');
