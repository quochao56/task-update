<?php


use QH\Admin\Http\Controllers\AdminController;

Route::get('admin/login',[AdminController::class, 'login'])->name('admin.login');
//Route::prefix("/admin")->name('admin.')->group(function (){
//    Route::middleware(['guest:admin'])->group(function(){
//        Route::view('/login','dashboard.admin.login')->name('login');
//        Route::post('/login', [AdminController::class, 'login'])->name('login');
//    });
//    Route::middleware(['auth:admin'])->group(function(){
//        Route::view('/home','dashboard.admin.home')->name('home');
//        Route::post('logout', [AdminController::class,'logout'])->name('logout');
//    });
//});
