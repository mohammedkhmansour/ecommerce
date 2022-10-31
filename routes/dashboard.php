<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth',
    'prefix'    => 'dashboard',
    'dashboard' => 'dashboard.',
],function(){

    // Route::view('categories/trashed','dashboard/categories/trashed')->name('categories.trashed');
    Route::get('/categories/trashed',[CategoriesController::class,'trash'])->name('categories.trashed');
    Route::put('categories/{id}/restore',[CategoriesController::class,'restore'])->name('categories.restore');
    Route::delete('categories/{id}/forse-delete',[CategoriesController::class,'forsedelete'])->name('categories.forsedelete');

    Route::resource('categories',CategoriesController::class);

});
