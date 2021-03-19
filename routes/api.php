<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Category::parents()->ordered()->get();

    dd($categories);
});
