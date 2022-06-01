<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class HomeController extends Controller
{
    // display welcome page
    public function index()
    {
        $data = Books::all();
        return view('welcome', ['dataInfo' => $data]);
    }
}
