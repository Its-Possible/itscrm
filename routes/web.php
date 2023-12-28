<?php

use App\Http\Controllers\Api\CustomerApiController;
use App\Http\Controllers\Views\CustomerViewController;
use App\Http\Controllers\Views\HomeViewController;
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

Route::get('/', [HomeViewController::class, 'index']);

Route::prefix('app')->middleware('auth')->group(function () {
    Route::get('/', [HomeViewController::class, 'index'])->name('index');
    Route::get('/home', [HomeViewController::class, 'index'])->name('home');

    # Customers
    Route::get('/customers', [CustomerViewController::class, 'index'])->name('customers');
    Route::get('/customers/{slug}', [CustomerViewController::class, 'show'])->name('customers.show');
    Route::get('/customers/create', [CustomerViewController::class, 'create'])->name('customers.create');
    Route::get('/customers/{slug}/edit', [CustomerViewController::class, 'show'])->name('customers.edit');

})->name('its.app.');


