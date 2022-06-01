<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    // display login page
    public function index() 
    {
        return view('admin.admin-login');
    }

    // display register page
    public function registerForm()
    {
        return view('admin.admin-register-form');
    }

    // check login details
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('failure', 'Something went wrong. Please try again !!!');
        }
    }

    // logout administrator
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    // display dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
