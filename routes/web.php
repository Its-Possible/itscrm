<?php

use App\Http\Controllers\Api\Auth\LoginApiController;
use App\Http\Controllers\Views\Auth\LoginViewController;
use App\Http\Controllers\Views\Auth\RegisterViewController;
use App\Http\Controllers\Views\CustomerViewController;
use App\Http\Controllers\Views\MailViewController;
use App\Http\Controllers\Views\PageStaticViewController;
use App\Http\Controllers\Views\StatisticViewController;
use App\Http\Controllers\Views\CampaignViewController;
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
    Route::get('/alerts', [PageStaticViewController::class, 'home'])->name('alerts');
    Route::get('/statistics', [StatisticViewController::class, 'index'])->name('statistics');
//    Route::get('/campaigns', [CampaignViewController::class, 'index'])->name('campaigns');
    Route::get('/leads', [CustomerViewController::class, 'index'])->name('leads');

    Route::prefix('/mails')->name('mails.')->group(function () {
        Route::get('/', [MailViewController::class, 'index'])->name('index');
    });

    Route::prefix('/campaigns')->name('campaigns.')->group(function () {
        Route::get('/', [CampaignViewController::class, 'index'])->name('index');
        Route::get('/create', [CampaignViewController::class, 'create'])->name('create');
        Route::get('/{slug}', [CampaignViewController::class, 'show'])->name('show');
        Route::get('/{slug}/edit', [CampaignViewController::class, 'edit'])->name('edit');
        Route::patch('/{slug}', [CampaignApiViewController::class, 'update'])->name('update');
        Route::delete('{slug}', [CampaignViewController::class, 'delete'])->name('delete');
    });

    Route::prefix('/customers')->name('customers.')->group(function () {
        Route::get('/',  [CustomerViewController::class, 'index'])->name('index');
        Route::get('/{slug}',  [CustomerViewController::class, 'show'])->name('show');
        Route::get('/create',  [CustomerViewController::class, 'create'])->name('create');
        Route::get('/{slug}/edit', [CustomerViewController::class, 'edit'])->name('edit');
        Route::patch('/{slug}', [CustomerApiController::class, 'edit'])->name('update');
        Route::get('/import',  [CustomerViewController::class, 'import'])->name('import');
    });
    Route::get('/projects', [CustomerViewController::class, 'index'])->name('projects');
    Route::get('/services', [CustomerViewController::class, 'index'])->name('services');

    // Marketing route group
    Route::prefix('/marketing')->name('marketing.')->group(function () {
        Route::get('/', [PageStaticViewController::class, 'marketing'])->name('home');
    });
});


// Authentication routes ....
Route::middleware('guest')->prefix('auth')->group(function () {
    Route::get('sign-in', [LoginViewController::class, 'login'])->name('its.auth.sign-in');
    Route::post('sign-in', [LoginApiController::class, 'authenticate'])->name('its.auth.sign-in.submit');
    Route::get('sign-up', [RegisterViewController::class, 'show'])->name('its.auth.sign-up');
    Route::get('activate-account/{token}', [RegisterViewController::class, 'activateAccount'])->name('its.auth.activate-account');
});
