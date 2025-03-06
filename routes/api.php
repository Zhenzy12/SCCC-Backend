<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OfficeEquipmentsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EquipmentCopiesController;
use App\Http\Controllers\OfficeSuppliesController;
use App\Http\Controllers\BorrowTransactionItemsController;
use App\Http\Controllers\BorrowTransactionsController;
use App\Http\Controllers\BorrowersController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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

// office supplies API
Route::get('/office_supplies', [OfficeSuppliesController::class, 'index']);

Route::post('/office_supplies', [OfficeSuppliesController::class, 'store']);

Route::get('/office_supplies/{officeSupplies}', [OfficeSuppliesController::class, 'show']);

Route::put('/office_supplies/{officeSupplies}', [OfficeSuppliesController::class, 'update']);

Route::delete('/office_supplies/{officeSupplies}', [OfficeSuppliesController::class, 'destroy']);

// equipment copies API
Route::get('/equipment_copies', [EquipmentCopiesController::class, 'index']);

    Route::post('/equipment_copies', [EquipmentCopiesController::class, 'store']);

    Route::get('/equipment_copies/{equipmentCopies}', [EquipmentCopiesController::class, 'show']);

    Route::put('/equipment_copies/{equipmentCopies}', [EquipmentCopiesController::class, 'update']);

Route::delete('/equipment_copies/{equipmentCopies}', [EquipmentCopiesController::class, 'destroy']);

//borrow transaction items API
Route::get('/borrow_transaction_items', [BorrowTransactionItemsController::class, 'index']);

Route::post('/borrow_transaction_items', [BorrowTransactionItemsController::class, 'store']);

Route::get('/borrow_transaction_items/{borrowTransactionItems}', [BorrowTransactionItemsController::class, 'show']);

Route::put('/borrow_transaction_items/{borrowTransactionItems}', [BorrowTransactionItemsController::class, 'update']);

Route::delete('/borrow_transaction_items/{borrowTransactionItems}', [BorrowTransactionItemsController::class, 'destroy']);

//borrowers transactions API
Route::get('/borrow_transactions', [BorrowTransactionsController::class, 'index']);

Route::post('/borrow_transactions', [BorrowTransactionsController::class, 'store']);

Route::get('/borrow_transactions/{borrowTransactions}', [BorrowTransactionsController::class, 'show']);

Route::put('/borrow_transactions/{borrowTransactions}', [BorrowTransactionsController::class, 'update']);

Route::delete('/borrow_transactions/{borrowTransactions}', [BorrowTransactionsController::class, 'destroy']);

// borrowers API
Route::get('/borrowers', [BorrowersController::class, 'index']);

Route::post('/borrowers', [BorrowersController::class, 'store']);

Route::get('/borrowers/{borrowers}', [BorrowersController::class, 'show']);

Route::put('/borrowers/{borrowers}', [BorrowersController::class, 'update']);

Route::delete('/borrowers/{borrowers}', [BorrowersController::class, 'destroy']);

//Offices API
Route::get('/offices', [OfficesController::class, 'index']);

Route::post('/offices', [OfficesController::class, 'store']);

Route::get('/offices/{offices}', [OfficesController::class, 'show']);

Route::put('/offices/{offices}', [OfficesController::class, 'update']);

Route::delete('/offices/{offices}', [OfficesController::class, 'destroy']);



    Route::prefix('911')->group(function () {

        # Dashboard Controlller Routes
        Route::get('/dashboard', [DashboardController::class, 'index']);

        # Barangay Controller Routes
        Route::get('/barangay', [BarangayController::class, 'index']);

        Route::post('/barangay', [BarangayController::class, 'create']);

        Route::get('/barangay-edit/{id}', [BarangayController::class, 'edit']);

        Route::put('/barangay-update/{id}', [BarangayController::class, 'update']);

        Route::delete('/barangay-delete/{id}', [BarangayController::class, 'destroy']);

        # Report Controller Routes
        Route::get('/report', [ReportController::class, 'index']);

        Route::post('/report', [ReportController::class, 'create']);
        
        Route::put('/report/{id}', [ReportController::class, 'update']);

        Route::get('/report-display', [ReportController::class, 'display']);

        Route::get('/report-view/{id}', [ReportController::class, 'show']);

        Route::get('/report-edit/{id}', [ReportController::class, 'edit']);
    

        Route::delete('/report-delete/{id}', [ReportController::class, 'destroy']);

        # Incident Controller Routes
        Route::get('/incident-display', [IncidentController::class, 'index']);

        # User Controller Routes
        Route::get('/users', [UserController::class, 'index']);
    });

});

