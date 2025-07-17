<?php

namespace App\Livewire;

use App\Models\Permission;
use App\Models\Role as ModelsRole;
use Livewire\Component;

class Role extends Component
{
    public $roles;
    public $permissions;

    public $name;
    public $selectedPermissions;
    public $guard_name;

    public function mount()
    {
        $this->permissions = Permission::orderBy('name', 'ASC')->get(); // Assuming you have a Permission model
    }

    public function render()
    {
        $this->roles = ModelsRole::all(); // Assuming you have a Role model
        return view('livewire.pages.role');
    }

    public function save(){
        // $this->validate([
        //     'name' => 'required|string|max:255',
        //     'guard_name' => 'required|string|max:255',
        //     'selectedPermissions' => 'array',
        // ]);

        dd($this->selectedPermissions);

        ModelsRole::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ])->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Role created successfully.');
        $this->reset(['name', 'guard_name', 'selectedPermissions']);
    }

    public function edit($roleID){

    }
}
