<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    //note: might need to create kernel.php and register middleware? //
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    /*
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
    */ 

    public function redirectTo(Request $request, Closure $next): Response
    {
        //return $next($request);
        if(!$request->expectsJson()){
            if($request->routeIs('admin.*')){
                session()->flash('fail', 'you must login first');
                return route('admin.login');
            }
        }
    }
}

