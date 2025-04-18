<?php

use App\Http\Controllers\MobileAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OfficeEquipmentsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EquipmentCopiesController;
use App\Http\Controllers\OfficeSuppliesController;
use App\Http\Controllers\BorrowTransactionItemsController;
use App\Http\Controllers\BorrowTransactionsController;
use App\Http\Controllers\InventoryAccessController;
use App\Http\Controllers\BorrowersController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionHistoryController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\TrackingController;
use App\Models\InventoryAccess;

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

// auth for flutter
Route::prefix('mobile')->controller(MobileAuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

Route::middleware(['api.key'])->group(function () {
    // user api
    Route::get('/users', [UserController::class, 'index']);

    Route::post('/users', [UserController::class, 'store']);

    Route::put('/users/{user}', [UserController::class, 'update']);

    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    // inventory access api
    Route::get('/inventory_access', [InventoryAccessController::class, 'index']);

    Route::put('/inventory_access/{inventoryAccess}', [InventoryAccessController::class, 'update']);


    // Office Equipment api
    Route::get('/office_equipments', [OfficeEquipmentsController::class, 'index']);

    Route::post('/office_equipments', [OfficeEquipmentsController::class, 'store']);

    Route::get('/office_equipments/{officeEquipments}', [OfficeEquipmentsController::class, 'show']);

    Route::put('/office_equipments/{officeEquipments}', [OfficeEquipmentsController::class, 'update']);

    Route::delete('/office_equipments/{officeEquipments}', [OfficeEquipmentsController::class, 'destroy']);

    // categories api
    Route::get('/categories', [CategoriesController::class, 'index']);

    Route::post('/categories', [CategoriesController::class, 'store']);

    Route::get('/categories/{categories}', [CategoriesController::class, 'show']);

    Route::put('/categories/{categories}', [CategoriesController::class, 'update']);

    Route::delete('categories/{categories}', [CategoriesController::class, 'destroy']);

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

    //Transaction History
    Route::get('/transaction_history', [TransactionHistoryController::class, 'index']);

    Route::put('/transaction_history/{transactionHistory}', [TransactionHistoryController::class, 'update']);

    Route::prefix('911')->group(function () {

        Route::middleware(['auth:sanctum', 'api.key'])->put('/user/{user}', [UserController::class, 'updateUserFor911']);

        # Dashboard Controlller Routes
        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('/recent', [DashboardController::class, 'recent']);

        Route::get('/total-reports', [DashboardController::class, 'total_reports']);

        # Barangay Controller Routes
        Route::get('/barangay', [BarangayController::class, 'index']);

        Route::post('/barangay', [BarangayController::class, 'create']);

        Route::get('/barangay-edit/{id}', [BarangayController::class, 'edit']);

        Route::put('/barangay-update/{id}', [BarangayController::class, 'update']);

        Route::delete('/barangay-delete/{id}', [BarangayController::class, 'destroy']);

        Route::get('/barangay-reports/{id}', [BarangayController::class, 'show']);

        # Report Controller Routes
        Route::get('/report', [ReportController::class, 'index']);

        Route::post('/report', [ReportController::class, 'create']);

        Route::post('/restore-report', [ReportController::class, 'restore']);

        Route::put('/report/{id}', [ReportController::class, 'update']);

        Route::get('/report-display', [ReportController::class, 'display']);

        Route::get('/report-view/{id}', [ReportController::class, 'show']);

        Route::get('/report-edit/{id}', [ReportController::class, 'edit']);

        Route::delete('/report-delete/{id}', [ReportController::class, 'destroy']);

        Route::delete('/report-delete', [ReportController::class, 'destroyMultiple']);

        # User Controller Routes
        Route::get('/users', [UserController::class, 'index']);

        Route::patch('user-dashboard-role/{id}', [UserController::class, 'dashboard']);

        Route::patch('user-inventory-role/{id}', [UserController::class, 'inventory']);

        Route::patch('user-archive/{id}', [UserController::class, 'archive']);

        # Upload Controller Routes
        Route::post('/import-excel-data', [FileUploadController::class, 'readAndUpload']);

        Route::post('/import-excel', [FileUploadController::class, 'uploadFileView']);

        # Tracking Controller Routes
        Route::get('/tracking', [TrackingController::class, 'index']);

        # Mail Controller Routes
        // Route::get('/test-mail', function () {
        //     Mail::to('ccandremarin@gmail.com')->send(new TestMail());
        //     return response()->json(['message' => 'Mail sent successfully']);
        // });
        // Route::get('/test-mail', function () {
        //     Mail::to(['vheebhee7@gmail.com', 'eehvyahj.prog@gmail.com'])->send(new TestMail());
        //     return response()->json(['message' => 'Mail sent successfully']);
        // });

        # Forgot Password Controller Routes

    });
});
