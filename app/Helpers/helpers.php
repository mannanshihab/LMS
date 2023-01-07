<?php

use Illuminate\Support\Facades\Auth;

function permission_cheak($permission){
    if(!Auth::user()->hasPermissionTo($permission)){
        flash()->addWarning('Youre not authorize to access');
        return redirect()->back();
    }
}