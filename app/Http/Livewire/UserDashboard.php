<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
class UserDashboard extends Component
{
    use WithFileUploads;
    public $category, $title, $description, $file;
    public function insert()
    {
        dd($this->all());
    }
    public function render()
    {
        return view('livewire.user-dashboard');
    }
}
