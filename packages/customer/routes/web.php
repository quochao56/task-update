<?php

use QH\Customer\Http\Controllers\CartController;
use QH\Customer\Http\Controllers\MainController;

Route::middleware(['web'])->group(function () {
    Route::get('/home', [MainController::class, 'index'])->name('home');
    Route::get('/shop', [MainController::class, 'shop'])->name('shop');
    Route::get('/detail/{slug}', [MainController::class, 'detail'])->name('detail');

//Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
//Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
//
    Route::post('add-cart', [CartController::class, 'index']);
    Route::get('carts', [CartController::class, 'show'])->name('carts');
    Route::post('update-cart', [CartController::class, 'update']);
    Route::get('carts/delete/{id}', [CartController::class, 'remove']);
    Route::post('carts', [CartController::class, 'addCart']);
});
