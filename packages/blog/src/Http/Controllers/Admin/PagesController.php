<?php

namespace QH\Blog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class PagesController extends Controller
{
    public function dashboard(){
        dd(\Auth::user());

        return view('blog.user.dashboard');
    }
}
