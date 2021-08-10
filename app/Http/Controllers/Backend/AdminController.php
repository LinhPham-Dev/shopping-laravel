<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;
use App\Models\Backend\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');
        } else {
            return view('backend.auth.login');
        }
    }

    public function login(LoginRequest $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Login failed !!!');
        }
    }

    public function dashboard()
    {
        $page = 'Dashboard';
        return view('backend.dashboard', compact('page'));
    }

    public function logout()
    {
        if (Auth::guard('admin')->logout()) {
            return redirect()->route('admin.show_login_form');
        } else {
            return redirect()->back();
        }
    }
}
