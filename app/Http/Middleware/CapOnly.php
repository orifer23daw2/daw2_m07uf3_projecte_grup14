<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CapOnly
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

        if (auth()->user()->tipus !== 'Cap') {

            return redirect()->route('admin')->with('error', 'No tienes permiso para acceder a esta página.');
        }


        return $next($request);
    }
}
