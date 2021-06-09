<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == Role::where(['nombre'=>'Administrador'])->first()->id
        )
            return $next($request);
        return redirect('/');
    }
}
