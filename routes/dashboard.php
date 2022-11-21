<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\ProfilesController;
use App\Http\Controllers\Front\NotifactionController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth','userType','userStatus'], // auth.type:admin,super_dmin
    'prefix'    => 'dashboard',
    'dashboard' => 'dashboard.',
],function(){

    Route::get('MarkAsRead_all',[NotifactionController::class,'MarkAsRead_all'])->name('MarkAsRead_all');
    Route::get('notifactionred',[NotifactionController::class,'notifactionred'])->name('notifactionred');




    // Route::get('/notifacation',[NotifactionController::class,'index'])->name('notifacations');

    // Route::view('categories/trashed','dashboard/categories/trashed')->name('categories.trashed');
    Route::get('/categories/trashed',[CategoriesController::class,'trash'])->name('categories.trashed');
    Route::put('categories/{id}/restore',[CategoriesController::class,'restore'])->name('categories.restore');
    Route::delete('categories/{id}/forse-delete',[CategoriesController::class,'forsedelete'])->name('categories.forsedelete');

    Route::get('/products/trashed',[ProductsController::class,'trash'])->name('products.trashed');
    Route::put('products/{id}/restore',[ProductsController::class,'restore'])->name('products.restore');
    Route::delete('products/{id}/forse-delete',[ProductsController::class,'forsedelete'])->name('products.forsedelete');


    Route::get('admin/profile',[ProfilesController::class,'edit'])->name('profile.edit');
    Route::put('admin/profile',[ProfilesController::class,'update'])->name('profile.update');

    Route::resource('categories',CategoriesController::class);
    Route::resource('products',ProductsController::class);

});
