<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class HomeController extends Controller
{
    // display welcome page
    public function index($category = null)
    {
        $type = $category;

        if ($type) {
            $data = Books::where('category', $type)->get();
        } else {
            $data = Books::all();
        }
        
        return view('welcome', ['dataInfo' => $data]);
    }

    // download book
    public function download($book)
    {
        $path = asset('books/'.$book);
        response()->download($path);
        dd('download');
    }
}
