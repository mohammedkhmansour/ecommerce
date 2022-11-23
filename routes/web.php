<?php

use App\Http\Controllers\Front\AccountUserController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\HomePageController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Middleware\UserCheck;
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
Route::get('/account',[AccountUserController::class,'index'])->name('user.account')->middleware(['auth','userStatus']);
Route::put('/acount',[AccountUserController::class,'update'])->name('user.update');

Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('indexhome');
})->middleware(['auth', 'verified',UserCheck::class])->name('dashboard');

Route::post('products/{product}/reviews',[ProductController::class,'reviews'])->name('products.reviews');
Route::get('products',[ProductController::class,'index'])->name('front.products.index');
Route::get('/products/{product:slug}',[ProductController::class,'show'])->name('front.products.show');

Route::get('checkout', [CheckoutController::class, 'create'])->name('checkout');
Route::post('checkout', [CheckoutController::class, 'store']);

Route::resource('cart', CartController::class);

require __DIR__.'/auth.php';

require __DIR__.'/dashboard.php';
