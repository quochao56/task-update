<?php
use QH\Warehouse\Http\Controllers\History\HistoryController;
use QH\Warehouse\Http\Controllers\Store\StoreController;
use QH\Warehouse\Http\Controllers\Warehouse\WarehouseController;

Route::middleware(['auth:admin', 'web'])->group(function () {
    Route::prefix('/admin')->group(function () {
        // Store
        Route::prefix('stores')->group(function () {
            Route::get('/list/{warehouse?}/{store?}', [StoreController::class, 'list'])->name('admin.stores.list');
            Route::get('/', [StoreController::class, 'index'])->name('admin.stores.index');
            Route::get('add', [StoreController::class, 'create'])->name('admin.stores.add');
            Route::post('add', [StoreController::class, 'store']);
            Route::get('edit/{store}', [StoreController::class, 'show'])->name('admin.stores.edit');
            Route::put('edit/{store}', [StoreController::class, 'update']);
            Route::delete('destroy/{store}', [StoreController::class, 'destroy'])->name('admin.stores.destroy');
        });

        // Warehouse
        Route::prefix('warehouses')->group(function () {
            Route::get('/', [WarehouseController::class, 'index'])->name('admin.warehouses.index');
            Route::get('add', [WarehouseController::class, 'create'])->name('admin.warehouses.add');
            Route::post('add', [WarehouseController::class, 'store']);
            Route::get('edit/{warehouse}', [WarehouseController::class, 'show'])->name('admin.warehouses.edit');
            Route::put('edit/{warehouse}', [WarehouseController::class, 'update']);
            Route::delete('destroy/{warehouse}', [WarehouseController::class, 'destroy'])->name('admin.warehouses.destroy');
        });

        // History
        Route::get('/history', [HistoryController::class, 'index'])->name('admin.history.index');
    });
});
