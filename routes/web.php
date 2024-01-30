<?php

use App\Http\Controllers\Api\Auth\SignInApiController;
use App\Http\Controllers\Api\Auth\SignUpApiController;
use App\Http\Controllers\Views\Auth\SignInViewController;
use App\Http\Controllers\Views\Auth\SignUpViewController;
use App\Http\Controllers\Views\CustomerViewController;
use App\Http\Controllers\Views\HomeViewController;
use App\Http\Controllers\Views\PageStaticViewController;
use App\Http\Controllers\Views\Settings\Account\AccessTokenViewController;
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

Route::prefix('auth')->middleware('guest')->name('auth.')->group(function () {
    Route::get('/sign-in', [SignInViewController::class, 'login'])->name('sign-in');
    Route::post('/sign-in', [SignInApiController::class, 'authenticate'])->name('sign-in.submit');
    Route::get('/sign-up', [SignUpViewController::class, 'register'])->middleware('sign_up.activated')->name('sign-up');
    Route::post('/sign-up', [SignUpApiController::class, 'register'])->middleware('sign_up.activated')->name('sign-up.submit');
    Route::get('activate-account/{token}', [SignUpViewController::class, 'activationAccount'])->name('activate-account');
});

Route::prefix('app')->middleware('auth')->name('app.')->group(function () {
    Route::get('/', [PageStaticViewController::class, 'home'])->name('index');
    Route::get('/home', [PageStaticViewController::class, 'home'])->name('home');

    # Customers
    Route::get('/customers', [CustomerViewController::class, 'index'])->name('customers');
    Route::get('/customers/create', [CustomerViewController::class, 'create'])->name('customers.create');
    Route::post('/customers/create', [CustomerViewController::class, 'create'])->name('customers.store');
    Route::get('/customers/{slug}', [CustomerViewController::class, 'show'])->name('customers.show');
    Route::get('/customers/{slug}/edit', [CustomerViewController::class, 'show'])->name('customers.edit');

    # Campaigns
    Route::get('/campaigns', [CustomerViewController::class, 'index'])->name('campaigns');
    Route::get('/campaigns/{slug}', [CustomerViewController::class, 'show'])->name('campaigns.show');
    Route::get('/campaigns/create', [CustomerViewController::class, 'create'])->name('campaigns.create');
    Route::get('/campaigns/{slug}/edit', [CustomerViewController::class, 'show'])->name('campaigns.edit');

    # Tags
    Route::get('/tags', [CustomerViewController::class, 'index'])->name('tags');
    Route::get('/tags/{slug}', [CustomerViewController::class, 'show'])->name('tags.show');
    Route::get('/tags/create', [CustomerViewController::class, 'create'])->name('tags.create');
    Route::get('/tags/{slug}/edit', [CustomerViewController::class, 'show'])->name('tags.edit');

    # Tasks
    Route::get('/tasks', [CustomerViewController::class, 'index'])->name('tasks');
    Route::get('/tasks/{slug}', [CustomerViewController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/create', [CustomerViewController::class, 'create'])->name('tasks.create');
    Route::get('/tasks/{slug}/edit', [CustomerViewController::class, 'show'])->name('tasks.edit');

    # Doctors
    Route::get('/doctors', [CustomerViewController::class, 'index'])->name('doctors');
    Route::get('/doctors/{slug}', [CustomerViewController::class, 'show'])->name('doctors.show');
    Route::get('/doctors/create', [CustomerViewController::class, 'create'])->name('doctors.create');
    Route::get('/doctors/{slug}/edit', [CustomerViewController::class, 'show'])->name('doctors.edit');

    # Specialities
    Route::get('/specialities', [CustomerViewController::class, 'index'])->name('specialities');
    Route::get('/specialities/{slug}', [CustomerViewController::class, 'show'])->name('specialities.show');
    Route::get('/specialities/create', [CustomerViewController::class, 'create'])->name('specialities.create');
    Route::get('/specialities/{slug}/edit', [CustomerViewController::class, 'show'])->name('specialities.edit');

    # Settings
    Route::get('/settings', [CustomerViewController::class, 'index'])->name('settings');
    Route::get('/settings/{slug}', [CustomerViewController::class, 'show'])->name('settings.show');
    Route::get('/settings/create', [CustomerViewController::class, 'create'])->name('settings.create');
    Route::get('/settings/{slug}/edit', [CustomerViewController::class, 'show'])->name('settings.edit');

});

Route::prefix('settings')->middleware('auth')->group(function () {
    Route::prefix('account')->group(function () {
        Route::prefix('access-tokens')->group(function () {
            Route::get('devices', [AccessTokenViewController::class, 'index'])->name('devices');
        })->name('access-tokens.');
    })->name('account');
})->name('settings.');

Route::get('/', function () {
    return redirect('/app/home');
});
