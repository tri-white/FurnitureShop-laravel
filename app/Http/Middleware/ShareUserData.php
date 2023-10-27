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
            View::share('admin', false);
        } elseif (Auth::guard('admin')->check()) {
            View::share('user', Auth::guard('admin')->user());
            View::share('admin', true);
        } else {
            View::share('user', null);
            View::share('admin', false);
        }
        
        return $next($request);
    }
}
