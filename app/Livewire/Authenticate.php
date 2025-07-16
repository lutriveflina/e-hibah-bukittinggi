<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
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

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
        
        if(Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();
            return redirect()->route('dashboard');
        }

        session()->flash('error', 'Invalid credentials.');
    }

    public function mount()
    {
        // Initialize any properties or perform actions when the component is mounted
    }

    public function render()
    {
        return view('livewire.authenticate');
    }
}
