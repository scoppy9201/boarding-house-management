<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckHost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        // Check if the user has the specified role
        if ($user->role != 2) {
            abort(404); // Return a 404 response for users without the required role
        }

        // If the user has the required role, proceed with the request
        return $next($request);
    }
}