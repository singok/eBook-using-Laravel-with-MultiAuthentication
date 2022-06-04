<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    // display welcome page
    public function index($type = null)
    {
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
        return Storage::download('books/'.$book);
    }
}
