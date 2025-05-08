<?php

use App\Http\Controllers\ServiceCheckerController;
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
});
