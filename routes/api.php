<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

// -- Categories -- 
Route::resource('categories', 'Categories\CategoryController');

// -- Products -- 
Route::resource('products', 'Products\ProductController');
