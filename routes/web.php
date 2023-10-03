<?php

use App\Http\Controllers\Api\CampaignApiController;
use App\Http\Controllers\Api\CustomerApiController;
use App\Http\Controllers\Api\FileApiController;
use App\Http\Controllers\Api\PersonalAccessTokenApiController;
use App\Http\Controllers\Api\SpecialityApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Views\FileViewController;
use App\Http\Controllers\Views\SpecialityViewController;
use App\Models\PersonalAccessToken;
use Database\Factories\SettingFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Views\MailViewController;
use App\Http\Controllers\Api\DoctorApiController;
use App\Http\Controllers\Api\MessageApiController;
use App\Http\Controllers\Views\SettingsViewController;
use App\Http\Controllers\Views\UserViewController;
use App\Http\Controllers\Api\Auth\LoginApiController;
use App\Http\Controllers\Views\DoctorViewController;
use App\Http\Controllers\Views\Auth\LoginViewController;
use App\Http\Controllers\Views\CustomerViewController;
use App\Http\Controllers\Views\Auth\RegisterViewController;
use App\Http\Controllers\Views\PageStaticViewController;
use App\Http\Controllers\Views\StatisticViewController;
use App\Http\Controllers\Views\CampaignViewController;
use App\Http\Controllers\Views\MessageViewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->get('/', function () {
    return redirect()->route('its.app.home');
});

Route::middleware('auth')->prefix('app')->name('its.app.')->group(function () {
    Route::get('/', [PageStaticViewController::class, 'home'])->name('index');
    Route::get('/home', [PageStaticViewController::class, 'home'])->name('home');

    Route::prefix('/messages')->name('messages.')->group(function () {
        Route::get('/', [MessageViewController::class, 'index'])->name('index');
        Route::post('/', [MessageApiController::class, 'store'])->name('store');
    });

    Route::prefix('/customers')->name('customers.')->group(function () {
        Route::get('/',  [CustomerViewController::class, 'index'])->name('index');
        Route::get('/create', [CustomerViewController::class, 'create'])->name('create');
        Route::post('/', [CustomerApiController::class, 'store'])->name('store');
        Route::get('/{slug}', [CustomerViewController::class, 'show'])->name('show');
        Route::get('/{slug}/edit', [CustomerViewController::class, 'edit'])->name('edit');
        Route::patch('/{slug}', [CustomerApiController::class, 'edit'])->name('update');
        Route::get('/import',  [CustomerViewController::class, 'import'])->name('import');
    });

    Route::prefix('/campaigns')->name('campaigns.')->group(function () {
        Route::get('/', [CampaignViewController::class, 'index'])->name('index');
        Route::get('/create', [CampaignViewController::class, 'create'])->name('create');
        Route::get('/{slug}', [CampaignViewController::class, 'show'])->name('show');
        Route::get('/{slug}/edit', [CampaignViewController::class, 'edit'])->name('edit');
        Route::patch('/{slug}', [CampaignApiController::class, 'update'])->name('update');
        Route::delete('{slug}', [CampaignViewController::class, 'delete'])->name('delete');
    });

    Route::prefix('/doctors')->name('doctors.')->group(function () {
        Route::get('/', [DoctorViewController::class, 'index'])->name('index');
        Route::get('/create', [DoctorViewController::class, 'create'])->name('create');
        Route::post('/create', [DoctorApiController::class, 'store'])->name('store');
        Route::get('/{slug}', [DoctorViewController::class, 'show'])->name('show');
        Route::get('/{slug}/edit', [DoctorViewController::class, 'edit'])->name('edit');
        Route::post('/{slug/edit', [DoctorApiController::class, 'update'])->name('update');
        Route::delete('/slug', [DoctorApiController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/specialities')->name('specialities.')->group(function () {
        Route::get('/', [SpecialityViewController::class, 'index'])->name('index');
        Route::get('/create', [SpecialityViewController::class, 'create'])->name('create');
        Route::post('/create', [SpecialityApiController::class, 'store'])->name('store');
        Route::get('/{slug}', [SpecialityViewController::class, 'show'])->name('show');
        Route::get('/{slug}/edit', [SpecialityViewController::class, 'edit'])->name('edit');
        Route::post('/{slug}/edit', [SpecialityApiController::class, 'update'])->name('update');
        Route::delete('/slug', [SpecialityApiController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/users')->name('users.')->group(function () {
        Route::get('/', [UserViewController::class, 'index'])->name('index');
        Route::get('/create', [UserViewController::class, 'create'])->name('create');
        Route::get('/{slug}', [UserViewController::class, 'show'])->name('show');
        Route::get('/{slug}/edit', [UserViewController::class, 'edit'])->name('edit');
        Route::patch('/{slug/edit', [UserApiController::class, 'update'])->name('update');
        Route::delete('/slug', [UserApiController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/files')->name('file.')->group(function () {
        Route::get('/', [FileViewController::class, 'index'])->name('index');
        Route::get('/create', [FileViewController::class, 'create'])->name('create');
        Route::get('/{slug}', [FileViewController::class, 'show'])->name('show');
        Route::get('/{slug}/edit', [FileViewController::class, 'edit'])->name('edit');
        Route::patch('/{slug/edit', [FileApiController::class, 'update'])->name('update');
        Route::delete('/slug', [FileApiController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/settings')->name('settings.')->group(function () {
        Route::get('/', [SettingsViewController::class, 'index'])->name('index');
        Route::prefix('/account')->name('account.')->group(function () {
            Route::get('/', [SettingsViewController::class, 'account'])->name('index');
            Route::get('/secure', [SettingsViewController::class, 'secure'])->name('secure');
            Route::get('/delete', [SettingsViewController::class, 'destroy'])->name('delete');
        });
        Route::prefix('/auth')->name('auth.')->group(function () {
            Route::prefix('/tokens')->name('tokens')->group(function () {
                Route::get('/create', [PersonalAccessTokenApiController::class, 'store'])->name('store');
            });
        });
    });
});

Route::middleware('auth')->prefix('auth')->group(function () {
    Route::get('sign-out', [LoginApiController::class, 'logout'])->name('its.auth.sign-out');
});

// Authentication routes ....
Route::middleware('guest')->prefix('auth')->group(function () {
    Route::get('sign-in', [LoginViewController::class, 'login'])->name('its.auth.sign-in');
    Route::post('sign-in', [LoginApiController::class, 'authenticate'])->name('its.auth.sign-in.submit');
    Route::get('sign-up', [RegisterViewController::class, 'show'])->name('its.auth.sign-up');
    Route::get('activate-account/{token}', [RegisterViewController::class, 'activateAccount'])->name('its.auth.activate-account');
});
