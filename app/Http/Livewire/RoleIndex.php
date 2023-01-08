<?php

namespace App\Http\Livewire;
use Spatie\Permission\Models\Role;
use Livewire\Component;


class RoleIndex extends Component
{
    public function render()
    {
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('livewire.role-index', [
            'roles' => $roles
        ]);
    }
    public function roleDelete($id) {
        permission_cheak('lead-permission');
        
        $lead = Role::findOrFail($id);
        $lead->delete();

        flash()->addSuccess('Role deleted successfully');
        
    }
}
