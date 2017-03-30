<?php

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

use App\Product;
use App\Rack;
use Illuminate\Database\Eloquent\ModelNotFoundException;

Route::get('/rack', 'RackController@index');
Route::get('/products/{product}', 'ProductController@show');
Route::post('/rack/update', 'RackController@update');
Route::post('/rack/destroy', 'RackController@destroy');
Route::get('/rack/{rack}', 'RackController@show');
Auth::routes();
Route::get('/article/create', 'ArticleController@create');
Route::post('/article/store', 'ArticleController@store');
Route::get('/home', 'HomeController@index');
Route::get('/article/{article}', 'ArticleController@show');

