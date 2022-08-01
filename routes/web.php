<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxpayerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'isActive',
    'isAdmin'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/tax', function () {
        return view('tax');
    })->name('tax');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'isActive',
    'isTaxpayer'
])->group(function () {
    Route::get('tax-calculator', [TaxpayerController::class, 'index'])->name('taxCalculator');
});


