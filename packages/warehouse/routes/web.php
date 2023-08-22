<?php
use QH\Warehouse\Http\Controllers\Store\StoreController;

// Store
Route::middleware(['auth:admin', 'web'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('stores')->group(function () {
            Route::get('/{warehouse?}/{store?}', [StoreController::class, 'index'])->name('admin.stores.index');
            // add product into session
            Route::post('/add-product', [StoreController::class, 'create'])->name('admin.stores.add_product');
            Route::get('/list', [StoreController::class, 'list'])->name('admin.stores.list');
            // store product into db
            Route::post('/store', [StoreController::class, 'store'])->name('admin.stores.store');
            Route::get('/detail/{id}', [StoreController::class, 'detail'])->name('admin.stores.detail');
            Route::get('destroy/{id}', [StoreController::class, 'destroy'])->name('admin.stores.destroy');

            Route::post('/update', [StoreController::class, 'update'])->name('admin.stores.update');
        });
    });
});
