<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Books;
class UserDashboard extends Component
{
    use WithFileUploads;
    public $category, $title, $description, $book, $coverImage;

    protected $rules = [
        'category' => 'required',
        'title' => 'required',
        'description' => 'required',
        'book' => 'file | mimes:pdf',
        'coverImage' => 'file | mimes:jpg,jpeg,png',
    ];

    // insert book details
    public function insert()
    {
        $this->validate();

        // get file name 
        $fname = $this->book->getClientOriginalName();
        $bookName = time()."-".$fname;

        $cname = $this->coverImage->getClientOriginalName();
        $coverName = time()."-".$cname;

        $this->book->storeAs('books', $bookName);
        $this->coverImage->storeAs('cover-image', $coverName);

        Books::insert([
            "category" => $this->category,
            "title" => $this->title,
            "description" => $this->description,
            "cover_image" => $coverName,
            "file" => $bookName
        ]);
        $this->dispatchBrowserEvent('book-insert', ['message' => 'Book Inserted Successfully !!!']);
    }

    public function render()
    {
        return view('livewire.user-dashboard');
    }
}
