<?php

use App\Http\Controllers\ConfigPageController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('home');

Route::prefix('config')->group(function () {
    Route::get('/', [ConfigPageController::class, 'index'])->name('config.index');
    Route::post('/', [ConfigPageController::class, 'update'])->name('config.update');
    Route::post('create', [ConfigPageController::class, 'create'])->name('config.create');
});
