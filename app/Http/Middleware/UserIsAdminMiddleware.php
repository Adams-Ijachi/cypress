<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserIsAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (\Auth::user()->role->value !== \App\Http\Enums\UserRolesEnums::Admin->value) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
