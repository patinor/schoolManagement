<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnseignantMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!session()->get('prof') && !session()->get('authProf')){

            toastr()->warning('Veuillez vous connecter');
            return redirect()->route('login.prof_app');
        }
        return $next($request);
    }
}
