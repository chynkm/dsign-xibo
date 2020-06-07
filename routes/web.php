<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('category', ['as' => 'category', 'uses' => 'HomeController@category']);
Route::get('image', ['as' => 'image', 'uses' => 'HomeController@image']);
Route::get('videos', ['as' => 'video', 'uses' => 'HomeController@video']);
Route::get('productGroup', ['as' => 'productGroup', 'uses' => 'HomeController@productGroup']);
Route::get('product', ['as' => 'product', 'uses' => 'HomeController@product']);
