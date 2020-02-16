<?php

namespace App\Http\Middleware;

use App\Permission;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $get_user_access = 0;
        if(Auth::check()){
            $user = User::find(Auth::user()->id);

            if($user->role['name'] != 'Super Admin'){
                $access_name = Route::current()->getName();
                $get_user_access = Permission::where('roleID', $user->roleID)->where('values',$access_name)->count();
            }else{
                $get_user_access = 1;
            }

        }
        if($get_user_access > 0){
            return $next($request);
        }else{
            return redirect()->route('access');
        }

    }
}
