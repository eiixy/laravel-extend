<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CheckPermission
{
    /**
     * 检查用户权限
     *
     * @param \Illuminate\Http\Request  $request
     * @param Closure $next
     * @param $permission
     * @return mixed
     */
    public function handle($request, Closure $next,$permission)
    {
        $user = Auth::user();
        if ($user == null){
            return response()->json([],401);
        }

        if ($user->hasPermission($permission)){
            return $next($request);
        }
        return response()->json([''],401);
    }
}
