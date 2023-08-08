<?php

use QH\Product\Http\Controllers\Category\CategoryController;

//Route::get('admin',[CategoryController::class, 'index']);
Route::middleware(['auth', 'web', 'role:admin'])->group(function () {
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
