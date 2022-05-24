<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@product');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['namespace' => 'master'], function () {
        Route::get('product', 'ProductController@index');
        Route::post('product', 'ProductController@store');
        Route::get('list_kategori', 'CategoryController@list_kategori');

        Route::get('kategori', 'CategoryController@index');
        Route::get('kategori_id/{id}', 'CategoryController@show');
        Route::post('kategori', 'CategoryController@store');
        Route::delete('kategori_delete/{id}', 'CategoryController@destroy');
    });
});
