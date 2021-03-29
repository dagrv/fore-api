<?php

use Illuminate\Support\Facades\Route;

// Categories
Route::resource('categories', 'Categories\CategoryController');

// Products
Route::resource('products', 'Products\ProductController');

// Address
Route::resource('addresses', 'Addresses\AddressController');

// Countries
Route::resource('countries', 'Countries\CountryController');

// User Registration
Route::group(['prefix' => 'auth'], function() {
    Route::post('register', 'Auth\RegisterController@action');
    Route::post('login', 'Auth\LoginController@action');
    // ALTERNAT' : Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@action']);
    Route::get('me', 'Auth\MeController@action');
});

// Cart
Route::resource('cart', 'Cart\CartController', [
    'parameters' => [
        'cart' => 'productVariation'
    ]
]);