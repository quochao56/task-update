<?php

use QH\Blog\Http\Controllers\PostsController;
use QH\Core\ACL\Login\Http\Controllers\User\UserController;

Route::middleware(['web'])->prefix('blog')->group(function () {
    Route::get('/index', [PostsController::class, 'dashboard'])->name('blog');
    Route::get('/show/{slug}', [PostsController::class, 'show'])->name('blog.show');
});

Route::middleware(['auth:admin', 'web'])->prefix('/admin/blogs')->name('admin.blogs.')->group(function () {
    Route::get('/index', [PostsController::class, 'index'])->name('index');
    Route::get('/show/{slug}', [PostsController::class, 'showAdmin'])->name('show');
    Route::get('/create', [PostsController::class, 'create'])->name('create');
    Route::post('/store', [PostsController::class, 'store'])->name('store');
    Route::get('/edit/{slug}', [PostsController::class, 'edit'])->name('edit');
    Route::put('/update/{slug}', [PostsController::class, 'update'])->name('update');
    Route::delete('/destroy/{slug}', [PostsController::class, 'destroy'])->name('destroy');
});
