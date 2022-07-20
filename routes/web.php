<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FoodCategoriesController;
use App\Http\Controllers\Seller\SellerFoodsController;
use App\Http\Controllers\Seller\SellerOrdersController;
use App\Http\Controllers\Seller\SellerProfileController;
use App\Http\Controllers\Admin\RestaurantCategoriesController;

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

Route::get('/', function () {

    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    'not_user',
    config('jetstream.auth_session'),
    'verified'
])->prefix('dashboard')->group(function () {

    // Common routes between users:

    Route::get('/', function () {

        return view('dashboard');
    })->name('dashboard');

    //----------------------------------------------------------

    // Admin routes:

    Route::middleware(['can:is_admin'])->group(function () {

        Route::resource('/food_cat', FoodCategoriesController::class);
        Route::resource('/restaurant_cat', RestaurantCategoriesController::class);
        Route::resource('/coupon', CouponController::class);
    });

    //---------------------------------------------------------

    // seller(Restaurant) routes:

    Route::middleware(['can:is_seller'])->group(function () {

        Route::resource('/restaurant_profile', SellerProfileController::class);

        Route::middleware(['is_seller_compelited_profile'])->group(function () {

            Route::resource('/orders', SellerOrdersController::class);
            Route::resource('/foods', SellerFoodsController::class);
        });
    });
});
