<?php

use App\Http\Controllers\Front\HomePageController;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomePageController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('indexhome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('products',[ProductController::class,'index'])->name('front.products.index');
Route::get('/products/{product:slug}',[ProductController::class,'show'])->name('front.products.show');


require __DIR__.'/auth.php';

require __DIR__.'/dashboard.php';
