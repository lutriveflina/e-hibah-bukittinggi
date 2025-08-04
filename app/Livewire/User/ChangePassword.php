<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ChangePassword extends Component
{
    public $id_user;

    #[Validate('required')]
    public $current_password;
    #[Validate('required')]
    public $new_password;
    public $confirm_new_password;

    public $is_confirm = false;

    protected $listeners = ['confirm_password'];

    public function mount(){
        $this->id_user = Auth::user()->id;
    }

    public function render()
    {
        return view('livewire.user.change-password');
    }

    #[On('confirm_passowrd')]
    public function confirmingNewPassword(){
        $this->is_confirm = $this->new_password == $this->confirm_new_password;
    }

    public function update(){
        $this->validate();

        if (!Hash::check($this->current_password, Auth::user()->password)) {
            return session()->flash('error', 'Password lama salah.');
        }

        Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        session()->flash('success', 'Password berhasil diperbarui.');
        $this->reset(['current_password', 'new_password', 'confirm_new_password']);
    }
}
