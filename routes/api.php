<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

// -- Categories -- 
Route::resource('categories', 'Categories\CategoryController');

// -- Products -- 
Route::resource('products', 'Products\ProductController');

// -- User Register -- 
Route::group(['prefix' => 'auth'], function() {
    Route::post('register', 'Auth\RegisterController@action');
    Route::post('login', 'Auth\LoginController@action');
    Route::get('me', 'Auth\MeController@action');
});

// -- Cart --
Route::resource('cart', 'Cart\CartController');