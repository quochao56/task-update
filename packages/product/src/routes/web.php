<?php

use QH\Product\Http\Controllers\Category\CategoryController;

Route::get('admin',[CategoryController::class, 'index']);
