<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminLoginCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        // user_type = 2 (user)
        if (Auth::user()->user_type == 2)
        {
            return redirect(route('user_login'));
        }
        return $next($request);
    }
}
