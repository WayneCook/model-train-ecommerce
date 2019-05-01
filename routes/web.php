<?php
use App\Category;
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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('nav', 'NavigationController@index')->name('nav');

//Cart routes
Route::get('add-to-cart/{id}/{count}', 'CartController@addToCart')->name('product.addToCart');
Route::get('remove-from-cart/{id}/{count}', 'CartController@removeFromCart')->name('product.removeFromCart');
Route::get('cart-reset', 'CartController@cartReset');
Route::get('get-cart', 'CartController@getCart');

// Route::get('/{category}/{subCategory}', 'subCategoryController@index');

Route::get('/{category}', 'CategoryController@index')->name('category');

Route::post('image/deleteOldProductImage', 'ImageController@deleteOldProductImage');
// Route::get('/{category}/{subCategory}', 'CategoryController@show')->name('search');

Auth::routes();
