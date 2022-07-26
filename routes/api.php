<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\Users\api\PayController;
use App\Http\Controllers\Users\api\CartController;
use App\Http\Controllers\users\api\AddressController;
use App\Http\Controllers\users\api\CommentsController;
use App\Http\Controllers\users\api\UserViewRestaurants;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

// Route::middleware('can:is_guest')->group(function () {
// });


Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthApiController::class, 'logout']);

    // Route::patch('/profile', [AuthApiController::class, 'updatePersonalInfo']);

    Route::get('/addresses', [AddressController::class, 'getUserAddresses']);
    Route::post('/addresses/{address_id}', [AddressController::class, 'setCurrentAddress'])->whereNumber('id');
    Route::post('/addresses', [AddressController::class, 'createAddress']);

    Route::get('/restaurants/{restaurant_id}', [UserViewRestaurants::class, 'getRestaurantByID']);
    Route::get('/restaurants', [UserViewRestaurants::class, 'restaurantSearch']);
    Route::post('/restaurants/{restaurant_id}/foods', [UserViewRestaurants::class, 'restaurantFoods']);

    Route::get('/carts', [CartController::class, 'index']);
    Route::get('/carts/{cart_id}', [CartController::class, 'show']);
    Route::post('/carts/add', [CartController::class, 'store']);
    Route::post('/carts/{cart_id}/pay', [PayController::class, 'payCart']);
    Route::patch('/carts/add', [CartController::class, 'update']);

    Route::get('/comments', [CommentsController::class, 'show']);
    Route::post('/comments', [CommentsController::class, 'store']);
});
