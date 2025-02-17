<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OfficeEquipmentsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EquipmentCopiesController;
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

// Office Equipment api
Route::middleware(['api.key'])->group(function () {
Route::get('/office_equipments', [OfficeEquipmentsController::class, 'index']);

Route::post('/office_equipments', [OfficeEquipmentsController::class, 'store']);

Route::get('/office_equipments/{officeEquipments}', [OfficeEquipmentsController::class, 'show']);

Route::put('/office_equipments/{officeEquipments}', [OfficeEquipmentsController:: class, 'update']);

Route::delete('/office_equipments/{officeEquipments}', [OfficeEquipmentsController:: class, 'destroy']);

// categories api
Route::get('/categories', [CategoriesController::class, 'index']);

Route::post('/categories', [CategoriesController::class, 'store']);

Route::get('/categories/{categories}', [CategoriesController::class, 'show']);

Route::put('/categories/{categories}', [CategoriesController::class, 'update']);

Route::delete('categories/{categories}',[CategoriesController::class, 'destroy']);

// equipment copies api
Route::get('/equipment_copies', [EquipmentCopiesController::class, 'index']);

Route::post('/equipment_copies', [EquipmentCopiesController::class, 'store']);

Route::get('/equipment_copies/{equipmentCopies}', [EquipmentCopiesController::class, 'show']);

Route::put('/equipment_copies/{equipmentCopies}', [EquipmentCopiesController::class, 'update']);

Route::delete('/equipment_copies/{equipmentCopies}', [EquipmentCopiesController::class, 'destroy']);

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
