<?php

use App\Http\Controllers\Api\CustomerApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


# Customers
Route::prefix('/customers')->name('its.api.customers.')->group(function () {
    Route::get('/', [CustomerApiController::class, 'list'])->name('list');
    Route::get('/{slug}', [CustomerApiController::class, 'show'])->name('show');
    Route::patch('/{slug}', [CustomerApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [CustomerApiController::class, 'delete'])->name('delete');
});

# Campaigns
Route::prefix('/campaigns')->name('its.api.campaigns.')->group(function () {
    Route::get('/', [CustomerApiController::class, 'list'])->name('list');
    Route::get('/{slug}', [CustomerApiController::class, 'show'])->name('show');
    Route::patch('/{slug}', [CustomerApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [CustomerApiController::class, 'delete'])->name('delete');

    # Mails
    Route::prefix('/mails')->name('its.api.mails.')->group(function () {
        Route::get('/', [CustomerApiController::class, 'list'])->name('list');
        Route::get('/{slug}', [CustomerApiController::class, 'show'])->name('show');
        Route::patch('/{slug}', [CustomerApiController::class, 'update'])->name('update');
        Route::delete('/{slug}', [CustomerApiController::class, 'delete'])->name('delete');
    });

    # Messages (Mobile message)
    Route::prefix('/messages')->name('its.api.mails.')->group(function () {
        Route::get('/', [CustomerApiController::class, 'list'])->name('list');
        Route::get('/{slug}', [CustomerApiController::class, 'show'])->name('show');
        Route::patch('/{slug}', [CustomerApiController::class, 'update'])->name('update');
        Route::delete('/{slug}', [CustomerApiController::class, 'delete'])->name('delete');
    });
});

# Schedules
Route::prefix('/schedules')->name('its.api.schedules.')->group(function () {
    Route::get('/', [CustomerApiController::class, 'list'])->name('list');
    Route::get('/{slug}', [CustomerApiController::class, 'show'])->name('show');
    Route::patch('/{slug}', [CustomerApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [CustomerApiController::class, 'delete'])->name('delete');
});

# Doctors
Route::prefix('/doctors')->name('its.api.doctors.')->group(function () {
    Route::get('/', [CustomerApiController::class, 'list'])->name('list');
    Route::get('/{slug}', [CustomerApiController::class, 'show'])->name('show');
    Route::patch('/{slug}', [CustomerApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [CustomerApiController::class, 'delete'])->name('delete');
});

# Specialities
Route::prefix('/doctors')->name('its.api.specialities.')->group(function () {
    Route::get('/', [CustomerApiController::class, 'list'])->name('list');
    Route::get('/{slug}', [CustomerApiController::class, 'show'])->name('show');
    Route::patch('/{slug}', [CustomerApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [CustomerApiController::class, 'delete'])->name('delete');
});

# Settings
Route::prefix('/settings')->name('its.api.settings.')->group(function () {
    Route::get('/general', [CustomerApiController::class, 'list'])->name('list');
    Route::get('/{slug}', [CustomerApiController::class, 'show'])->name('show');
    Route::patch('/{slug}', [CustomerApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [CustomerApiController::class, 'delete'])->name('delete');
});
