<?php

namespace App\Livewire;

use App\Models\Permission as ModelsPermission;
use Livewire\Component;

class Permission extends Component
{
    public $name;
    public $guard_name;
    public $permissions;
    // public function mount()
    // {
    //     $this->permissions = ModelsPermission::all();
    // }

    public function render()
    {
        $this->permissions = ModelsPermission::all();
        return view('livewire.pages.permission');
    }

    public function save(){
        $this->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
            'guard_name' => 'required|string|max:255',
        ]);

        ModelsPermission::create([
            'name' => ucwords($this->name),
            'guard_name' => $this->guard_name,
        ]);

        $this->reset(['name', 'guard_name']);
        session()->flash('success', 'Permission created successfully.');
    }
}
