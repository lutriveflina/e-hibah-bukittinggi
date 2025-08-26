<?php

namespace App\Livewire;

use App\Helpers\General;
use App\Mail\SendUserPassword;
use App\Models\Role;
use App\Models\Skpd;
use App\Models\UrusanSkpd;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class User extends Component
{
    use AuthorizesRequests;

    public $users;
    public $user;
    public $roles;
    public $skpds;
    public $urusans;
    public $userId;

    #[Validate('required|string|max:255')]
    public $name;
    #[Validate('required|email|max:255')]
    public $email;
    #[Validate('required')]
    public $role;
    public $skpd;
    public $urusan;

    protected $listeners = ['createModal', 'updatedSkpd', 'editModal', 'closeModal', 'verifyingDelete'];

    public function mount()
    {
        // Authorize the user to view any user
        $this->authorize('viewAny', User::class);
        $this->roles = Role::all();
        $this->skpds = Skpd::orderBy('id', 'ASC')->get();
        $this->urusans = [];

    }

    public function render()
    {
        $this->users = ModelsUser::with('has_role', 'lembaga', 'skpd')->orderBy('id_role', 'ASC')->get();
        return view('livewire.user');
    }

    public function create()
    {
        $this->reset(['name', 'email', 'role', 'skpd']);
        $this->dispatch('createModal');
    }

    #[On('updatedSkpd')]
    public function updatedSkpd(){
        if(!empty($this->skpd)){
            $this->urusans = UrusanSkpd::where('id_skpd', $this->skpd)->get();
        }
    }

    public function store(){
        $this->validate();

        $new_password = General::GeneratePassword(10);

        $role = Role::findOrFail($this->role);

        // Optionally, send an email with the password
        Mail::to($this->email)->queue(new SendUserPassword($new_password));

        ModelsUser::create([
            'name' => $this->name,
            'email' => $this->email,
            'id_role' => $this->role,
            'password' => bcrypt($new_password),
            'id_skpd' => $this->skpd ? $this->skpd : null,
            'id_urusan' => $this->urusan ? $this->urusan : null,
        ])->assignRole([$role->name]);

        $this->reset(['name', 'email', 'role', 'skpd', 'urusans', 'urusan']);
        session()->flash('message', 'User created successfully.');
        $this->dispatch('closeModal');
    }

    public function edit($id)
    {
        $user = ModelsUser::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->id_role;
        $this->skpd = $user->id_skpd;

        // Open the modal for editing
        $this->dispatch('editModal');
    }

    public function update(){
        $this->validate();
        $role = Role::findOrFail($this->role);
        
        $user = ModelsUser::findOrFail($this->userId);
        
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'id_role' => $this->role,
            'id_skpd' => $this->skpd ? $this->skpd : null,
        ]);

        $user->assignRole([$role->name]);

        $this->reset(['role','name', 'email', 'role']);
        session()->flash('message', 'User created successfully.');
        $this->dispatch('closeModal');
    }

    public function reset_password($id){
        $user = ModelsUser::findOrFail($id);
        $user->update([
            'password' => Hash::make('bukittinggi2025')
        ]);
        session()->flash('message', 'User reset password successfully.');
    }

    public function delete()
    {
        $this->user->delete();

        $this->reset(['user']);
        session()->flash('message', 'User deleted successfully.');
        $this->dispatch('closeModal');
    }

    public function verifyDelete($id)
    {
        $this->user = ModelsUser::with(['has_role', 'skpd', 'lembaga'])->where('id', $id)->first();
        $this->dispatch('verifyingDelete');
    }


}
