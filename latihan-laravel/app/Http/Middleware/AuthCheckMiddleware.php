<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->get('is_logged_in')) {
            return redirect()->route('login.index')->with('error', "Anda harus masuk terlebih dahulu!");
        }

        return $next($request);
    }
}