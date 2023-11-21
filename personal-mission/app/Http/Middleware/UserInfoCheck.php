<?php

namespace app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserInfoCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        // user_type = 2 (user)
        if (Auth::user()->id != $request->get('id'))
        {
            return redirect(route('user_login'));
        }
        return $next($request);
    }
}
