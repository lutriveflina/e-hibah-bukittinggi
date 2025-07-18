<?php

namespace App\Livewire;

use App\Models\Permission;
use App\Models\Role as ModelsRole;
use Livewire\Attributes\On;
use Livewire\Component;

class Role extends Component
{
    public $roles;
    public $permissions = [];
    public $selectedPermissions = [];

    public $roleId;
    public $name;
    public $guard_name;
    
    protected $listeners = ['show-edit-modal'];
    // protected $listeners = ['select2Updated' => 'updateSelectedPermissions'];

    public function mount()
    {
        $this->permissions = Permission::orderBy('name', 'ASC')->get(); // Assuming you have a Permission model
    }

    public function render()
    {
        $this->roles = ModelsRole::all(); // Assuming you have a Role model
        return view('livewire.pages.role');
    }

    #[On('select2-updated')]
    public function updateSelectedPermissions($data)
    {
        $this->selectedPermissions = $data;
    }

    public function save(){
        $this->validate([
            'name' => 'required|string|max:255',
            'guard_name' => 'required|string|max:255',
            'selectedPermissions' => 'array',
        ]);

        ModelsRole::create([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ])->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Role created successfully.');
        $this->reset(['name', 'guard_name', 'selectedPermissions']);
    }

    public function edit($roleId)
    {
        $role = ModelsRole::findOrFail($roleId);

        $this->roleId = $role->id;
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
        $this->selectedPermissions = $role->permissions->pluck('name')->toArray();

        // buka modal setelah data siap
        $this->dispatch('show-edit-modal');
    }

    public function updateRole()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'guard_name' => 'required|string',
            'selectedPermissions' => 'array',
        ]);

        $role = ModelsRole::findOrFail($this->roleId);
        $role->update([
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ]);

        $role->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Role berhasil diperbarui.');
        $this->dispatch('close-edit-modal');
    }
}
