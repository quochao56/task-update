<?php

use QH\Blog\Http\Controllers\Admin\PagesController;
use QH\Blog\Http\Controllers\Admin\PostsController;

Route::get('/blog', [PagesController::class, 'dashboard'])->name('blog');


//Route::resource('/user/blog', PostsController::class);

Route::prefix('/user/blog')->name('user.blog.')->group(function(){
   Route::get('/',[PostsController::class,'index']);
});
