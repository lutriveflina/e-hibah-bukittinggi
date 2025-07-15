<?php

namespace App\Livewire;

use Livewire\Component;

class Authenticate extends Component
{
    public $email;
    public $password;
    public $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
        'remember' => 'boolean',
    ];

    public function authenticate()
    {
        $this->validate();

        // Logic for authentication goes here
        // For example, using Laravel's Auth facade:
        // if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
        //     return redirect()->intended('dashboard');
        // }

        session()->flash('error', 'Invalid credentials.');
    }

    public function mount()
    {
        // Initialize any properties or perform actions when the component is mounted
    }

    public function authentication(){
        
    }

    public function render()
    {
        return view('livewire.authenticate');
    }
}
