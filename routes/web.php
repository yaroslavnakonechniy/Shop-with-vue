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

Route::get('/', function () {
    return view('layouts.main');
});

Route::group(['namespace' => 'Admin'], function () {
    
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/admin', 'MainController@index')->name('main.index');
    });

    Route::group(['namespace' => 'Category'], function () {
        //Route::get('/index', 'CategoryController@index')->name('category.index');
        Route::resource('categories', 'CategoryController');
    });

    Route::group(['namespace' => 'Product'], function () {
        
        Route::resource('products', 'ProductController');
    });

    
    
});
