<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Carbon\Carbon;

class AdminRegister extends Component
{
    public $name, $email, $password, $confirmPassword;
    protected $rules = [
        'name' => 'required',
        'email' => 'required | email',
        'password' => 'required',
        'confirmPassword' => 'required | same:password'
    ];

    // register administrator details
    public function insert()
    {
        $this->validate();
        Admin::insert([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'created_at' => Carbon::now()
        ]);
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->confirmPassword = null;
        $this->dispatchBrowserEvent('register-success', 
            ['message' => 'New Administrator Registered Successfully !!!'
        ]);
    }

    public function render()
    {
        return view('livewire.admin-register')
                ->layout('layouts.admin');
    }
}
