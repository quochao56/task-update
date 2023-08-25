<?php

use QH\Product\Http\Controllers\Category\CategoryController;
use QH\Product\Http\Controllers\Product\ProductController;
use QH\Product\Http\Controllers\Product\UploadController;
use QH\Product\Http\Controllers\Purchase\PurchaseController;
use QH\Product\Http\Controllers\Sale\SaleController;

//Category
Route::middleware(['auth:admin', 'web'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('add', [CategoryController::class, 'create'])->name('admin.category.add_category');
            Route::post('add', [CategoryController::class, 'store']);
            Route::get('edit/{category}', [CategoryController::class, 'show'])->name('admin.category.edit_category');
            Route::put('edit/{category}', [CategoryController::class, 'update']);
            Route::delete('destroy/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        });
    });
});

//Product
Route::middleware(['auth:admin', 'web'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
            Route::get('add', [ProductController::class, 'create'])->name('admin.product.add_product');
            Route::post('add', [ProductController::class, 'store']);
            Route::get('edit/{product}', [ProductController::class, 'show'])->name('admin.product.edit_product');
            Route::put('edit/{product}', [ProductController::class, 'update']);
            Route::delete('destroy/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
        });
    });
});

// Purchase
Route::middleware(['auth:admin', 'web'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('orders')->group(function () {
            Route::get('/', [PurchaseController::class, 'index'])->name('admin.orders.index');
            // add product into session
            Route::post('/add-product', [PurchaseController::class, 'create'])->name('admin.orders.add_product');
            Route::get('/list', [PurchaseController::class, 'list'])->name('admin.orders.list');
            // store product into db
            Route::post('/store', [PurchaseController::class, 'store'])->name('admin.orders.store');
            Route::get('/detail/{id}', [PurchaseController::class, 'detail'])->name('admin.orders.detail');
            Route::get('destroy/{id}', [PurchaseController::class, 'destroy'])->name('admin.orders.destroy');

            Route::post('/update', [PurchaseController::class, 'update'])->name('admin.orders.update');
        });
    });
});

// Sale
Route::middleware(['auth:admin', 'web'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::prefix('sale')->group(function () {
            Route::get('/', [SaleController::class, 'index'])->name('admin.sale.index');
            // add product into session
            Route::post('/add-product', [SaleController::class, 'create'])->name('admin.sale.add_product');
            Route::get('/list', [SaleController::class, 'list'])->name('admin.sale.list');
//             store product into db
            Route::post('/store', [SaleController::class, 'store'])->name('admin.sale.store');
            Route::get('/detail/{id}', [SaleController::class, 'detail'])->name('admin.sale.detail');
            Route::get('destroy/{id}', [SaleController::class, 'destroy'])->name('admin.sale.destroy');
//
            Route::post('/update', [SaleController::class, 'update'])->name('admin.sale.update');
        });
    });
});
