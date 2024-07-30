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

    Route::group(['namespace' => 'Orders'], function () {
        Route::get('orders', 'OrderController@index')->name('orders.index');
        Route::post('order/{id}', 'OrderController@show')->name('order.show');
        Route::get('order/{id}', 'OrderController@destroy')->name('order.destroy');
    });

    
    
});

Route::group(['namespace' => 'Main'], function () {

    Route::get('/', 'MainController@index')->name('layout.main');
    
    Route::get('/category', 'MainController@categoriesShow')->name('main.categories.show');
    Route::get('/category/{id}', 'MainController@categoryProductsShow')->name('main.category.products.show');

    Route::get('/product', 'MainController@productsShow')->name('main.products.show');
    Route::get('/product/{id}', 'MainController@productShow')->name('main.product.show');
  
});


Route::group(['namespace' => 'UserOrders'], function () {

    Route::get('/orders', 'UserOrdersController@index')->name('orders.user.index');
    Route::get('/order/{id}', 'UserOrdersController@show')->name('order.user.show');
    
});

Route::group(['namespace' => 'Cart', 'prefix' => 'cart'], function () {

    Route::group(['middleware' => 'basket-is-not-empty'], function () {
        Route::get('/index', 'CartController@index')->name('cart.index');
        Route::get('/confirm/form', 'CartController@confirmForm')->name('confirm.form');
        Route::post('/confirm/order', 'CartController@confirmOrder')->name('cart.confirm');
    });
    
    Route::post('/add/{id}', 'CartController@addProduct')->name('cart.add');
    Route::post('/remove/{id}', 'CartController@removeProduct')->name('cart.remove');
    
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
