<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    // display welcome page
<<<<<<< HEAD
    public function index($category = null)
    {
        $type = $category;

=======
    public function index($type = null)
    {
>>>>>>> Home-branch
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
<<<<<<< HEAD
        $path = asset('books/'.$book);
        response()->download($path);
        dd('download');
=======
        return Storage::download('books/'.$book);
>>>>>>> Home-branch
    }
}
