<?php

use App\Http\Controllers\FutbolistaController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/hola', function () {
    return 'hola';
})->middleware(admin::class)->name('hola');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('futbolistas', FutbolistaController::class);
});



require __DIR__ . '/auth.php';
