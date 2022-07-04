<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\users\api\AddressController;
use App\Http\Controllers\users\api\UserViewRestaurants;
use Illuminate\Support\Facades\Auth;

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

    // Route::patch('/profile', [AuthApiController::class, 'updatePersonalInfo']);

    Route::get('/addresses', [AddressController::class, 'getUserAddresses']);
    Route::post('/addresses/{address_id}', [AddressController::class, 'setCurrentAddress'])->whereNumber('id');
    Route::post('/addresses', [AddressController::class, 'createAddress']);

    // Route::get('/restaurants/{id}', [UserViewRestaurants::class, 'getRestaurantByID']);
    // Route::get('/restaurants', [UserViewRestaurants::class, 'getRestaurantByID']);
});
