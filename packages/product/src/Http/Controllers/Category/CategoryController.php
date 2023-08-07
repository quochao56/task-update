<?php

namespace QH\Product\Http\Controllers\Category;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('product::category.index', ['title' => "Admin"]);
//        return view('dashboard::master');
    }
}
