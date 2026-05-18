<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AkteBayiController;
use App\Http\Controllers\KotaController;
use Illuminate\Support\Facades\Route;

// Root route - redirect to login if not authenticated, dashboard if authenticated
Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/akte-bayi');
    }
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return redirect()->route('akte-bayi.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Akte Bayi routes
    Route::get('/akte-bayi/create-folder', [AkteBayiController::class, 'createFolder'])->name('akte-bayi.create-folder');
    Route::post('/akte-bayi/store-folder', [AkteBayiController::class, 'storeFolder'])->name('akte-bayi.store-folder');
    Route::get('/file/serve/{path}', [AkteBayiController::class, 'serveFile'])->where('path', '[A-Za-z0-9+/=]+')->name('file.serve');
    Route::resource('akte-bayi', AkteBayiController::class);

    // Kota routes
    Route::resource('kota', KotaController::class);
});

require __DIR__ . '/auth.php';
