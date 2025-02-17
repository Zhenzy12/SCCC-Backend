<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\ReportController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::apiResource('/image', ImageController::class)
    ->only(['index', 'store', 'destroy']);

Route::get('/csrf-cookie', function () {
    return response()->json(['message' => 'CSRF cookie set']);
});


Route::prefix('911')->group(function () {
    Route::get('/users', function () {
        // Matches The "/admin/users" URL
    });

    Route::get('/barangay', [BarangayController::class, 'index']);
    Route::post('/barangay', [BarangayController::class, 'create']);

    Route::get('/report', [ReportController::class, 'index']);
    Route::post('/report', [ReportController::class, 'create']);
    Route::put('/report/{id}', [ReportController::class, 'update']);
});