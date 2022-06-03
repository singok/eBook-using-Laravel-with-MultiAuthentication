<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Books;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\DB;
class UserDashboard extends Component
{
    use WithFileUploads;
    public $category, $title, $description, $book, $coverImage;
    public $deleteId, $deleteCover, $deleteBook;
    public $userEmail;
    public $update_id, $update_category, $update_title, $update_description;
    protected $rules = [
        'category' => 'required',
        'title' => 'required',
        'description' => 'required',
        'book' => 'file | mimes:pdf',
        'coverImage' => 'file | mimes:jpg,jpeg,png',
    ];

    // costructor
    public function mount()
    {
        $this->userEmail = Auth::user()->email;
    }

    // insert book details
    public function insert()
    {
        $this->validate();

        // get file name 
        $fname = $this->book->getClientOriginalName();
        $bookName = time()."-".$fname;

        $cname = $this->coverImage->getClientOriginalName();
        $coverName = time()."-".$cname;

        $feedback = Books::insert([
            "category" => $this->category,
            "title" => $this->title,
            "description" => $this->description,
            "cover_image" => $coverName,
            "file" => $bookName,
            "user" => $this->userEmail
        ]);

        if($feedback) {

            $this->book->storeAs('books', $bookName);
            $this->coverImage->storeAs('cover-image', $coverName);

            $this->category = null;
            $this->title = null;
            $this->description = null;
            $this->book = null;
            $this->coverImage = null; 

            $this->dispatchBrowserEvent('book-insert', ['message' => 'Book Inserted Successfully !!!']);
        } 
        
    }
    
    // show delete modal
    public function deleteModal($id, $cover, $book) 
    {
        $this->deleteId = $id;
        $this->deleteCover = $cover;
        $this->deleteBook = $book;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    // delete book details
    public function delete()
    {
        // remove from database table
        Books::find($this->deleteId)->delete();
        
        // remove files from storage
        Storage::delete(['cover-image/'.$this->deleteCover, 'books/'.$this->deleteBook]);

        $this->dispatchBrowserEvent('delete-success', [
                            'message' => 'Book deleted successfully !!!']);
    }

    // book download
    public function export($book, $title)
    {
        $path = asset('books/'.$book);
        $fileName = str_replace(' ', '-', $title).".pdf";
        return response()->download($path, $fileName);
    }

    // edit method
    public function edit($id, $title, $category, $desc)
    {
        $this->update_id = $id;
        $this->update_title = $title;
        $this->update_category = $category;
        $this->update_description = $desc;
        $this->dispatchBrowserEvent('show-update-form');
    }

    // update book details
    public function update()
    {
        DB::table('books')->where('id', $this->update_id)->update([
            'category' => $this->update_category,
            'title' => $this->update_title,
            'description' => $this->update_description,
        ]);
        $this->dispatchBrowserEvent('update-success', ['message' => "Book's Detail Updated Successfully !!!"]);
    }

    public function render()
    {
        $data = Books::where('user', $this->userEmail)->get();
        return view('livewire.user-dashboard', ['dataInfo' => $data]);
    }
}
