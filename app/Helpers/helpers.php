<?php

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

function permission_cheak($permission){
    if(!Auth::user()->hasPermissionTo($permission)){
        flash()->addWarning('Youre not authorize to access');
        return redirect()->back();
    }
}