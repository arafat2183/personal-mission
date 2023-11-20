<?php

namespace app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMissionViewCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        // user_type = 2 (user)
        if (Auth::user()->user_type == 2)
        {
            return redirect(route('personalMissionUserView'));
        }
        return $next($request);
    }
}
