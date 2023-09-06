<?php


use QH\Core\ACL\Login\Http\Controllers\Admin\AdminController;
use QH\Core\ACL\Login\Http\Controllers\User\UserController;

Route::middleware('web')->prefix("/user")->name('user.')->group(function () {
    Route::middleware(['guest:web'])->group(function () {
        Route::view('/login', 'user.login.login')->name('login');
        Route::view('/register', 'user.login.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/login', [UserController::class, 'login']);
        Route::view('/forgot-password', 'user.passwords.email')->name('forgot-password');
        Route::view('/reset', 'user.passwords.reset')->name('reset');
        Route::view('/confirm', 'user.passwords.confirm')->name('confirm');
    });
    Route::middleware(['auth:web'])->group(function () {
        Route::view('/dashboard', 'user.login.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
});+
Route::middleware('web')->prefix("/admin")->name('admin.')->group(function () {
//    guest calls RedirectIfAuthenticated
    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'admin.login.login')->name('login');
        Route::post('/login', [AdminController::class, 'login']);
    });
    Route::middleware(['auth:admin'])->group(function () {
        Route::view('/home', 'admin.login.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});
