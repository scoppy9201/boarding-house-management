<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;
use Symfony\Component\HttpFoundation\Response;

class checkFormInformation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
        return redirect('login');

        $user = Auth::user();
       
        if($user->profile_photo_path === null) {
           $toast = ["Bạn cần điền đầy đủ thông tin cá nhân", "red"];
            return Redirect::route('user.index')->with(['toast' => $toast ]);;
        }
       

        return $next($request);
    }
}
