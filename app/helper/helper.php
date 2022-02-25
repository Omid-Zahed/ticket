<?php

namespace App\helper;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class helper
{


    public static function check_user_have_permission_to_route_name($route_name): bool
    {

        $route_list= config("permissions.url");
        $needed_permission= $route_list[$route_name]??null;
        if (!$needed_permission)return false;
        /**
         * @var User $user
         */
        $user=Auth::user();
        if($user->hasPermissionTo($needed_permission))  return true;
        return false;

    }

}
