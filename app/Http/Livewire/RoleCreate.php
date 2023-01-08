<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Contracts\Service\Attribute\Required;

class RoleCreate extends Component
{
    public $SelectedPermissions = [];
    public $name;
    public function render()
    {
        $permissions = Permission::all();
        return view('livewire.role-create', [
            'permissions' => $permissions
        ]);
    }
    protected $rules = [
        'name' => 'required|unique:roles,name',
        'SelectedPermissions' => 'required|array|min:1',
    ];

    public function formSubmit() {
        $this->validate();

        $role = Role::create(['name' => $this->name]);
        $role->syncPermissions($this->SelectedPermissions);


        flash()->addSuccess('Role created successfully');
        return redirect()->route('role.index');
    }
}
