<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\OredersManegmentController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\ProfilesController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Front\NotifactionController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth','userType','userStatus'], // auth.type:admin,super_dmin
    'prefix'    => 'dashboard',
    'dashboard' => 'dashboard.',
],function(){


    //order
    Route::get('order/pending',[OredersManegmentController::class,'OrderPending'])->name('order.pending');
    Route::get('order/processing',[OredersManegmentController::class,'OrderProcessing'])->name('order.processing');
    Route::get('order/completed',[OredersManegmentController::class,'OrderCompleted'])->name('order.completed');
    Route::get('order/details/{id}',[OredersManegmentController::class,'OrderDetails'])->name('order.details');
    Route::get('status/processing/{id}',[OredersManegmentController::class,'PendingToprocessing'])->name('order.status.processing');
    Route::get('status/completed/{id}',[OredersManegmentController::class,'ProcessingTocompleted'])->name('order.status.completed');
    Route::delete('order/delete/{id}',[OredersManegmentController::class,'destroy'])->name('order.destroy');




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

    Route::get('contact',[ContactController::class,'index'])->name('contact.index');
    Route::get('show/{id}',[ContactController::class,'show'])->name('contact.show');

    Route::delete('contact/{id}',[ContactController::class,'destroy'])->name('contact.destroy');

    Route::get('/settings', [SettingsController::class, 'edit'])
    ->name('settings.edit');
Route::patch('/settings', [SettingsController::class, 'update'])
    ->name('settings.update');

    Route::resource('categories',CategoriesController::class);
    Route::resource('products',ProductsController::class);
    Route::resource('roles',RolesController::class);
    Route::resource('users',UsersController::class);



});
