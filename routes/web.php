<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::get('/q1', [App\Http\Controllers\PollingUnitsController::class, 'index'])->name('q1');

Route::get('/polling_result/{polling_unit}', [App\Http\Controllers\PollingUnitsController::class, 'polling_result'])->name('polling_result');

Route::get('/q2', [App\Http\Controllers\PollingUnitsController::class, 'lga'])->name('q2');

Route::get('/q2_get_result', [App\Http\Controllers\PollingUnitsController::class, 'get_result'])->name('get_result');

Route::get('/q3', [App\Http\Controllers\PollingUnitsController::class, 'create'])->name('q3.create');

Route::post('/q3', [App\Http\Controllers\PollingUnitsController::class, 'store'])->name('q3.store');

