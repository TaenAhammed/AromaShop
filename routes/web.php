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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'PagesController@home');
Route::get('/login', 'PagesController@login');
Route::get('/register', 'PagesController@register');
Route::get('/contact', 'PagesController@contact');


// Shop routes
Route::get('/category', 'PagesController@category');
Route::get('/product', 'PagesController@product');
Route::get('/checkout', 'PagesController@checkout');
Route::get('/confirmation', 'PagesController@confirmation');
Route::get('/cart', 'PagesController@cart');
Route::get('/tracking', 'PagesController@tracking');

// demo routes
Route::get('/admin/dashboard', function () {
    return view('admin.pages.dashboard');
});

// Blog routes
Route::get('/blog', 'PagesController@blog');
Route::get('/post', 'PagesController@post');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/create', 'ProductController@create');
Route::post('/products', 'ProductController@store');
