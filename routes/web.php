<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlternanceController;
use App\Http\Controllers\EntrepriseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Routes for manual creation
    Route::get('/alternances/create', [AlternanceController::class, 'create'])->name('alternances.create');
    Route::post('/alternances', [AlternanceController::class, 'store'])->name('alternances.store');
    Route::get('/alternances/{alternance}/edit', [AlternanceController::class, 'edit'])->name('alternances.edit');
    Route::put('/alternances/{alternance}', [AlternanceController::class, 'update'])->name('alternances.update');
    Route::delete('/alternances/{alternance}', [AlternanceController::class, 'destroy'])->name('alternances.destroy');
    Route::resource('entreprises', EntrepriseController::class);

    // Route for Excel import
    Route::post('/import/entreprises', [DashboardController::class, 'importEntreprises'])->name('import.entreprises');
    Route::post('/import/alternances', [DashboardController::class, 'importAlternances'])->name('import.alternances');

    // Route for company search autocomplete
    Route::get('/search-entreprises', [DashboardController::class, 'searchEntreprises'])->name('search.entreprises');

    // Route for unique technos
    Route::get('/get-unique-technos', [DashboardController::class, 'getUniqueTechnos'])->name('get.unique.technos');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';