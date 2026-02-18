<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MainCouranteController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {

    // Admin + Mi-admin : gestion des événements, utilisateurs, shifts
    Route::middleware(['role:admin,mi-admin'])->group(function () {
        Route::get('/admin', [UserController::class, 'adminDashboard'])->name('admin.dashboard');
        Route::resource('events', EventController::class);
        Route::resource('users', UserController::class);
        Route::resource('shifts', ShiftController::class);

        
    });

    // Tous les rôles : admin, mi-admin, user
    Route::middleware(['role:admin,mi-admin,user'])->group(function () {
        Route::resource('maincourante', MainCouranteController::class);
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
