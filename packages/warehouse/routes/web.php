<?php
use QH\Warehouse\Http\Controllers\Store\StoreController;
use QH\Warehouse\Http\Controllers\Warehouse\WarehouseController;

// Store
Route::middleware(['auth:admin', 'web'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('stores')->group(function () {
            Route::get('/{warehouse?}/{store?}', [StoreController::class, 'list'])->name('admin.stores.list');
            // add product into session
//            Route::post('/add-product', [StoreController::class, 'create'])->name('admin.stores.add_product');
//            Route::get('/list', [StoreController::class, 'list'])->name('admin.stores.list');
//            // store product into db
//            Route::post('/store', [StoreController::class, 'store'])->name('admin.stores.store');
//            Route::get('/detail/{id}', [StoreController::class, 'detail'])->name('admin.stores.detail');
//            Route::get('destroy/{id}', [StoreController::class, 'destroy'])->name('admin.stores.destroy');

//            Route::post('/update', [StoreController::class, 'update'])->name('admin.stores.update');

            Route::get('/', [StoreController::class, 'index'])->name('admin.stores.index');
            Route::get('add', [StoreController::class, 'create'])->name('admin.stores.add');
            Route::post('add', [StoreController::class, 'store']);
            Route::get('edit/{store}', [StoreController::class, 'show'])->name('admin.stores.edit');
            Route::put('edit/{store}', [StoreController::class, 'update']);
            Route::delete('destroy/{store}', [StoreController::class, 'destroy'])->name('admin.stores.destroy');
        });
        Route::prefix('warehouses')->group(function () {
            Route::get('/', [WarehouseController::class, 'index'])->name('admin.warehouses.index');
            Route::get('add', [WarehouseController::class, 'create'])->name('admin.warehouses.add');
            Route::post('add', [WarehouseController::class, 'store']);
            Route::get('edit/{warehouse}', [WarehouseController::class, 'show'])->name('admin.warehouses.edit');
            Route::put('edit/{warehouse}', [WarehouseController::class, 'update']);
            Route::delete('destroy/{warehouse}', [WarehouseController::class, 'destroy'])->name('admin.warehouses.destroy');
        });
    });
});
