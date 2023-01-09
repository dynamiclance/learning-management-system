<?php

use Illuminate\Support\Facades\Auth;

function permission_check($permission)
{
    if (!Auth::user()->hasPermissionTo($permission)) {
        flash()->addWarning('You are not allowed to access this page');
        return redirect()->route('dashboard');
    }
}
