<?php

use App\Http\Controllers\Api\Auth\LoginApiController;
use App\Http\Controllers\Views\Auth\LoginViewController;
use App\Http\Controllers\Views\Auth\RegisterViewController;
use App\Http\Controllers\Views\PageStaticViewController;
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
    return redirect()->route('crm.home');
});

Route::middleware('auth')->prefix('app')->group(function () {
    Route::get('/', [PageStaticViewController::class, 'home'])->name('crm.home');
    Route::get('/home', [PageStaticViewController::class, 'home'])->name('crm.home');
    Route::get('/auth/sign-out', [LoginApiController::class, 'logout'])->name('crm.auth.sign-out');
});


// Authentication routes ....
Route::middleware('guest')->prefix('auth')->group(function () {
    Route::get('sign-in', [LoginViewController::class, 'login'])->name('crm.auth.sign-in');
    Route::post('sign-in', [LoginApiController::class, 'authenticate'])->name('crm.auth.sign-in.submit');
    Route::get('sign-up', [RegisterViewController::class, 'show'])->name('crm.auth.sign-up');
    Route::get('activate-account/{token}', [RegisterViewController::class, 'activateAccount'])->name('crm.auth.activate-account');
});

Route::prefix('app')->group(function () {
    Route::get('home', [PageStaticViewController::class, 'home'])->name('crm.app.home');
});
