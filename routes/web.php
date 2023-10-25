<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware("auth")->group(function() {
    Route::get('plans', [\App\Http\Controllers\PlanController::class, 'index']);
    Route::get('plans/{plan}', [\App\Http\Controllers\PlanController::class, 'show'])->name('plans.show');
    Route::post('subscription', [\App\Http\Controllers\PlanController::class, 'subscription'])->name('subscription.create');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
