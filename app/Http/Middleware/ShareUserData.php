<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ShareUserData
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            View::share('user', Auth::guard('web')->user());
        } elseif (Auth::guard('admin')->check()) {
            View::share('user', Auth::guard('admin')->user());
        } else {
            View::share('user', null);
        }
        
        return $next($request);
    }
}
