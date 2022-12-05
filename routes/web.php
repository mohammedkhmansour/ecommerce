<?php

use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Middleware\UserCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\HomePageController;
use App\Http\Controllers\Front\ShopPageController;
use App\Http\Controllers\Front\FavouriteController;
use App\Http\Controllers\Front\AccountUserController;
use App\Http\Controllers\ImagesController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('indexhome');
})->middleware(['auth', 'verified',UserCheck::class])->name('dashboard');

Route::view('about','front.about');

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::get('/', [HomePageController::class,'index'])->name('home');
Route::get('/account',[AccountUserController::class,'index'])->name('user.account')->middleware(['auth','userStatus']);
Route::put('/acount',[AccountUserController::class,'update'])->name('user.update');

Route::get('shop',[ShopPageController::class,'index'])->name('shop');
Route::get('shop/{id}',[ShopPageController::class,'filterCategory'])->name('filterCategory');

Route::post('products/{product}/reviews',[ProductController::class,'reviews'])->name('products.reviews');

Route::get('products',[ProductController::class,'index'])->name('front.products.index');
Route::get('/products/{product:slug}',[ProductController::class,'show'])->name('front.products.show');

Route::get('contact',[ContactController::class,'homeContact'])->name('homeContact');
Route::post('contact',[ContactController::class,'store'])->name('contact.store');

});




Route::get('favourites',[FavouriteController::class,'index'])->name('favourites.index')->middleware('auth');
Route::post('favourites',[FavouriteController::class,'store'])->name('favourites.store')->middleware('auth');
Route::delete('favourites/{id}',[FavouriteController::class,'destroy'])->name('favourites.destroy')->middleware('auth');

// images/300x200/products/image.png
Route::get('images/{disk}/{width}x{height}/{image}', [ImagesController::class, 'index'])
    ->name('images')
    ->where('image', '.*');


Route::get('checkout', [CheckoutController::class, 'create'])->name('checkout');
Route::post('checkout', [CheckoutController::class, 'store']);

Route::resource('cart', CartController::class);

require __DIR__.'/auth.php';

require __DIR__.'/dashboard.php';
