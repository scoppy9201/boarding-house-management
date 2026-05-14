<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Redirect;

class blockAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
        return $next($request);

        $user = Auth::user();
        
        if($user->status == "0") {
           
           return Redirect::route('error.block');
        }
       

        return $next($request);
    }
}
