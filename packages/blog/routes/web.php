<?php

use QH\Blog\Http\Controllers\PostsController;

Route::middleware(['web'])->group(function () {
    Route::get('/index', [PostsController::class, 'dashboard'])->name('index');
    Route::prefix('/user/blog')->name('user.blog.')->group(function () {
        Route::get('/', [PostsController::class, 'index']);
        Route::get('/show/{slug}', [PostsController::class, 'show'])->name('show');
        Route::middleware('auth')->group(function () {
            Route::get('/create', [PostsController::class, 'create'])->name('create');
            Route::post('/store', [PostsController::class, 'store'])->name('store');
            Route::get('/edit/{slug}', [PostsController::class, 'edit'])->name('edit');
            Route::put('/update/{slug}', [PostsController::class, 'update'])->name('update');
            Route::delete('/destroy/{slug}', [PostsController::class, 'destroy'])->name('destroy');
        });
    });
});


