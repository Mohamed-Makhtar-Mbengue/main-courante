<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MainCouranteController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('events.index');
});

Auth::routes();

// Groupe protégé par authentification
Route::middleware(['auth'])->group(function () {

    // Admin + Mi-admin
    Route::middleware(['role:admin,mi-admin'])->group(function () {
        Route::resource('events', EventController::class);
        Route::resource('users', UserController::class);
        Route::resource('shifts', ShiftController::class)->only(['store', 'destroy']);
    });

    // Admin + Mi-admin + User
    Route::middleware(['role:admin,mi-admin,user'])->group(function () {
        Route::resource('maincourante', MainCouranteController::class)->only(['store', 'destroy']);
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
