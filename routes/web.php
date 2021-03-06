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

Route::get('/products', 'ProductController@index');



Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('nav', 'NavigationController@index')->name('nav');

//Cart routes
Route::get('add-to-cart/{id}/{count}', 'CartController@addToCart')->name('product.addToCart');
Route::get('update-cart/{id}/{count}', 'CartController@updateCart')->name('product.updateCart');
Route::get('remove-from-cart/{id}/{count}', 'CartController@removeFromCart')->name('product.removeFromCart');
Route::get('delete-item/{id}', 'CartController@deleteItem')->name('product.delete');
Route::get('cart-reset', 'CartController@cartReset');
Route::get('get-cart', 'CartController@getCart');
Route::get('product/api', 'ProductApiController@index');

Route::get('/{category}/{subCategory}', 'ProductController@index');

Route::get('/{category}', 'CategoryController@index')->name('category');

Route::post('image/deleteOldProductImage', 'ImageController@deleteOldProductImage');
Route::post('image/deleteOldCategoryImage', 'ImageController@deleteOldCategoryImage');
Route::post('image/deleteOldSubCategoryImage', 'ImageController@deleteOldSubCategoryImage');

Auth::routes();
