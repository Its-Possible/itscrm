<?php

use App\Http\Controllers\Api\DoctorApiController;
use App\Http\Controllers\Api\MessageApiController;
use App\Models\Doctor;
use App\Http\Controllers\Api\Auth\LoginApiController;
use App\Http\Controllers\Views\DoctorViewController;
use App\Http\Controllers\Views\Auth\LoginViewController;
use App\Http\Controllers\Views\Auth\RegisterViewController;
use App\Http\Controllers\Views\CustomerViewController;
use App\Http\Controllers\Views\MailViewController;
use App\Http\Controllers\Views\PageStaticViewController;
use App\Http\Controllers\Views\StatisticViewController;
use App\Http\Controllers\Views\CampaignViewController;
use App\Http\Controllers\Views\MessageViewController;
use Illuminate\Support\Facades\Route;

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

    Route::prefix('statistics')->name('statistics.')->group(function () {
        Route::get('/', [StatisticViewController::class, 'index'])->name('index');
    });

    Route::prefix('/doctors')->name('doctors.')->group(function () {
        Route::get('/', [DoctorViewController::class, 'index']);
        Route::get('/create', [DoctorViewController::class, 'create']);
        Route::get('/{slug}', [DoctorViewController::class, 'show']);
        Route::get('/{slug}/edit', [DoctorViewController::class, 'edit']);
        Route::patch('/{slug/edit', [DoctorApiController::class, 'update']);
        Route::delete('/slug', [DoctorApiController::class, 'destroy']);
    });

    Route::prefix('/customers')->name('customers.')->group(function () {
        Route::get('/',  [CustomerViewController::class, 'index'])->name('index');
        Route::get('/create', [CustomerViewController::class, 'create'])->name('create');
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
        Route::patch('/{slug}', [CampaignApiViewController::class, 'update'])->name('update');
        Route::delete('{slug}', [CampaignViewController::class, 'delete'])->name('delete');
    });

    Route::prefix('/mails')->name('mails.')->group(function () {
        Route::get('/', [MailViewController::class, 'index'])->name('index');
    });

    Route::prefix('/messages')->name('messages.')->group(function () {
        Route::get('/', [MessageViewController::class, 'index'])->name('index');
        Route::post('/', [MessageApiController::class, 'store'])->name('store');
    });
});


// Authentication routes ....
Route::middleware('guest')->prefix('auth')->group(function () {
    Route::get('sign-in', [LoginViewController::class, 'login'])->name('its.auth.sign-in');
    Route::post('sign-in', [LoginApiController::class, 'authenticate'])->name('its.auth.sign-in.submit');
    Route::get('sign-up', [RegisterViewController::class, 'show'])->name('its.auth.sign-up');
    Route::get('activate-account/{token}', [RegisterViewController::class, 'activateAccount'])->name('its.auth.activate-account');
});
