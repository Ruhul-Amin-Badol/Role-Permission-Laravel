<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    
        if (Auth::check() ) {
            $user = Auth::user();
            if ($user->hasRole(['SuperAdmin','Admin']) ) {
                return $next($request);
            }

        abort(403,"User Dose't Have Correct Role");
        }
        
        abort(403); 
    }
}
