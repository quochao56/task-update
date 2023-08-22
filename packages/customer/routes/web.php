<?php

use QH\Customer\Http\Controllers\MainController;

Route::get('/home', [MainController::class, 'index'])->name('home');
Route::get('/shop', [MainController::class, 'shop'])->name('shop');
Route::get('/detail/{slug?}', [MainController::class, 'detail'])->name('detail');
Route::get('/cart', [MainController::class, 'cart'])->name('cart');

//Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
//Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
//
//Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
//Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
//Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
//Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
//Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);
