<?php

use App\Http\Controllers\Api\ConfigSettingController;
use App\Http\Controllers\Api\ServiceCheckerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/services/status')->group(function () {
        Route::post('/http', [ServiceCheckerController::class, 'httpStatus'])->name('api.services.status.http');
        Route::post('/github', [ServiceCheckerController::class, 'githubStatus'])->name('api.services.status.github');
    });

    Route::prefix('config')->group(function () {
        Route::get('/', [ConfigSettingController::class, 'index'])->name('api.config.index');
        Route::post('create', [ConfigSettingController::class, 'create'])->name('api.config.create');
        Route::post('/', [ConfigSettingController::class, 'update'])->name('api.config.update');
    });
});
