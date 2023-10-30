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
        if (Auth::check()) {
            View::share('user', Auth::user());
            if (Auth::user()->role===1) {
                View::share('admin', true);
            } 
            else{
                View::share('admin', false);
            }
        }
        else {
                View::share('user', null);
                View::share('admin', false);
            }
        
        return $next($request);
    }
}
