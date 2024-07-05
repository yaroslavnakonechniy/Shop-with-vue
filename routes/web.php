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

Auth::routes();

Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function () {

    Route::group(['namespace' => 'Main'], function () {
        Route::get('/admin', 'MainController@index')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Category'], function () {
        Route::resource('categories', 'CategoryController');
    });

    Route::group(['namespace' => 'Product'], function () {
        Route::resource('products', 'ProductController');
    });

    
    
});

Route::group(['namespace' => 'Main'], function () {

    Route::get('/', 'MainController@index')->name('layout.main');
    
    Route::get('/category', 'MainController@categoriesShow')->name('main.categories.show');
    Route::get('/category/{id}', 'MainController@categoryProductsShow')->name('main.category.products.show');

    Route::get('/product', 'MainController@productsShow')->name('main.products.show');
    Route::get('/product/{id}', 'MainController@productShow')->name('main.product.show');
  
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
