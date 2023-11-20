<?php

namespace app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMissionViewCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        // user_type = 1 (admin)
        if (Auth::user()->user_type == 1)
        {
            return redirect(route('personalMissionAdminView'));
        }
        return $next($request);
    }
}
