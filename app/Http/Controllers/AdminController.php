<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.admin-register');
    }
}
