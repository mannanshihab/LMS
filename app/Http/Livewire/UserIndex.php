<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
   
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.user-index', [
            'users' => $users
        ]);
    }
    public function userDelete($id) {
        permission_cheak('lead-permission');
        
        $user = User::findOrFail($id);
        $user->delete();

        flash()->addSuccess('User deleted successfully');
        
    }
}
