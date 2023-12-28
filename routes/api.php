<?php

use App\Http\Controllers\Api\CampaignApiController;
use App\Http\Controllers\Api\CustomerApiController;
use App\Http\Controllers\Api\DoctorApiController;
use App\Http\Controllers\Api\MailApiController;
use App\Http\Controllers\Api\MessageApiController;
use App\Http\Controllers\Api\SettingApiController;
use App\Http\Controllers\Api\SpecialityApiController;
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
    Route::post('/', [CustomerApiController::class, 'store'])->name('store');
    Route::patch('/{slug}', [CustomerApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [CustomerApiController::class, 'delete'])->name('delete');
});

# Campaigns
Route::prefix('/campaigns')->name('its.api.campaigns.')->group(function () {
    Route::get('/', [CampaignApiController::class, 'list'])->name('list');
    Route::get('/{slug}', [CampaignApiController::class, 'show'])->name('show');
    Route::patch('/{slug}', [CampaignApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [CampaignApiController::class, 'delete'])->name('delete');

    # Mails
    Route::prefix('/mails')->name('its.api.mails.')->group(function () {
        Route::get('/', [MailApiController::class, 'list'])->name('list');
        Route::get('/{slug}', [MailApiController::class, 'show'])->name('show');
        Route::patch('/{slug}', [MailApiController::class, 'update'])->name('update');
        Route::delete('/{slug}', [MailApiController::class, 'delete'])->name('delete');
    });

    # Messages (Mobile message)
    Route::prefix('/messages')->name('its.api.mails.')->group(function () {
        Route::get('/', [MessageApiController::class, 'list'])->name('list');
        Route::get('/{slug}', [MessageApiController::class, 'show'])->name('show');
        Route::patch('/{slug}', [MessageApiController::class, 'update'])->name('update');
        Route::delete('/{slug}', [MessageApiController::class, 'delete'])->name('delete');
    });
});

# Schedules
Route::prefix('/schedules')->name('its.api.schedules.')->group(function () {
    Route::get('/', [ScheculeApiController::class, 'list'])->name('list');
    Route::get('/{slug}', [ScheculeApiController::class, 'show'])->name('show');
    Route::patch('/{slug}', [ScheculeApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [ScheculeApiController::class, 'delete'])->name('delete');
});

# Doctors
Route::prefix('/doctors')->name('its.api.doctors.')->group(function () {
    Route::get('/', [DoctorApiController::class, 'list'])->name('list');
    Route::get('/{slug}', [DoctorApiController::class, 'show'])->name('show');
    Route::patch('/{slug}', [DoctorApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [DoctorApiController::class, 'delete'])->name('delete');
});

# Specialities
Route::prefix('/specialities')->name('its.api.specialities.')->group(function () {
    Route::get('/', [SpecialityApiController::class, 'list'])->name('list');
    Route::get('/{slug}', [SpecialityApiController::class, 'show'])->name('show');
    Route::patch('/{slug}', [SpecialityApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [SpecialityApiController::class, 'delete'])->name('delete');
});

# Settings
Route::prefix('/settings')->name('its.api.settings.')->group(function () {
    Route::get('/general', [SettingApiController::class, 'list'])->name('list');
    Route::get('/{slug}', [SettingApiController::class, 'show'])->name('show');
    Route::patch('/{slug}', [SettingApiController::class, 'update'])->name('update');
    Route::delete('/{slug}', [SettingApiController::class, 'delete'])->name('delete');
});
