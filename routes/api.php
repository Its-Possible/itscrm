<?php

use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth.api')->name('api')->group(function () {
    Route::prefix('user')->name('api')->group(function () {
        Route::get('/', [UserApiController::class, 'index']);
    });

    Route::prefix('customers')->name('customers.')->group(function () {

    });
});


Route::get('/users', [App\Http\Controllers\Api\UserApiController::class, 'index']);
Route::get('/tags', [App\Http\Controllers\Api\TagApiController::class, 'index']);
Route::get('/tags/relationship', [App\Http\Controllers\Api\TagApiController::class, 'relationship']);

Route::get('/customers', [App\Http\Controllers\Api\CustomerApiController::class, 'index']);
