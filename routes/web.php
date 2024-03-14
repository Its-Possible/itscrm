<?php

use App\Http\Controllers\Api\Auth\SignInApiController;
use App\Http\Controllers\Api\Auth\SignUpApiController;
use App\Http\Controllers\Api\CampaignApiController;
use App\Http\Controllers\Api\CustomerApiController;
use App\Http\Controllers\Api\DoctorApiController;
use App\Http\Controllers\Api\SpecialtyApiController;
use App\Http\Controllers\Api\TaskApiController;
use App\Http\Controllers\Views\Auth\SignInViewController;
use App\Http\Controllers\Views\Auth\SignUpViewController;
use App\Http\Controllers\Views\CampaignViewController;
use App\Http\Controllers\Views\CustomerViewController;
use App\Http\Controllers\Views\DoctorViewController;
use App\Http\Controllers\Views\PageStaticViewController;
use App\Http\Controllers\Views\Settings\Account\AccessTokenViewController;
use App\Http\Controllers\Views\SpecialtyViewController;
use App\Http\Controllers\Views\TaskViewController;
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

Route::get('/auth/sign-out', [SignInApiController::class, 'logout'])->middleware('auth')->name('auth.sign-out');

Route::prefix('app')->middleware('auth')->name('app.')->group(function () {
    Route::get('/', [PageStaticViewController::class, 'home'])->name('index');
    Route::get('/home', [PageStaticViewController::class, 'home'])->name('home');

    # Customers
    Route::get('/customers', [CustomerViewController::class, 'index'])->name('customers');
    Route::get('/customers/create', [CustomerViewController::class, 'create'])->name('customers.create');
    Route::post('/customers/create', [CustomerApiController::class, 'store'])->name('customers.store');
    Route::get('/customers/{slug}', [CustomerViewController::class, 'show'])->name('customers.show');
    Route::get('/customers/{slug}/edit', [CustomerViewController::class, 'show'])->name('customers.edit');
    Route::get('/customers/{slug}/edit', [CustomerApiController::class, 'update'])->name('customers.update');

    # Campaigns
    Route::get('/campaigns', [CampaignViewController::class, 'index'])->name('campaigns');
    Route::get('/campaigns/create', [CampaignViewController::class, 'create'])->name('campaigns.create');
    Route::post('/campaigns/create', [CampaignApiController::class, 'store'])->name('campaigns.store');
    Route::get('/campaigns/{slug}', [CampaignViewController::class, 'show'])->name('campaigns.show');
    Route::get('/campaigns/{slug}/edit', [CampaignViewController::class, 'show'])->name('campaigns.edit');
    Route::get('/campaigns/{slug}/edit', [CampaignApiController::class, 'update'])->name('campaigns.update');

    # Tags
    Route::get('/tags', [CustomerViewController::class, 'index'])->name('tags');
    Route::get('/tags/{slug}', [CustomerViewController::class, 'show'])->name('tags.show');
    Route::get('/tags/create', [CustomerViewController::class, 'create'])->name('tags.create');
    Route::get('/tags/{slug}/edit', [CustomerViewController::class, 'show'])->name('tags.edit');

    # Tasks
    Route::get('/tasks', [TaskViewController::class, 'index'])->name('tasks');
    Route::get('/tasks/create', [TaskViewController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/create', [TaskApiController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{slug}', [TaskViewController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{slug}/edit', [TaskViewController::class, 'edit'])->name('tasks.edit');
    Route::get('/tasks/{slug}/edit', [TaskApiController::class, 'update'])->name('tasks.update');

    # Doctors
    Route::get('/doctors', [DoctorViewController::class, 'index'])->name('doctors');
    Route::get('/doctors/create', [DoctorViewController::class, 'create'])->name('doctors.create');
    Route::post('/doctors/create', [DoctorApiController::class, 'store'])->name('doctors.store');
    Route::get('/doctors/{slug}', [DoctorViewController::class, 'show'])->name('doctors.show');
    Route::get('/doctors/{slug}/edit', [DoctorViewController::class, 'edit'])->name('doctors.edit');
    Route::post('/doctors/{slug}/edit', [DoctorViewController::class, 'update'])->name('doctors.update');
    Route::delete('/doctors/{slug}', [DoctorViewController::class, 'delete'])->name('doctors.delete');

    # Specialties
    Route::get('/specialties', [SpecialtyViewController::class, 'index'])->name('specialties');
    Route::get('/specialties/create', [SpecialtyViewController::class, 'create'])->name('specialties.create');
    Route::post('/specialties/create', [SpecialtyApiController::class, 'store'])->name('specialties.store');
    Route::get('/specialties/{slug}', [SpecialtyViewController::class, 'show'])->name('specialties.show');
    Route::get('/specialties/{slug}/edit', [SpecialtyViewController::class, 'edit'])->name('specialties.edit');
    Route::put('/specialties/{slug}/edit', [SpecialtyApiController::class, 'update'])->name('specialties.update');

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
