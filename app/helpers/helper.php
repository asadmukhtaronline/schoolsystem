<?php

use Illuminate\Support\Facades\Auth;
use App\Models\permission;
use App\Models\assignpermission;

function hasPermission($url){
    $n = explode("/", $url);
    $permission = permission::where('url_slug', $n[1])->first();
    
    // Check if permission exists
    if ($permission === null) {
        return false;
    }

    $assignPermission = assignpermission::where('permission_id', $permission->id)
                                        ->where('role_id', Auth::user()->role_id)
                                        ->first();
    
    return !empty($assignPermission);
}
