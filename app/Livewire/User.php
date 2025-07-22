<?php

namespace App\Livewire;

use App\Helpers\General;
use App\Mail\SendUserPassword;
use App\Models\Role;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;

class User extends Component
{
    use AuthorizesRequests;

    public $users;
    public $roles;
    public $skpds;

    #[Validate('required|string|max:255')]
    public $name;
    #[Validate('required|email|max:255')]
    public $email;
    #[Validate('required')]
    public $role;

    protected $listeners = ['editModal', 'closeModal'];

    public function mount()
    {
        // Authorize the user to view any user
        $this->authorize('viewAny', Auth::user());
        $this->roles = Role::all();
        $this->skpds = [];

    }

    public function render()
    {
        $this->users = ModelsUser::with('has_role', 'lembaga', 'skpd')->orderBy('id_role', 'ASC')->get();
        return view('livewire.user');
    }

    public function store(){
        $this->validate();

        $new_password = General::GeneratePassword(10);

        // Optionally, send an email with the password
        Mail::to($this->email)->send(new SendUserPassword($new_password));

        ModelsUser::create([
            'name' => $this->name,
            'email' => $this->email,
            'id_role' => $this->role,
            'password' => bcrypt($new_password),
        ]);

        $this->reset(['name', 'email', 'role']);
        session()->flash('message', 'User created successfully.');
        $this->dispatch('closeModal');
    }

    public function edit($id)
    {
        $user = ModelsUser::findOrFail($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->id_role;

        // Open the modal for editing
        $this->dispatch('editModal');
    }


}
