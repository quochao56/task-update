<?php

namespace QH\Core\ACL\Login\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6|max:15',
        ], [
            'email.exists' => "This email is not registered into our system"
        ]);
        $check = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($check)) {
            return redirect()->route('admin.home')->with('title', 'Admin dashboard');
        } else {
            return redirect()->back()->with('error', 'Login Failed');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
