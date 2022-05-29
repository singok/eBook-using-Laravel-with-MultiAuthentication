<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
class UserDashboard extends Component
{
    use WithFileUploads;
    public $category, $title, $description, $book, $coverImage;

    protected $rules = [
        'category' => 'required',
        'title' => 'required',
        'description' => 'required',
        'book' => 'required',
        'coverImage' => 'image',
    ];

    public function insert()
    {
        $this->validate();
        dd($this->all());
    }
    public function render()
    {
        return view('livewire.user-dashboard');
    }
}
