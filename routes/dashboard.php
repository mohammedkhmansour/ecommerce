<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth',
    'prefix'    => 'dashboard',
    'dashboard' => 'dashboard.',
],function(){

    Route::view('categories/trashed','dashboard/categories/trashed')->name('categories.trashed');
    Route::resource('categories',CategoriesController::class);
});
