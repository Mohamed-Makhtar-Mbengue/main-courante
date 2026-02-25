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

// Routes accessibles uniquement aux utilisateurs connectés
Route::middleware(['auth'])->group(function () {

    // 🟩 Espace ADMIN
    Route::middleware(['role:admin'])->group(function () {

        // Dashboard admin
        Route::get('/admin', [UserController::class, 'adminDashboard'])
            ->name('admin.dashboard');

        // Gestion des utilisateurs
        Route::resource('users', UserController::class);

        // Gestion des événements
        Route::resource('events', EventController::class);

        // Gestion des shifts
        Route::resource('shifts', ShiftController::class);
    });

    // 🟦 Espace USER (et admin)
    Route::middleware(['role:admin,user'])->group(function () {

        // Page principale
        Route::get('/main-courante', [MainCouranteController::class, 'index'])
            ->name('main-courante.index');

        // Ajout normal
        Route::post('/main-courante', [MainCouranteController::class, 'store'])
            ->name('main-courante.store');

        // Formulaire d’ajout
        Route::get('/main-courante/create', [MainCouranteController::class, 'create'])
            ->name('main-courante.create');

        // Entrée rapide
        Route::post('/main-courante/quick', [MainCouranteController::class, 'quickAdd'])
            ->name('main-courante.quick');
    });
});

// Page d’accueil après login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');
