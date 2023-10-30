<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAbilities
{
    public function handle($request, Closure $next, ...$abilities)
    {
        $user = auth()->user();

        if ($user) {
            $userTokens = $user->tokens;
            foreach($abilities as $ability){
                foreach ($userTokens as $token) {
                    if (!in_array($ability, $token->abilities)) {
                        return redirect()->route('welcome')->with('message','Немає доступу');
                    }
                }
            }

        }
        
        return $next($request);
    }
}
