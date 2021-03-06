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
use App\Article;
use Illuminate\Database\Eloquent\ModelNotFoundException;

Route::get('/', function () {
    $products = Product::all();
    return view('demo', compact('products'));
});
Route::get('/logout', function() {
    return view('logout');
});
Route::get('/home', 'HomeController@index');
Auth::routes();

Route::group(['prefix' => 'rack'], function (){
    Route::get('/', 'RackController@index');
    Route::get('/create', 'RackController@create');
    Route::post('/store', 'RackController@store');
    Route::get('/index', 'RackController@index');
    Route::get('/{rack}/edit', 'RackController@edit');
    Route::get('/{rack}', 'RackController@show');
    Route::patch('/{id}', 'RackController@update');
    Route::delete('/{rack}', 'RackController@destroy');
});

Route::group(['prefix' => 'article'], function (){
    Route::get('/create', 'ArticleController@create');
    Route::post('/store', 'ArticleController@store');
    Route::get('/index', 'ArticleController@index');
    Route::get('/{id}/edit', 'ArticleController@edit');
    Route::group(['prefix' => '/{article}/products'], function (){
        Route::get('/create', 'ProductController@create');
        Route::post('/store', 'ProductController@store');
        Route::get('/index', 'ProductController@index');
        Route::get('/{product}/edit', 'ProductController@edit');
        Route::get('/{product}', 'ProductController@show');
        Route::patch('/{id}', 'ProductController@update');
        Route::delete('/{product}', 'ProductController@destroy');
    });
    Route::get('/{article}', 'ArticleController@show');
    Route::patch('/{id}', 'ArticleController@update');
    Route::delete('/{id}', 'ArticleController@destroy');
});

Route::post('/statistics/show', 'StatisticController@show');
Route::get('/statistics/show', 'StatisticController@show');